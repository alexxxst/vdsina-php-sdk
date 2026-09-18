<?php

declare(strict_types=1);

namespace Vdsina\Transport;

use Vdsina\ApiException;

/**
 * Thrown by a transport when the request cannot be performed at all
 * (network failure, cURL configuration error, ...). It extends ApiException
 * so a single `catch (ApiException)` keeps working.
 */
final class TransportException extends ApiException
{
}
