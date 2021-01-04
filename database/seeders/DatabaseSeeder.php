<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)
            ->create()
            ->each(function ($user) {
                Question::factory()
                    ->count(rand(3, 10))
                    ->for($user)
                    ->create()
                    ->each(function ($question) {
                        Answer::factory()
                            ->count(rand(3, 10))
                            ->for($question)
                            ->create();
                    });
            });

        // If not randomized
        // User::factory(10)
        //     ->hasQuestions(3)
        //     ->create();

        // User::factory(3)
        //     ->create()
        //     ->each(function ($u) {
        //         $u->questions()
        //             ->saveMany(
        //                 Question::factory(rand(1, 5))->make()
        //             )
        //             ->each(function ($q) {
        //                 $q->answers()
        //                     ->saveMany(Answer::factory(rand(1, 5))->make());
        //             });
        //     });
    }
}
