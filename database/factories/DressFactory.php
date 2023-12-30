<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dress>
 */
class DressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dresstype' => $this->faker->text(10),
            'designer'=> $this->faker->name(),
            'color'=> $this->faker->text(),
            'size'=> $this->faker->numberBetween(20,40),
            'stock'=> $this->faker->numberBetween(1,1000),
            'image'=> 'bluedress.jpg',
            'category_id'=> $this->faker->numberBetween(1,3)
        ];
    }
}
