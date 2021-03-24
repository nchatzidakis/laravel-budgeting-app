<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'company' => $this->faker->text,
            'description' => $this->faker->text,
            'notes' => $this->faker->text,
            'amount' => $this->faker->numberBetween(1,1000),
            'transaction_at' => $this->faker->dateTime,
            'due_at' => $this->faker->dateTime,
        ];
    }
}
