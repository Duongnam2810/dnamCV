<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
// 	// home page
//     return view('welcome');
// });

// bao' cho router
Route::get('/home', function(){
	// ::get() method cua routes - phuong thuc truy cap vao routes day
	return "Hello world - home";
});

// Cac phuong thuc lam viec trong routes
// 1- method GET
Route::get('/demo/laravel', function(){
	return "this is method GET";
});

// 2- method POST
Route::post('/demo-post', function(){
	return "this id method POST";
});

// 3- method PUT 
Route::put('demo-put', function(){
	return "This is method put";
});

// 4- match (cho phep 1 request co the lam` viec. voi nhieu cac phuong thuc truy cap vao routes)
Route::match(['get','post','put'],'demo-method',function(){
	return "this is match method";
});

// 5- any (cho phep lam viec voi tat ca cac phuong thuc truy cap vao routes)
Route::any('demo-method-any', function(){
	return "This is method any";
});

// truyen tham so vao routes 
Route::get('sam-sung/{nameProduct}/{id}', function($name,$id){
	// {nameProduct} : tham so bat buoc truyen` vao` tu url cua trinh duyet
	// $name : bien dai. dien. cho tham so trong routes
	return "Samsung - {$name} / id - {$id}";
});
Route::get('iphone/{id}/{namePd?}', function($idPd,$name = null){
	// tham so khong bat buoc
	return "Iphone - {$name} / ID - {$idPd}";
});

// Routes view : Routes se tra ve 1 view HTML 
Route::view('/demo-view','demo');
// demo : name file view

// dieu` huong routes
// C1
Route::get('xem-phim', function(){
	// chuyen huong routes ve demo-view
	return redirect('demo-view');
});
// C2
Route::redirect('/home','/');
// khi vao /home se dieu` huong' ve '/' (trang chu Laravel)

// Regular Expression Constraints (Kiem tra - validate tham so cua routes)
Route::get('phim-hay/tap/{number}', function($number){
	return "Ban dang xem phim-hay tap {$number}";
})->where('number','[0-9]+');
Route::get('/phim/{nameFilm}/tap/{number}', function($name,$number){
	return "Ban dang xem phim {$name} - tap {$number}";
})->where(['nameFilm' => '[A-Za-z0-9]+','number' => '\d+']);

// app/Providers/RouteServiceProvider.php - demo
Route::get('/product/{id}', function($id){
	return "product - id {$id}";
})->Where('id','\d+')->name('product2');
Route::get('/music-vpop/{id}', function($id){
	return "music - id {$id}";
})->Where('id','\d+')->name('music@');
Route::get('nghe-nhac', function(){
	return redirect()->route('music@',['id' => 200]);
});

// get info url from route 
Route::get('info-url', function(){
	$url = route('music@', ['id' => 100]);
	// tao ra duong link url
	echo"<pre>";
	print_r($url);
});

// neu gap route loi~ thi mac. dinh. ve trang khac
Route::fallback(function(){
	return redirect('/');
});

Route::get('xem-phim-kinh-di/{age}', function(){
	return "Ban da du tuoi xem phim";
})->middleware('myCheckAge');

Route::get('Kiem-tra-so-chan-le/{number}', function($number){
	return "{$number} la so chan";
	// abcd la tham so cua middleware (goi o CheckNumberOddOrEven)
})->middleware('myCheckNumberOddEven:abcd');
Route::get('test-number', function(){
	// Middleware/CheckNumberOddOrEven
	return "Test";
});

// su dung route va controller (ten controller@action)
// app/Http/Controller/TestController
Route::get('test-controller/{name}', 'TestController@demo')->name('testController');

Route::get('test-demo', 'TestController@testDemo')->name('testDemo');
Route::get('test-index', 'TestController@index')->name('index1');

Route::get('profile/{name}/{id}', 'TestController@profile')->name('profile');
Route::get('detail-profile/{id}', 'TestController@detailProfile')->name('detailProfile');

// resources/views/login/index.blade.php
Route::get('demo-login','TestController@login')->name('fromLogin');
// name('handlelogin') = route('handleLogin') ben index.blade.php  => vao controller tao handleLogin
Route::post('handle-login','TestController@handleLogin')->name('handleLogin');

Route::get('template-blade', 'TestController@template')->name('template');
Route::get('test-home', 'TestController@testHome')->name('testHome');
Route::get('test-about', 'TestController@testAbout')->name('testAbout');


Route::get('check-snt/{num}', function($number){
	return "{$number} la so nguyen to";
})->middleware('CheckMySNT');
Route::get('check-snt2', function(){
	return "khong la so nguyen to";
});

Route::get('sign-up', 'TestController@signup')->name('Signup');
Route::post('handle-signup', 'TestController@handlesignup')->name('handleSignup');
Route::get('sign-in', 'TestController@signin')->name('Signin');
Route::post('handle-signin', 'TestController@handlesignin')->name('handleSignin');
Route::get('motobike', 'TestController@motobike')->name('Motobike');

Route::group([
	'prefix' => 'query',
	'namespace' => 'Test'
], function(){
	Route::get('select','QueryController@select')->name('Select');
	Route::get('orm','QueryController@demoOrm')->name('orm');
});

// **********************************************
Route::group([
	'namespace' => 'Frontend',
	'as' => 'fr.'
], function(){
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('{slug}~{id}', 'DetailController@index')->name('detail');
	Route::get('lg/{id}', 'DetailController@updateView')->name('viewCount');
});


// *******************************************

// Routes Group - namespace - Route Name Prefixes
// Routes Group : gom nhom cac routes thanh 1 nhom 
Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'as' => 'admin.'
], function(){
	Route::get('/login','AccountController@viewLogin')->name('viewLogin')->middleware('isAdminLogined');
	Route::post('/handle-login', 'AccountController@handleLogin')->name('handleLogin');
	Route::post('logout','AccountController@logout')->name('logout');
});
Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'as' => 'admin.',
	'middleware' => ['web','adminLogined']
], function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/list-posts', 'PostsController@index')->name('listPost');
	Route::get('/create-posts', 'PostsController@createPost')->name('createPost');
	Route::post('/handle-create-post', 'PostsController@handleCreatePost')->name('handlePost');
	Route::post('/delete-post', 'PostsController@deletePost')->name('deletePost');
	Route::get('{slug}/{id}', 'PostsController@editPost')->name('editPost');
	Route::post('handleEdit/{id}', 'PostsController@handleEdit')->name('handleEdit');
});