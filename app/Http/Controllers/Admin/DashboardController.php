<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request){
    	// 'usernam' : ten put('username') ben AccountController
    	// $username = $request->session()->get('username');
    	// $email = $request->session()->get('email');
    	// echo $username . '  _____  ' . $email;

    	return view('admin.dashboard.index');
    }
}
