<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Relate to a User
            'kelas_id' => \App\Models\Kelas::factory(),
            'nip' => fake()->unique()->numerify('########'),
            'kode_dosen' =>fake()->unique()->numerify('KD-#########'),
            'name' =>fake()->name(),
        ];
    }
}
