<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'user_id'=> 18,
            'vacancy' => $this->faker->numberBetween(1, 10),
            'salary' => $this->faker->numberBetween(20000, 100000),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(5),
            'benefits' => $this->faker->sentence(8),
            'responsibility' => $this->faker->paragraph(3),
            'keywords' => implode(', ', $this->faker->words(5)),
            'company_name' => $this->faker->company(),
            'company_location' => $this->faker->city(),
            'experience' => rand(1,3),
            'catagory_id' => rand(1,10),    
            'job_type_id' => rand(1,7),
        ];
    }
}
