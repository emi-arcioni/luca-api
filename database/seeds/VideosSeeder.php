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
            [
                'id' => 1, 
                'name' => 'Big Buck Bunny', 
                'url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 
                'duration' => '09:56', 
                'created_at' => now()
            ],
            [
                'id' => 2, 
                'name' => 'Elephant Dream', 
                'url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4', 
                'duration' => '10:53', 
                'created_at' => now()
            ],
            [
                'id' => 3, 
                'name' => 'For Bigger Blazes', 
                'url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4', 
                'duration' => '00:15', 
                'created_at' => now()
            ],
            [
                'id' => 4, 
                'name' => 'For Bigger Escape', 
                'url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', 
                'duration' => '00:15', 
                'created_at' => now()
            ],
            [
                'id' => 5, 
                'name' => 'For Bigger Fun', 
                'url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4', 
                'duration' => '01:00', 
                'created_at' => now()
            ],
            [
                'id' => 6, 
                'name' => 'For Bigger Joyrides', 
                'url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4', 
                'duration' => '00:15', 
                'created_at' => now()
            ],
        ];

        DB::table('videos')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $assignments = Assignment::get();

        Video::get()->map(function($video) use ($assignments) {
            $video->assignments()->attach($assignments->random(rand(1, $assignments->count())));
        });
    }
}
