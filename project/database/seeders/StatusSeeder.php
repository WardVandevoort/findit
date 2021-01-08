<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['status' => 'Nog niet bekeken'],
            ['status' => 'We nemen contact op'],
            ['status' => 'Geaccepteerd'],
            ['status' => 'Nog niet bekeken'],

        ];

        foreach ($status as $status) {
            Status::create($status);
        }
    }
}
