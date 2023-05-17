<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->name(),
            // 'password' => bcrypt(fake()->password()),
            'password' => fake()->password(),
            'remember_token' => fake(),
        ];
    }

    // $factory->define(App\User::class, function (Faker\Generator $faker) {
    //     return [
    //         'name' => $faker->name,
    //         'email' => $faker->email,
    //         'password' => bcrypt(str_random(10)),
    //         'remember_token' => str_random(10),
    //     ];
    // });

    // $factory->defineAs(App\User::class, 'admin', function ($faker) {
    //     return [
    //         'username' => $faker->name,
    //         'password' => str_random(10),
    //         'remember_token' => str_random(10),
    //         'admin' => true,
    //     ];
    // });

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
