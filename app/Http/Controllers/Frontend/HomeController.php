<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use App\Models\Posts;

class HomeController extends FrontendController
{
    public function index(Posts $post){
    	// $data = $post->getTopPostsFocus();
    	// dd($data);
    	$data = [];
    	$data['topPosts'] = $post->getTopPostsFocus();
    	$arrIdTopPost = array_column($data['topPosts'], 'id');
    	// dd($arrIdTopPost);
    	$lastestPosts = $post->getLastestPostByPage($arrIdTopPost);
    	$mainData = json_decode(json_encode($lastestPosts),true);
    	$data['lastestPosts'] = $mainData['data'] ?? [];

    	$data['paginate'] = $lastestPosts;

    	return view('frontend.home.index',$data);
    }
}
