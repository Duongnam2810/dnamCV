<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use App\Models\Posts;

class DetailController extends FrontendController
{
    public function index($slug, $id, Request $request, Posts $posts){
    	// dd($slug, $id);
    	// lay ra noi. dung cua bai` viet'
    	$id = is_numeric($id) ? $id : 0;
    	$slug = strip_tags($slug);

    	$info = $posts->getDataPostById($id);
    	$info = ($info) ? $info->toArray() : [];
    	// dd($info);

    	if($info){
    		// co' du~ lieu
    		$data = [];
    		$data['detail'] = $info;

    		$tags = $posts->getDataTagsByPostId($id);
    		$tags = json_decode(json_encode($tags),true);
    		// dd($tags);
    		$data['tags'] = $tags;

    		$relatedPosts = $posts->getDataRelatedPost($id, $info['categories_id']);
    		// dd($relatedPosts);
    		// day? $relatedPosts ra ngoai` view
    		$data['relatedPosts'] = $relatedPosts;

    		return view('frontend.detail.index',$data);
    	} else{
    		// chuyen sang trang 404
    	}
    }

    public function updateView($id, Request $request, Posts $posts){
    	$id = is_numeric($id) ? $id : 0;
    	$detail = Posts::find($id);
    	if($detail){
    		$count = $detail->view_count;
    		$posts->updateViewCount($id, $count);
    	}
    }
}
