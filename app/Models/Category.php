<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';


    public function getAllDataCategories(){
    	$result = [];
    	$data = Category::all();
    	if($data){
    		$result = $data->toArray();
    	}
    	return $result;
    }

    
}
