<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'Nombre' => $this->faker->word,
            'Precio' => $this->faker->randomFloat(2, 10, 500),
            'Stock' => $this->faker->numberBetween(1, 100),
            'Url' => '../assets/default.png',
            'idCategoria' => 1, // O podrías usar un Category factory si existe
        ];
    }
}
