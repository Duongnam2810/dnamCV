<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    public function getAllDataTags(){
    	$result = [];
    	$data = Tag::all();
    	if($data){
    		$result = $data->toArray();
    	}
    	return $result;
    }
}
