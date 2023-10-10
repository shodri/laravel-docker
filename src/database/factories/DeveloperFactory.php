<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Developer>
 */
class DeveloperFactory extends Factory
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
            'description'=>$this->faker->paragraph(),
            'email' =>$this->faker->unique()->companyEmail(),
            'phone'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->address(),
            'image'=>$this->faker->optional($weight=0.75)->passthrough('public\images\logo_developer.png'),
            'instagram'=>$this->faker->optional($weight=0.4)->domainWord,
            'facebook'=>$this->faker->optional($weight=0.4)->domainWord,
        ];
    }
}
