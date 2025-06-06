<?php

namespace Tests\Unit;

use App\Utils\Helper;
use PHPUnit\Framework\TestCase;

class UtilityTest extends TestCase
{
    public function testGenerarUuid(): void
    {
        $uuid = Helper::generarUuid();
        $this->assertMatchesRegularExpression(
            '/^[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}$/',
            $uuid
        );
    }
}
