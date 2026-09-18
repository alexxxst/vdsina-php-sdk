<?php

declare(strict_types=1);

namespace Vdsina\Tests\Transport;

use PHPUnit\Framework\TestCase;
use Vdsina\ApiException;
use Vdsina\Transport\TransportException;

final class TransportExceptionTest extends TestCase
{
    public function testIsCatchableAsApiException(): void
    {
        $exception = new TransportException('boom');

        self::assertInstanceOf(ApiException::class, $exception);
        self::assertSame('boom', $exception->getMessage());
        self::assertNull($exception->getStatusCode());
    }
}
