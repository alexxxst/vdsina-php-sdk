<?php

declare(strict_types=1);

namespace Vdsina\Transport;

/**
 * Minimal HTTP transport abstraction used by {@see \Vdsina\Client}.
 *
 * Implementations perform a single HTTP request and return the raw
 * response. They never inspect the body, so the same transport can serve
 * any JSON API.
 */
interface TransportInterface
{
    /**
     * Performs an HTTP request.
     *
     * @param string             $method  HTTP method (GET, POST, PUT, DELETE).
     * @param string             $url     Absolute request URL.
     * @param array<int, string> $headers Request headers in "Name: value" form.
     * @param string|null        $body    Raw request body (already encoded), or null.
     *
     * @throws TransportException On a network or configuration failure.
     */
    public function send(string $method, string $url, array $headers = [], ?string $body = null): Response;

    /**
     * Base API URL without a trailing slash, e.g. "https://userapi.vdsina.com/v1".
     */
    public function baseUrl(): string;
}
