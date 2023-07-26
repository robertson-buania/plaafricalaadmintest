<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\lawyer>
 */
class LawyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'photo' => null,
            'phone' => $faker->phoneNumber,
            'gender' => $faker->randomElement(['male', 'female']),
            'birth_date' => $faker->date(),
            'email' => $faker->unique()->safeEmail,
            'function' => $faker->randomElement(['assistant administratif', 'jurisprudent', 'collaborateur', 'associé', 'associé gerant', 'consultant']),
            'cv' => null,
            'level' => $faker->numberBetween(1, 5),
            'description_en' => $faker->paragraph,
            'description_fr' => $faker->paragraph,
        ];
    }
}
