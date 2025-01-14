<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'missing_in' =>$this->faker->numberBetween(1,92),
            'born_in' =>$this->faker->numberBetween(1,92),
            'user_id' => 1,
            'born_on' => $this->faker->date,
            'missing_at' => $this->faker->date,
            'status' => $this->faker->randomElement([StatusEnum::Missing->value, StatusEnum::Found->value]),
        ];
    }
}
