<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'telephone_nmbr' => $this->faker->phoneNumber,
            'password' => '12345',
            'date_of_birth' => $this->faker->date($format = 'd/m/Y', $max = 'now'),
            'gender' => $this->faker->($gender = null|'male'|'female'),
        ];
    }
}
