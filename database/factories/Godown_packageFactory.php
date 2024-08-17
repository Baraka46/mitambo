<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Godown_package>
 */
class Godown_packageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tracking_id' => $this->faker->unique()->regexify('[A-Za-z0-9]{10}'), // Generates a unique tracking ID
            'godown' => $this->faker->randomElement(['China', 'Dubai', 'Jikoni', 'New Warehouse', 'New Warehouse 1st floor', 'Bandani']),
            'section' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'row' => $this->faker->numberBetween(1, 20),
            'position' => $this->faker->randomElement(['juu', 'chini']), // juu or chini
            'status' => $this->faker->randomElement(['not taken', 'loaded', 'taken']),
        ];
    }
}
