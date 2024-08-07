<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\fruit>
 */
class fruitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'v_name'=>$this->faker->name(),
            'qty'=>200,
            'price'=>'12.30',
            'category'=>'fruits'
        ];
    }
}
