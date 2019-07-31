<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Posts extends Model
{
    protected $table = 'posts';

    public function categories(){
    	// 1 bai` viet' thuoc. ve` 1 danh muc.
    	return $this->belongsTo('App\Models\Categories');
    }

    public function getTopPostsFocus(){
    	// chi lay' ra 3 bai viet moi' nhat'
    	// lay- ten danh muc - ten - avartar
    	$posts = DB::table('posts as p')
    				->select('p.id', 'p.title', 'p.spao', 'p.publish_date', 'p.avatar' , 'c.id as cate_id', 'c.name_category', 'a.username', 'a.id as user_id')
    				->join('categories as c', 'c.id', '=', 'p.categories_id')
    				->join('admins as a', 'a.id', '=', 'p.user_id')
    				->where('p.status', 1)
    				// ->offset(0)
    				->limit(3)
    				->orderBy('p.publish_date', 'DESC')
    				->get();
    	$posts = json_decode(json_encode($posts),true);
    	return $posts;		
    }

    public function getLastestPostByPage($arrId = []){
    	// $arrId : id cua 3 bai viet moi nhat noi bat.'
    	$posts = DB::table('posts as p')
    				->select('p.id', 'p.title', 'p.slug', 'p.spao', 'p.publish_date', 'p.avatar', 'a.username', 'a.id as user_id')
    				->join('admins as a', 'a.id', '=', 'p.user_id')
    				->where('p.status', 1)
    				->whereNotIn('p.id', $arrId)
    				->orderBy('p.publish_date', 'DESC')
    				->paginate(8);
    				// dd($posts);
    	return $posts;
    }

    public function getDataPostById($id){
        // $data = Posts::find($id);
        // return $data;
        $data = Posts::select('posts.id', 'posts.status', 'posts.title', 'posts.spao', 'posts.publish_date', 'posts.avatar', 'posts.slug',  'posts.categories_id', 'contents.content_web', 'categories.name_category as cate_name', 'admins.username')
                    ->join('contents', 'contents.post_id', '=', 'post_id')
                    ->join('categories', 'categories.id', '=', 'posts.categories_id')
                    ->join('admins', 'admins.id', '=', 'posts.user_id')
                    ->where('posts.id', $id)
                    ->where('posts.status', 1)
                    ->first();
            return $data;        
    }

    public function getDataTagsByPostId($id){
        $data = DB::table('tags as t')
            ->select('t.name as name_tag', 't.id as tag_id', 't.slug as slug_tag')
            ->join('post_tag as pt', 'pt.tags_id', '=', 't.id')
            ->where('pt.posts_id',$id)
            ->get();
        return $data;    
    }

    public function getDataRelatedPost($id, $idCate){
        $data = DB::table('posts as p')
            ->select('p.id', 'p.title', 'p.slug', 'p.avatar', 'p.publish_date', 'c.name_category as name_cate', 'c.slag as cate_slug', 'c.id as cate_id')
            ->join('categories as c', 'c.id', '=', 'p.categories_id')
            ->where('p.categories_id', $idCate)
            ->where('p.id', '<>', $id)
            ->limit(3)
            ->get();
        return $data;    
    }

     public function updateViewCount($id, $count){
        // dd($id);
        // tien hanh update vao db
        $count++;
        DB::table('posts')
            ->where('id', $id)
            ->update(['view_count' => $count]);
    }

}
