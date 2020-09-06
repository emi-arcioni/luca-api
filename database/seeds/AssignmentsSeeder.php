<?php

use Illuminate\Database\Seeder;

class AssignmentsSeeder extends Seeder
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
        DB::statement('TRUNCATE TABLE assignments');
        
        $data = [
            ['id' => 1, 'name' => 'Biología', 'created_at' => now()],
            ['id' => 2, 'name' => 'Geografía', 'created_at' => now()],
            ['id' => 3, 'name' => 'Historia', 'created_at' => now()],
            ['id' => 4, 'name' => 'Lengua y Literatura', 'created_at' => now()],
            ['id' => 5, 'name' => 'Matemáticas', 'created_at' => now()],
            ['id' => 6, 'name' => 'Educación Física', 'created_at' => now()],
            ['id' => 7, 'name' => 'Música', 'created_at' => now()],
            ['id' => 8, 'name' => 'Educación Plástica', 'created_at' => now()],
            ['id' => 9, 'name' => 'Computación', 'created_at' => now()],
            ['id' => 10, 'name' => 'Idioma', 'created_at' => now()]
        ];

        DB::table('assignments')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
