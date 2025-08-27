<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['Billed', 'Paid', 'Void']);
        $billed_at = $this->faker->dateTimeThisDecade();
        $paid_at = $status == 'Paid' ? $this->faker->dateTimeThisDecade() : null;

        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $status,
            'billed_at' => $billed_at,
            'paid_at' => $paid_at,
        ];
    }
}
