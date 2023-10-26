<?php

namespace Database\Factories;

use App\Models\Dtype;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Develop>
 */
class DevelopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->company(),
            'dtype_id'=>Dtype::all()->random()->id,
            'address'=>$this->faker->streetAddress(),
            'city'=>$this->faker->city(),
            'state'=>$this->faker->state(),
            'country' => $this->faker->country(),
            'zipcode' => $this->faker->postcode(),
            'description'=>$this->faker->paragraph(),
            'status'=>'initial',
        ];
    }
}
