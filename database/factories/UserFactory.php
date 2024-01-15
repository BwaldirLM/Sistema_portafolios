<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> upstream/master
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
<<<<<<< HEAD
=======
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
>>>>>>> upstream/master
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
=======
            'Nombre' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'TipoUsuario' => $this->faker->randomElement(['revisor', 'docente']),
>>>>>>> upstream/master
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
