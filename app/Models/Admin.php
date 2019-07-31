<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// su dung thu vien. DB de thao tac voi database
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    // dinh. nghia~ model lam` viec voi bang du~ lieu. nao`
    protected $table = 'admins';

    // truy van database theo chuan ORM laravel

    public function getAllData(){
    	// c1 - DB::table('admins')->get();
    	// c2 - ORM
    	// Admin ten class
    	// tra du lieu. ve object
    	$data = Admin::all();
    	if($data){
    		$data = $data->toArray();
    	}
    	return $data;
    }

    public function getDataByCondition($id = 0){
    	// c1 - DB::table('admins')
    	// 		->where('id', $id)
    	// 		->first();
    	// c2 - 

    	// $data = Admin::find($id);
    	$data = Admin::select('*')
    				->where('status',1)
    				->get();

    	if($data){
    		$data = $data->toArray();
    	}
    	return $data;
    }

    // *******************
    public function loginAdmin($user, $pass){
    	$result = [];
    	$data = Admin::select('*')
    				->where([
    					'username' => $user,
    					'password' => $pass,
    					'status' => 1,
    					'role' => -1
    				])
    				->first();
    	if($data){
    		$result = $data->toArray();
    	}
    	return $result;
    }
}
