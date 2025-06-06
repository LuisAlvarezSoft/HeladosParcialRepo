<?php

namespace Tests\Unit;

use App\Utils\Helper;
use PHPUnit\Framework\TestCase;

class TransformationTest extends TestCase
{
    public function testFormatearPrecio(): void
    {
        $this->assertSame('10.00', Helper::formatearPrecio(10));
        $this->assertSame('9.99', Helper::formatearPrecio(9.99));
    }

    public function testAplicarDescuento(): void
    {
        $precioOriginal = 100.00;
        $precioConDescuento = Helper::aplicarDescuento($precioOriginal, 20);
        $this->assertSame(80.00, $precioConDescuento);
    }
}
