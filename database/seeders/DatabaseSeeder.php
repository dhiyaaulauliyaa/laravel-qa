<?php

namespace Database\Seeders;

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
                    ->create();
            });

        // If not randomized
        // User::factory(10)
        //     ->hasQuestions(3)
        //     ->create();
    }
}
