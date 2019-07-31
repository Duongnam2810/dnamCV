<?php

use Illuminate\Database\Seeder;
// ****
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// ****

class Post_tagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 5; $i++) { 
        	DB::table('post_tag')->insert([
        		'posts_id' => 1,
        		'tags_id' => 1,
        		'primary' => 0,
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
        	]);
        }
    }
}
