<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applications = [
            [
                'user_id' => '1',
                'internship_id' => '1',
                'motivation' => 'Ik zou het super fijn vinden om bij jullie te werken!',
                'status' => '1',
            ],
            [
                'user_id' => '2',
                'internship_id' => '2',
                'motivation' => 'Ik zou het super fijn vinden om bij jullie te werken!',
                'status' => '1',
            ],
            [
                'user_id' => '3',
                'internship_id' => '3',
                'motivation' => 'Ik zou het super fijn vinden om bij jullie te werken!',
                'status' => '2',
            ],
            [
                'user_id' => '4',
                'internship_id' => '4',
                'motivation' => 'Ik zou het super fijn vinden om bij jullie te werken!',
                'status' => '3',
            ]

        ];
        foreach ($applications as $application) {
            Application::updateOrCreate($application);
        }
    }
}
