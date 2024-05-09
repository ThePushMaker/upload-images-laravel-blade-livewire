<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // oracion aleatoria de 5 caracteres
            'titulo' => $this->faker->sentence('5'),
            'descripcion' => $this->faker->sentence('20'),
            // uuid concatenado con '.jpg'
            'imagen' => $this->faker->uuid() . '.jpg',
            // asignar un usuario aleatorio de entre 1, 2 o 3
            'user_id' => $this->faker->randomElement([1]),
        ];
    }
}
