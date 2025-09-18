<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $username = Str::slug($name);

        return [
            'name' => $name,
            'username' => $username,
            'email' => $username . '@' . $username . '.com',
            'password' => 'password',
            'phone' => fake()->phoneNumber(),
        ];
    }
}
