<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function __construct(){
    	// trieu goi middleware(noi loc. cac request) o day
    	// $this->middleware('TestMiddlewareController');
    	// $this->middleware('TestMiddlewareController')->only('demo');

    	// abcd : tham so middleware
    	$this->middleware('TestMiddlewareController:abcd')->only(['demo','testDemo']);

    	// except (ngoai tru demo , testDemo => chay vao index)
    	// $this->middleware('TestMiddlewareController')->except(['demo','testDemo']);
    }

    public function demo(){
    	return "This is ". __FUNCTION__;
    }

    public function testDemo(){
    	return "This is ". __CLASS__;
    }

    public function index(){
    	return "This is index";
    }

    public function profile($nameProduct, $idPd){
    	// lam the nao de phuong thuc profile nhan dc gia tri cua tham so ma route gui len
    	return "name product - {$nameProduct} / id - {$idPd}";
    }

    public function detailProfile(Request $request){
    	// id = {id} (Route)
    	$id = $request->id;
    	$page = $request->page;
    	$key = $request->key;
    	$age = $request->input('age');
    	return "This is id : {$id} - page : {$page} - key : {$key} - age : {$age}";
    }

    public function login(){
    	// goi view - nap view vao method controller.
    	return view('login.index');
    }

    public function handleLogin(Request $request){
    	// nhan cac du lieu tu form gui len thong qua doi tuong Request
    	// $data = $request->all();
    	// dd($data);

    	// c1
    	$user = $request->input('user');
    	// c2
    	$pass = $request->pass;
    	dd($user, $pass);
    }

    public function template(){
    	// return view('test-layout');
        $data = [];
        $data['lstInfoStudent'] = [
            [
                'msv' => 113,
                'name' => 'abc',
                'age' => 29,
                'phone' => '1241241',
                'gender' => 1,
                'money' => 2500
            ],
            [
                'msv' => 114,
                'name' => 'abcd',
                'age' => 28,
                'phone' => '1231241241',
                'gender' => 1,
                'money' => 3000
            ],
            [
                'msv' => 115,
                'name' => 'abcde',
                'age' => 22,
                'phone' => '121314241241',
                'gender' => 2,
                'money' => 1500
            ]
        ];
    	return view('home.index',$data);
    }
    public function testAbout(){
    	$age = 29;
    	return view('about.index')->with('myage',$age);
    }
    public function testHome(){
    	$data = [
    		'name' => 'abc',
    		'age' => 29,
    		'phone' => '901331'
    	];
    	return view('home.home',$data);
    }

    public function Signup(){
        return view('signup.index');
    }
    public function handleSignup(Request $request){
        if(isset($_POST['btnSignup'])){
            $nuser = $_POST['nuser'] ?? '';
            $npass = $_POST['npass'] ?? '';
            $email = $_POST['email'] ?? '';

            if(empty($nuser) || empty($npass) || empty($email)){
                return redirect()->route('Signup');
            } else{
                $fp = fopen('database.txt', 'a+');
                if($fp){
                    $data = $nuser.'-'.$npass.'-'.$email.';';
                    $input = fwrite($fp, $data);
                    if($input){
                        return redirect()->route('Signin');
                    } else{
                        return redirect()->route('Signup');
                    }
                } else{
                    return redirect()->route('Signup');
                }
            }
        }
    }
    public function Signin(){
        return view('signin.index');
    }
    public function handleSignin(Request $request){
       
            $user = $request->user;
            $pass = $request->pass;
            // dd($user,$pass);

            if(empty($user) || empty($pass)){
                return redirect()->route('Signin');
            } else{
                $fp = fopen('database.txt', 'r+');
                if($fp){
                    $input = $user.'-'.$pass;
                    $data = fread($fp, filesize('database.txt'));
                    if(strpos($data, $input)){
                        $remember = $request->remember;
                        if($remember == 'on'){
                            setcookie('cookie',$user,time()+1600,'/','',0);
                        } else{
                            setcookie('cookie',$user,time()+16,'/','',0);
                        }

                        // $_SESSION['session'] = $user;

                        return redirect()->route('handleLogin');
                    }
                } else{
                    return redirect()->route('Signin');
                }
            }
        
    }
    public function Motobike(){
        $data = [];
        $data['name'] = [
            [
                'ID' => 001,
                'Name' => 'Wave ZX',
                'Manufactur' => 'Honda',
                'CC' => 110,
                'Frame number' => 'EAR003FG',
                'Machine number' => 'FGRE345KO',
                'Year of manufactur' => 2010
            ],
            [
                'ID' => 002,
                'Name' => 'Dream II',
                'Manufactur' => 'Honda',
                'CC' => 100,
                'Frame number' => 'RGH403HJ',
                'Machine number' => 'EFG456LO',
                'Year of manufactur' => 2008
            ],
            [
                'ID' => 003,
                'Name' => 'Sirius',
                'Manufactur' => 'Yamaha',
                'CC' => 125,
                'Frame number' => 'HKI089NMF',
                'Machine number' => 'EKL045EJG',
                'Year of manufactur' => 2016
            ],
        ];

        return view('about.index',$data);
    }
}
