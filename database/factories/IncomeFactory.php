<?php

namespace Database\Factories;

use App\Models\Income;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Income::class;

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
        ];
    }
}
