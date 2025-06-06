<?php

namespace Tests\Unit;

use App\Http\Requests\StoreHeladoRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ValidationTest extends TestCase
{
    public function testDatosInvalidosFalla(): void
    {
        $data = [
            'nombre' => '',
            'descripcion' => '',
            'precio' => -5,
            'sabor' => ''
        ];

        $rules = (new StoreHeladoRequest())->rules();
        $validator = Validator::make($data, $rules);
        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('nombre', $validator->errors()->messages());
        $this->assertArrayHasKey('precio', $validator->errors()->messages());
    }

    public function testDatosValidosPasan(): void
    {
        $data = [
            'nombre' => 'Vainilla',
            'descripcion' => 'Helado de vainilla',
            'precio' => 12.50,
            'sabor' => 'Dulce'
        ];

        $rules = (new StoreHeladoRequest())->rules();
        $validator = Validator::make($data, $rules);
        $this->assertFalse($validator->fails());
    }
}
