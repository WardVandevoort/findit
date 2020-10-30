<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
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
        $gender = $this->faker->randomElements(['male', 'female'])[0];

        return [
            'firstname' => $this->faker->firstName($gender),
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'password' => bcrypt('12345'),
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'province' => $this->faker->state,
            'date_of_birth' => $this->faker->date($format = 'Y-m-d', $max = 'now', $min = '1900'),
            'gender' => $gender,
        ];
    }
}
