<?php

use Illuminate\Database\Seeder;
// ****
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// ****
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i = 1; $i <= 10; $i++) { 
    		 DB::table('posts')->insert([
    		 	'title' => Str::random(5),
    		 	'slug' => Str::random(5),
    		 	'spao' => Str::random(10),	
    		 	'categories_id' => 1,
    		 	'avatar' => Str::random(3) . '.png',
    		 	'status' => 1,
    		 	'publish_date' => date('Y-m-d H:i:s'),
    		 	'lang_id' => 1,
    		 	'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
    		 ]);
    	}
    }
}
