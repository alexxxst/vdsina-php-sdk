<?php

declare(strict_types=1);

namespace Vdsina\Tests\Transport;

use PHPUnit\Framework\TestCase;
use Vdsina\Transport\CurlTransport;
use Vdsina\Transport\TransportException;

final class CurlTransportTest extends TestCase
{
    public function testDefaultBaseUrl(): void
    {
        self::assertSame('https://userapi.vdsina.com/v1', (new CurlTransport())->baseUrl());
    }

    public function testHostWithSchemeAndTrailingSlash(): void
    {
        self::assertSame('http://example.test/v2', (new CurlTransport('http://example.test/', 'v2'))->baseUrl());
    }

    public function testHostWithPathIsUsedAsCompleteBase(): void
    {
        self::assertSame('https://example.test/custom', (new CurlTransport('https://example.test/custom', 'v1'))->baseUrl());
    }

    public function testEmptyVersionDoesNotAddSlash(): void
    {
        self::assertSame('https://example.test', (new CurlTransport('example.test', ''))->baseUrl());
    }

    public function testUnreachableHostThrowsTransportException(): void
    {
        $transport = new CurlTransport('http://127.0.0.1:1', '', 'http', 1);

        $this->expectException(TransportException::class);
        $transport->send('GET', 'http://127.0.0.1:1/ping');
    }
}
