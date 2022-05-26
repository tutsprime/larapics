<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Faker\Provider\en_US\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new Address($this->faker));
        
        return [
            'name' => $this->faker->name(),
            'email' => $email = $this->faker->unique()->safeEmail(),
            'username' => strstr($email, '@', true) . rand(100, 120),
            'city' => rand(0, 1) === 0 ? null : $this->faker->city(),
            'country' => rand(0, 1) === 0 ? null : $this->faker->country(),
            'about_me' => rand(0, 1) === 0 ? null : $this->faker->text(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
