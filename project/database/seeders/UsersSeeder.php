<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seed user Rani as company_admin
        $rani = new User();
        $rani->firstname = "Rani";
        $rani->lastname = "Verelst";
        $rani->email = "rani.verelst@student.thomasmore.be";
        $rani->phone = "0400000000";
        $rani->password = bcrypt("rani12345");
        $rani->date_of_birth = date('Y-m-d', time());
        $rani->gender = "female";
        $rani->company_admin = 1;
        $rani->save();

        //Seed user Esat as company_admin
        $esat = new User();
        $esat->firstname = "Esat";
        $esat->lastname = "Ergunes";
        $esat->email = "esat.ergunes@student.thomasmore.be";
        $esat->phone = "0400000000";
        $esat->password = bcrypt("esat12345");
        $esat->date_of_birth = date('Y-m-d', time());
        $esat->gender = "male";
        $esat->company_admin = 1;
        $esat->save();

        //Seed user Ward as company_admin
        $ward = new User();
        $ward->firstname = "Ward";
        $ward->lastname = "Vandevoort";
        $ward->email = "ward.vandevoort@student.thomasmore.be";
        $ward->phone = "0400000000";
        $ward->password = bcrypt("ward12345");
        $ward->date_of_birth = date('Y-m-d', time());
        $ward->gender = "male";
        $ward->company_admin = 1;
        $ward->save();

        //Seed user Madina as company
        $madina = new User();
        $madina->firstname = "Madina";
        $madina->lastname = "Jurakholova";
        $madina->email = "madina.jurakholova@student.thomasmore.be";
        $madina->phone = "0400000000";
        $madina->password = bcrypt("madina12345");
        $madina->date_of_birth = date('Y-m-d', time());
        $madina->gender = "female";
        $madina->company_admin = 1;
        $madina->save();

        //Generate 10 other users
        User::factory()->count(10)->create();
    }
}
