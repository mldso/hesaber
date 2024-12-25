<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Asset;
use \App\Models\Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'asset_id' => function () {
                return Asset::factory()->create()->id;
            },
            'type_id' => function () {
                return Type::factory()->create()->id;
            },
            'comment' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2),
            'start_at' => $this->faker->date(),
            'end_at' => $this->faker->date(),
        ];
    }
}
