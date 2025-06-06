<?php

namespace App\Utils;

class Helper
{
    public static function formatearPrecio(float $precio): string
    {
        return number_format($precio, 2, '.', '');
    }

    public static function generarUuid(): string
    {
        return (string) \Illuminate\Support\Str::uuid();
    }

    public static function aplicarDescuento(float $precio, float $porcentaje): float
    {
        return round($precio * (1 - $porcentaje / 100), 2);
    }
}
