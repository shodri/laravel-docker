<?php

namespace Database\Factories;

use App\Models\ProjectType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'project_type_id'=>ProjectType::all()->random()->id,
            'address'=>$this->faker->address(),
            'status'=>'initial',
        ];
    }
}
