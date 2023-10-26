<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Broker>
 */
class BrokerFactory extends Factory
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
            'address'=>$this->faker->address(),
            'country' => $this->faker->countryCode(),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'zipcode' => $this->faker->postcode(),
            'email' =>$this->faker->unique()->companyEmail(),
            'phone'=>$this->faker->phoneNumber(),
            'whatsapp'=>$this->faker->phoneNumber(),
            'short_description'=>$this->faker->paragraph(),
            'long_description'=>$this->faker->paragraph(),
            'image'=>$this->faker->optional($weight=0.75)->passthrough('public\images\logo_broker.png'),
            'speciality' => $this->faker->randomElements($array = ['residential', 'commercial', 'industrial'], $count = $this->faker->numberBetween(0, 3)),
        ];
    }
}
