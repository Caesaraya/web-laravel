<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grades = [
        '10 PPLG 1', '10 PPLG 2', '10 PPLG 3', '10 DKV 1', '10 DKV 2', '11 DKV 1', '11 DKV 2', '12 DKV 1', '12 DKV 2',
        '11 PPLG 1', '11 PPLG 2', '11 PPLG 3', '12 PPLG 1', '12 PPLG 2', '12 PPLG 3',
    ];
        return [
            'name' => fake()->name(),
            'classroom_id' => Classroom::factory(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'birthday' => fake()->date(),

        ];
    }
}
