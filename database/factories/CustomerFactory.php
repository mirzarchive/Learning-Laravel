<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = fake()->randomElement(['INDIVIDUAL', 'BUSINESS']);
        $name = $type == 'INDIVIDUAL' ? fake()->name() : fake()->company();

        return [
            'name' => $name,
            'type' => $type,
            'email' => fake()->email(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'postal_code' => fake()->postcode(),
        ];
    }
}
