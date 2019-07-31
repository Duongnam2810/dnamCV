<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// su dung thu vien. DB de thao tac voi database
use Illuminate\Support\Facades\DB;

// nap model
use\App\Models\Admin;

class QueryController extends Controller
{
    public function Select(){
    	// thuc hanh cau lenh query
    	// 1 - lay all du lieu (admins)
    	// SELECT*FROM admins

    	// tra ve object stdclass php
    	$dt = DB::table('admins')->get();
    	
    	// chuyen ve mang
    	$dt = json_decode($dt, true);

    	// foreach($dt as $key => $val){
    	// 	// echo $val->id;
    	// 	echo $val['id'];
    	// 	echo "<br>";
    	// }

    	// dd($dt);

    	// 2 - Where dieu` kien.
    	// SELECT name FROM categories WHERE id = 30 OR id = 4 OR name ='abc OR status = 1;
    	$dt2 = DB::table('categories')
    			->select('name_category')
    			->where('id',3)
    			// ->orWhere('id',4)
    			// ->orWhere('name_category','abc')
    			// ->orWhere('status',1)
    			->orWhere(['id' => 4, 'name_category' => 'abc', 'status' => 1])
    			//tra ve 1 dong` du lieu (fetch cua pdo)
    			->first();
    	// tra ve object
    	// dd($dt2);
    	// dd($dt2->name_category);

    	// SELECT a.username, a.password, a.role FROM admins AS a WHERE a.username = 'sas' AND a.password = '1212' AND a.status = 1;
    	$dt3 = DB::table('admins AS a')
    				->select('a.username','a.password','a.role')
    				// ->where('a.username','admin_1')
    				// ->where('a.password', 'qxhUaqmS')
    				// ->where('a.status',1)
    				->where([
    					'username' => 'admin_1',
    					'password' => 'qxhUaqmS',
    					'status' => 1
    				])
    				->first();
    	// dd($dt3);

    	// dem so dong du lieu trong database
    	$countPost = DB::table('posts')->count();	
    	// dd($countPost);

    	// lay ra id lon nhat hoac nho nhat	
    	$maxId = DB::table('posts')->max('id');
    	$minId = DB::table('posts')->min('id');
    	$avgId = DB::table('posts')->avg('id');
    	$sumId = DB::table('posts')->sum('id');
    	// dd($maxId,$minId,$avgId,$sumId);

    	// SELECT * FROM posts WHERE id IN(1,2,3);
    	$dt4 = DB::table('posts')
    				->select('*')
    				// ->whereIn('id',[1,2,3])
    				->where('status','<>',1)
    				->whereNotIn('id',[1,2,3])
    				->get();
    	// dd($dt4);

    	// SELECT * FROM tags WHERE name LIKE '%ly%' OR slug LIKE '%abc%';
    	$dt5 = DB::table('tags')
    				->select('*')
    				->where('name','LIKE','%ly%')
    				->orWhere('slug','LIKE','%abc%')
    				->get();
    	// dd($dt5);

    	// SELECT a.title, b.content_web FROM posts AS a
    	// INNER JOIN contents AS b ON a.id = b.posts_id
    	// WHERE a.id = 5;

    	$dt6 = DB::table('posts AS a')
    				->select('a.title','b.content_web')
    				->join('contents AS b', 'a.id', '=', 'b.post_id')
    				->where('a.id', 1)
    				->get();
    	// dd($dt6);	

    	// Insert data to table tags
    	// $dt6 = DB::table('tags')->insert([
    	// 		'name' => 'Lap Trinh Laravel',
    	// 		'slug' => 'Lap Trinh PHP',
    	// 		'status' => 1,
    	// 		'created_at' => date('Y-m-d H:i:s'),
    	// 		'updated_at' => null
    	// ]);

    	// if($dt6){
    	// 	dd('ok');
    	// } else{
    	// 	dd('error');
    	// }

    	// Update database
    	$up = DB::table('tags')
    			->where('id',6)
    			->update([
    				'name' => 'Lap trinh PHP'
    			]);

    	// Delete database from table tags
    	$del = DB::table('tags')
    			->where('id',9)
    			->delete();		
    }

    public function demoOrm(Admin $admin){
    	// trieu goi duoc ham lay du lieu tu phia model
    	$data = $admin->getAllData();
    	// dd($data);

    	$dt = $admin->getDataByCondition(1);
    	dd($dt);
    }
}
