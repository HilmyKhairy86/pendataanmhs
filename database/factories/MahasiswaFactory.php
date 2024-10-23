<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
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
            'nim' => fake()->unique()->numerify('#########'),
            'kelas_id' => \App\Models\Kelas::factory(),
            'name' =>fake()->name(),
            'tempat_lahir' =>fake()->city(),
            'tanggal_lahir' =>fake()->date($format = 'Y-m-d', $max = '2005-01-01'),
        ];
    }
}
