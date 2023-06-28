<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = fake()->randomElement(['BILLED', 'PAID', 'VOID']);

        return [
            'customer_id' => Customer::factory(),
            'amount' => fake()->randomFloat(3, 20, 20000),
            'status' => $status,
            'billed_date' => fake()->dateTimeThisDecade(),
            'paid_date' => $status == 'PAID' ? fake()->dateTimeThisDecade() : NULL,
        ];
    }
}
