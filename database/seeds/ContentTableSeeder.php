<?php

use Illuminate\Database\Seeder;
// ****
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// ****

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 7; $i++) { 
        	DB::table('contents')->insert([
        		'post_id' => 1,
        		'content_web' => Str::random(4),
        		'content_mobile' => null,
        		'content_amp' => null,
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
        	]);
        }
    }
}
