<?php

declare(strict_types=1);

namespace Vdsina\Tests\Transport;

use PHPUnit\Framework\TestCase;
use Vdsina\Transport\Response;

final class ResponseTest extends TestCase
{
    public function testExposesItsData(): void
    {
        $response = new Response(200, ['content-type' => ['application/json']], '{"status":"ok"}');

        self::assertSame(200, $response->statusCode());
        self::assertSame(['content-type' => ['application/json']], $response->headers());
        self::assertSame('application/json', $response->header('Content-Type'));
        self::assertSame('{"status":"ok"}', $response->body());
    }

    public function testUnknownHeaderIsNull(): void
    {
        self::assertNull((new Response(200, [], ''))->header('X-Missing'));
    }
}
