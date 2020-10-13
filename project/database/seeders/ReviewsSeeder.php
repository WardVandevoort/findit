<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = [
            [
                'review_body' => 'Een hele leuke stageplek, enthousiast team',
                'rating' => 5,
                'internship_id' => 1,
                'reviewer_id' => 6
            ],
            [
                'review_body' => 'Heel leuke team, maar ik had geen mentor toegewezen gekregen.',
                'rating' => 3,
                'internship_id' => 3,
                'reviewer_id' => 9
            ]
        ];
        
        foreach ($reviews as $review) {
            Review::updateOrCreate($review);
        }

    }
}
