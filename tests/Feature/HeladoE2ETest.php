<?php

namespace Tests\Feature;

use App\Models\Helado;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HeladoE2ETest extends TestCase
{
    use RefreshDatabase;

    public function testGetHeladosRetornaListaYCodigo200(): void
    {
        Helado::factory()->count(2)->create();
        $response = $this->getJson('/api/helados');
        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }

    public function testPostHeladoCreaElementoYRetorna201(): void
    {
        $payload = [
            'nombre'      => 'Limón',
            'descripcion' => 'Helado de limón refrescante',
            'precio'      => 11.50,
            'sabor'       => 'Ácido',
        ];

        $response = $this->postJson('/api/helados', $payload);
        $response->assertStatus(201);
        $response->assertJsonFragment(['nombre' => 'Limón']);
    }

    public function testDeleteHeladoEliminaYRetorna204LuegoGetRetorna404(): void
    {
        $helado = Helado::factory()->create([
            'nombre'      => 'Coco',
            'descripcion' => 'Helado de coco cremoso',
            'precio'      => 12.00,
            'sabor'       => 'Tropical',
        ]);

        $deleteResponse = $this->deleteJson("/api/helados/{$helado->id}");
        $deleteResponse->assertStatus(204);

        $getResponse = $this->getJson("/api/helados/{$helado->id}");
        $getResponse->assertStatus(404);
    }
}
