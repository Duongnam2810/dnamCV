<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

use App\Helpers\Common\BuildTreeCate;
use App\Models\Categories;
use App\Models\Tag;

class FrontendController extends Controller
{
    public function __construct(Categories $cate, Tag $tag){
    	$data = [];
    	$data['name'] = 'DTN';
    	$listCate = DB::table('categories')
    					->where('status',1)
    					->get();
    	$listCate = json_decode(json_encode($listCate),true);
    	// dd($listCate);
    	// $test = BuildTreeCate::layoutTreeCategory();
    	// dd($test);

    	$data['cates'] = BuildTreeCate::layoutTreeCategory($listCate);
    	// dd($data['cates']);

    	$data['listCate'] = $cate->countPostCategory();
    	// dd($data['listCate']);

    	$data['listTag'] = $tag->getAllDataTags();
    	

    	// share du~ lieu. cho tat' ca? cac' view dung` chung

    	// Kiem tra neu la trang chu (homepage moi hien thi slider anh)

    	$data['homePage'] = Route::currentRouteName();
    	// dd($data);
    	View::share('info',$data);

    }
}
