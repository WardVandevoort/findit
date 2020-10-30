<?php

namespace Database\Seeders;

use App\Models\Skill;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $skills = [
            ['name' => 'HTML, CSS & JS', 'description' => $faker->realText(200)],
            ['name' => 'Adobe Creative Cloud', 'description' => $faker->realText(200)],
            ['name' => 'Logo Design', 'description' => $faker->realText(200)],
            ['name' => 'UX Design', 'description' => $faker->realText(200)],
            ['name' => 'Frameworks', 'description' => $faker->realText(200)],
            ['name' => 'Git & GitHub', 'description' => $faker->realText(200)]
        ];

        foreach($skills as $skill){
            Skill::create($skill);
        }
    }
}
