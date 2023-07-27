<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $userIds = User::pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->sentence(10),
            'user_id' => $this->faker->randomElement($userIds)
        ];
    }
}
