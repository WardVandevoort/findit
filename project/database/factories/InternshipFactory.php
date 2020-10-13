<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Internship;
use Illuminate\Database\Eloquent\Factories\Factory;

class InternshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Internship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'bio' => $this->faker->realText(200),
            'start' => $this->faker->date($format = 'Y-m-d', $max = 'now', $min = '-1 month'),
            'end' => $this->faker->date($format = 'Y-m-d', $max = '+2 months', $min = 'now'),
            'req_skills' => $this->faker->realText(200),
            'company_id' => Company::all()->random()->id,
        ];
    }
}
