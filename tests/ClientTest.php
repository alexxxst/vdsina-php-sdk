<?php

declare(strict_types=1);

namespace Vdsina\Tests;

use PHPUnit\Framework\TestCase;
use Vdsina\ApiException;
use Vdsina\Client;
use Vdsina\Tests\Support\FakeTransport;
use Vdsina\Transport\Response;

final class ClientTest extends TestCase
{
    private function json(int $status, string $body): Response
    {
        return new Response($status, ['content-type' => ['application/json']], $body);
    }

    public function testReturnsDataAndSendsAuthenticatedGet(): void
    {
        $transport = new FakeTransport([
            $this->json(200, '{"status":"ok","data":{"account":{"id":1,"name":"n"}}}'),
        ]);
        $client = new Client($transport, 'secret-token');

        $data = $client->getAccount();

        self::assertSame(['account' => ['id' => 1, 'name' => 'n']], $data);
        self::assertSame('GET', $transport->requests[0]['method']);
        self::assertSame('https://userapi.vdsina.com/v1/account', $transport->requests[0]['url']);
        self::assertContains('Authorization: Bearer secret-token', $transport->requests[0]['headers']);
        self::assertNull($transport->requests[0]['body']);
        self::assertSame(200, $client->getLastHttpCode());
        self::assertSame(
            ['status' => 'ok', 'data' => ['account' => ['id' => 1, 'name' => 'n']]],
            $client->getLastResponse()
        );
    }

    public function testAppendsQueryParameters(): void
    {
        $transport = new FakeTransport([$this->json(200, '{"status":"ok","data":[]}')]);
        $client = new Client($transport, 't');

        $client->getServerStats(5, '2024-01-01', '2024-01-31');

        self::assertSame(
            'https://userapi.vdsina.com/v1/server.stat/5?from=2024-01-01&to=2024-01-31',
            $transport->requests[0]['url']
        );
    }

    public function testEncodesJsonBody(): void
    {
        $transport = new FakeTransport([$this->json(201, '{"status":"ok","data":{"id":1}}')]);
        $client = new Client($transport, 't');

        $client->createSshKey('my key', 'ssh-rsa AAAA');

        self::assertSame('POST', $transport->requests[0]['method']);
        self::assertSame('{"name":"my key","data":"ssh-rsa AAAA"}', $transport->requests[0]['body']);
        self::assertContains('Content-Type: application/json', $transport->requests[0]['headers']);
    }

    public function testApiEnvelopeErrorThrows(): void
    {
        $transport = new FakeTransport([
            $this->json(200, '{"status":"error","status_msg":"Bad","description":"desc","data":{"x":1}}'),
        ]);
        $client = new Client($transport, 't');

        try {
            $client->getAccount();
            self::fail('Expected ApiException');
        } catch (ApiException $e) {
            self::assertSame('Bad: desc', $e->getMessage());
            self::assertSame(200, $e->getStatusCode());
            self::assertSame('Bad', $e->getStatusMessage());
            self::assertSame('desc', $e->getDescription());
            self::assertSame(['x' => 1], $e->getData());
        }
    }

    public function testHttpErrorThrows(): void
    {
        $transport = new FakeTransport([$this->json(400, '{"status":"error","status_msg":"Bad Request"}')]);
        $client = new Client($transport, 't');

        $this->expectException(ApiException::class);
        $client->getAccount();
    }

    public function testMalformedJsonResetsState(): void
    {
        $transport = new FakeTransport([$this->json(200, 'not-json')]);
        $client = new Client($transport, 't');

        try {
            $client->getAccount();
            self::fail('Expected ApiException');
        } catch (ApiException $e) {
            self::assertNull($client->getLastResponse());
            self::assertNull($client->getLastHttpCode());
        }
    }

    public function testEmptyResponseReturnsNull(): void
    {
        $transport = new FakeTransport([new Response(204, [], '')]);
        $client = new Client($transport, 't');

        self::assertNull($client->deleteServer(3));
        self::assertSame(204, $client->getLastHttpCode());
    }

    public function testSuccessWithoutDataReturnsNull(): void
    {
        $transport = new FakeTransport([$this->json(200, '{"status":"ok"}')]);
        $client = new Client($transport, 't');

        self::assertNull($client->deleteServer(3));
    }

    public function testEmptyErrorResponseThrows(): void
    {
        $transport = new FakeTransport([new Response(500, [], '')]);
        $client = new Client($transport, 't');

        try {
            $client->getAccount();
            self::fail('Expected ApiException');
        } catch (ApiException $e) {
            self::assertSame(500, $e->getStatusCode());
            self::assertStringContainsString('500', $e->getMessage());
        }
    }

    public function testEmptyForbiddenResponseThrows(): void
    {
        $transport = new FakeTransport([new Response(403, [], '')]);
        $client = new Client($transport, 't');

        $this->expectException(ApiException::class);
        $client->getAccount();
    }

    public function testOkEmptyBodyReturnsNull(): void
    {
        $transport = new FakeTransport([new Response(200, [], '')]);
        $client = new Client($transport, 't');

        self::assertNull($client->deleteServer(3));
    }

    public function testClientCanBeExtended(): void
    {
        $transport = new FakeTransport();
        $client = new class ($transport, 't') extends Client {
            protected function request(string $method, string $path, array $query = [], ?array $body = null): ?array
            {
                return ['overridden' => true];
            }
        };

        self::assertSame(['overridden' => true], $client->getAccount());
    }

    public function testSetTokenUpdatesAuthorizationHeader(): void
    {
        $transport = new FakeTransport([$this->json(200, '{"status":"ok","data":[]}')]);
        $client = new Client($transport, 'old');

        $client->setToken('new')->getServers();

        self::assertContains('Authorization: Bearer new', $transport->requests[0]['headers']);
    }
}
