<?php

namespace Tests\Feature;

use App\Models\Helado;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HeladoIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function testInsertarRegistroEnBaseDeDatos(): void
    {
        $helado = Helado::create([
            'nombre' => 'Chocolate',
            'descripcion' => 'Helado de chocolate puro',
            'precio' => 15.00,
            'sabor' => 'Amargo',
        ]);

        $this->assertDatabaseHas('helados', [
            'id' => $helado->id,
            'nombre' => 'Chocolate'
        ]);
    }

    public function testConsultarRegistrosDeBaseDeDatos(): void
    {
        Helado::factory()->create([
            'nombre' => 'Fresa',
            'descripcion' => 'Helado de fresa natural',
            'precio' => 14.00,
            'sabor' => 'Frutal',
        ]);

        $lista = Helado::all();
        $this->assertCount(1, $lista);
        $this->assertSame('Fresa', $lista->first()->nombre);
    }

    public function testEliminarRegistroDeBaseDeDatos(): void
    {
        $helado = Helado::factory()->create([
            'nombre' => 'Mango',
            'descripcion' => 'Helado de mango fresco',
            'precio' => 13.00,
            'sabor' => 'Frutal',
        ]);

        Helado::find($helado->id)->delete();
        $this->assertDatabaseMissing('helados', [
            'id' => $helado->id,
            'nombre' => 'Mango'
        ]);
    }
}
