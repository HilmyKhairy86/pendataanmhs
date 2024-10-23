<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $programmingLanguages = [
            'PHP',
            'JavaScript',
            'Python',
            'Ruby',
            'Java',
            'C#',
            'C++',
            'Go',
            'Swift',
            'Rust',
            'Kotlin',
            'TypeScript',
            'Dart',
            'Scala',
            'Elixir',
            'Perl',
            'Haskell',
            'Lua',
            'Shell',
        ];
        return [
            'name' => fake()->unique()->randomElement($programmingLanguages),
            'jumlah' => 10,
        ];
    }
}
