<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'title' => $this->faker->jobTitle,
            'motivation' => $this->faker->realText(50),
            'created_at' => $this->faker->date($format = 'Y-m-d', $max = 'now', $min = '-1 month'),
            'updated_at' => $this->faker->date($format = 'Y-m-d', $max = '+2 months', $min = 'now'),
            'user_id' => $this->faker->randomDigitNotNull(),
            'internship_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
