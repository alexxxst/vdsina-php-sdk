<?php

declare(strict_types=1);

namespace Vdsina\Transport;

/**
 * Immutable raw HTTP response returned by a transport.
 */
final class Response
{
    /**
     * @param int                     $statusCode HTTP status code.
     * @param array<string, string[]> $headers    Response headers, names lower-cased.
     * @param string                  $body       Raw response body.
     */
    public function __construct(
        private int $statusCode,
        private array $headers,
        private string $body
    ) {
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return array<string, string[]>
     */
    public function headers(): array
    {
        return $this->headers;
    }

    public function header(string $name): ?string
    {
        $values = $this->headers[strtolower($name)] ?? null;

        return $values === null ? null : $values[0];
    }

    public function body(): string
    {
        return $this->body;
    }
}
