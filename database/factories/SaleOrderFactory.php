<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleOrder>
 */
class SaleOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Branch_Code' => 2,
            'Order_Prefix' => 'SO',
            'Party_Order_No' => $this->faker->randomNumber(),
            'Order_Date' => $this->faker->dateTime(),
        ];
    }
}
