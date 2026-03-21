<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomElement(['$30,000 USD', '$50,000 USD', '$75,000 USD', '$100,000 USD', '$150,000 USD']),
            'location' => 'Remote',
            'schedule' => $this->faker->randomElement(['Full Time', 'Part Time', 'Contract']),
            'url' => $this->faker->url(),
            'featured' => 'false',
            'employer_id' => \App\Models\Employer::factory(),

        ];
    }
}
