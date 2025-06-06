<?php

namespace Database\Factories;

use App\Models\Helado;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeladoFactory extends Factory
{
    protected $model = Helado::class;

    public function definition(): array
    {
        return [
            'nombre'      => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'precio'      => $this->faker->randomFloat(2, 5, 20),
            'sabor'       => $this->faker->word(),
        ];
    }
}
