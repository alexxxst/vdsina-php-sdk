<?php

declare(strict_types=1);

namespace Vdsina\Transport;

use Vdsina\Client;

/**
 * cURL-based HTTP transport.
 *
 * Owns every connection-level setting (host, API version, scheme, timeout,
 * User-Agent and extra cURL options). It only fails on network or
 * configuration errors; HTTP status handling is left to the caller.
 */
final class CurlTransport implements TransportInterface
{
    private string $baseUrl;
    private int $timeout;
    private string $userAgent;

    /** @var array<int, mixed> */
    private array $curlOptions;

    /**
     * @param string $host      Target host; may include a scheme. If it contains
     *                          a path, that path is used as the complete base URL
     *                          and `$version` is not appended.
     * @param string $version   API version prefix, default "v1".
     * @param string $scheme    Scheme used when `$host` has none.
     * @param int    $timeout   Connect and total timeout in seconds.
     * @param string $userAgent User-Agent header value.
     * @param array<int, mixed> $curlOptions Extra cURL options (user options win).
     */
    public function __construct(
        string $host = 'userapi.vdsina.com',
        string $version = 'v1',
        string $scheme = 'https',
        int $timeout = 30,
        string $userAgent = Client::DEFAULT_USER_AGENT,
        array $curlOptions = []
    ) {
        $this->baseUrl = $this->buildBaseUrl($host, $version, $scheme);
        $this->timeout = $timeout;
        $this->userAgent = $userAgent;
        $this->curlOptions = $curlOptions;
    }

    public function baseUrl(): string
    {
        return $this->baseUrl;
    }

    public function send(string $method, string $url, array $headers = [], ?string $body = null): Response
    {
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_CONNECTTIMEOUT => $this->timeout,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_USERAGENT => $this->userAgent,
            CURLOPT_ENCODING => '',
        ];

        switch ($method) {
            case 'GET':
                $options[CURLOPT_HTTPGET] = true;
                break;
            case 'POST':
                $options[CURLOPT_POST] = true;
                break;
            default:
                $options[CURLOPT_CUSTOMREQUEST] = $method;
                break;
        }

        if ($body !== null) {
            $options[CURLOPT_POSTFIELDS] = $body;
        }

        if ($this->curlOptions !== []) {
            $options = $this->curlOptions + $options;
        }

        $ch = curl_init($url);
        if ($ch === false) {
            throw new TransportException('Failed to initialize cURL session');
        }
        if (!curl_setopt_array($ch, $options)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new TransportException('Failed to configure cURL session: ' . $error);
        }

        $responseBody = curl_exec($ch);
        $statusCode = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($responseBody === false) {
            throw new TransportException('cURL transport error: ' . $curlError);
        }

        return new Response($statusCode, [], (string) $responseBody);
    }

    /**
     * Builds the base URL from host, version and scheme, stripping redundant
     * slashes and honouring a scheme already present in the host.
     */
    private function buildBaseUrl(string $host, string $version, string $scheme): string
    {
        $host = rtrim($host, '/');
        if (!preg_match('~^[a-z][a-z0-9+.-]*://~i', $host)) {
            $host = $scheme . '://' . $host;
        }
        $version = trim($version, '/');

        $path = parse_url($host, PHP_URL_PATH);
        if ($version === '' || (is_string($path) && $path !== '' && $path !== '/')) {
            return $host;
        }

        return $host . '/' . $version;
    }
}
