<?php

use Illuminate\Database\Seeder;
use App\Assignment;
use App\Video;

class VideosSeeder extends Seeder
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
        DB::statement('TRUNCATE TABLE assignment_video');
        DB::statement('TRUNCATE TABLE videos');
        
        $data = [
            ['id' => 1, 'name' => 'Esquiador', 'file' => 'video1.mp4', 'duration' => '00:14', 'created_at' => now()],
            ['id' => 2, 'name' => 'Disco', 'file' => 'video2.mp4', 'duration' => '00:21', 'created_at' => now()],
            ['id' => 3, 'name' => 'Cascada', 'file' => 'video3.mp4', 'duration' => '00:06', 'created_at' => now()],
            ['id' => 4, 'name' => 'Luces de ciudad', 'file' => 'video4.mp4', 'duration' => '00:07', 'created_at' => now()],
            ['id' => 5, 'name' => 'Campamento', 'file' => 'video5.mp4', 'duration' => '00:20', 'created_at' => now()],
            ['id' => 6, 'name' => 'Transporte', 'file' => 'video6.mp4', 'duration' => '00:31', 'created_at' => now()],
            ['id' => 7, 'name' => 'Bahía', 'file' => 'video7.mp4', 'duration' => '01:03', 'created_at' => now()],
            ['id' => 8, 'name' => 'Acantilados', 'file' => 'video8.mp4', 'duration' => '00:30', 'created_at' => now()],
            ['id' => 9, 'name' => 'Arroz', 'file' => 'video9.mp4', 'duration' => '00:13', 'created_at' => now()],
            ['id' => 10, 'name' => 'Ruta', 'file' => 'video10.mp4', 'duration' => '00:19', 'created_at' => now()]
        ];

        DB::table('videos')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $assignments = Assignment::get();
        
        for($i = 1; $i <= 10; $i++) {
            copy(resource_path('videos/video' . $i . '.mp4'), public_path('storage/video' . $i . '.mp4'));
        }

        Video::get()->map(function($video) use ($assignments) {
            $video->assignments()->attach($assignments->random(rand(1, $assignments->count())));
        });
    }
}
