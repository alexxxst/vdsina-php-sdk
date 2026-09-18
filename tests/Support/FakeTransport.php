<?php

declare(strict_types=1);

namespace Vdsina\Tests\Support;

use LogicException;
use Vdsina\Transport\Response;
use Vdsina\Transport\TransportInterface;

final class FakeTransport implements TransportInterface
{
    /** @var array<int, Response> */
    private array $responses;

    /** @var array<int, array{method: string, url: string, headers: array<int, string>, body: string|null}> */
    public array $requests = [];

    public function __construct(array $responses = [], private string $baseUrl = 'https://userapi.vdsina.com/v1')
    {
        $this->responses = array_values($responses);
    }

    public function send(string $method, string $url, array $headers = [], ?string $body = null): Response
    {
        $this->requests[] = ['method' => $method, 'url' => $url, 'headers' => $headers, 'body' => $body];

        if ($this->responses === []) {
            throw new LogicException('No fake response queued.');
        }

        return array_shift($this->responses);
    }

    public function baseUrl(): string
    {
        return $this->baseUrl;
    }
}
