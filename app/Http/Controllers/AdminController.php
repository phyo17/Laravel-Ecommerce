<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {
    	if($request->isMethod('post')){
    		$data=$request->all();
    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
    		{
    			return redirect('admin/dashboard');
    		}else
    		{
    			return redirect('adminlogin')->with('error_message',"Invalid Email or Password");
    		}
    	}
    	return view('back.admin_login');
    }

    public function dashboard()
    {
    	return view('back.dashboard');
    }

    public function logout()
    {
    	Session::flush();
    	return redirect('adminlogin')->with('success_message','Logout Successfully');
    }
}
