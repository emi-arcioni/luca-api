<?php

use Illuminate\Database\Seeder;
use App\Assignment;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * This is a dummy data seeder. All the information is here for demonstration purposes.
         */

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::statement('TRUNCATE TABLE assignment_user');
        DB::statement('TRUNCATE TABLE users');
        $assignments = Assignment::get();
        factory(App\User::class, 5000)->create()->each(function($user) use ($assignments) {
            $user->assignments()->attach($assignments->random(rand(1, $assignments->count())));
        });
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
