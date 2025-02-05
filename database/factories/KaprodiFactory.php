<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kaprodi>
 */
class KaprodiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => fake()->unique()->numerify('########'),
            'kode_dosen' =>fake()->unique()->numerify('KD-#########'),
            'name' =>fake()->name(),
        ];
    }
}
