<?php

declare(strict_types=1);

namespace Vdsina;

use RuntimeException;
use Throwable;

/**
 * Exception thrown by the SDK whenever the VDSina API returns an error,
 * an HTTP error status is received, or a transport-level failure occurs.
 *
 * The exception carries the parsed error details from the API envelope
 * (`status_msg`, `description`, `data`) so callers can react precisely.
 */
class ApiException extends RuntimeException
{
    /**
     * HTTP status code of the failed response (0 for transport errors).
     */
    private ?int $statusCode;

    /**
     * Short error title returned by the API (`status_msg` field).
     */
    private ?string $statusMessage;

    /**
     * Human-readable error description returned by the API (`description` field).
     */
    private ?string $description;

    /**
     * Additional structured error data returned by the API (`data` field).
     *
     * @var mixed
     */
    private mixed $data;

    /**
     * @param string          $message       Main error message (title and/or description).
     * @param int|null        $statusCode    HTTP status code (0 when the error is transport-level).
     * @param string|null     $statusMessage API `status_msg` value.
     * @param string|null     $description   API `description` value.
     * @param mixed           $data          API `data` value (structured per-property errors).
     * @param Throwable|null  $previous      Previous exception that caused this one (e.g. a
     *                                       JsonException from encoding/decoding a payload).
     */
    public function __construct(
        string $message = '',
        ?int $statusCode = null,
        ?string $statusMessage = null,
        ?string $description = null,
        mixed $data = null,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $statusCode ?? 0, $previous);
        $this->statusCode = $statusCode;
        $this->statusMessage = $statusMessage;
        $this->description = $description;
        $this->data = $data;
    }

    /**
     * HTTP status code of the failed response, or null if unavailable.
     */
    final public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * Short error title (`status_msg`) returned by the API.
     */
    final public function getStatusMessage(): ?string
    {
        return $this->statusMessage;
    }

    /**
     * Human-readable error description returned by the API.
     */
    final public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Structured per-property error data returned by the API.
     *
     * @return mixed
     */
    final public function getData(): mixed
    {
        return $this->data;
    }
}
