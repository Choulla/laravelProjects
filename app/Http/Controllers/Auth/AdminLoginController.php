<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{

	public function __construct(){
		$this->middleware("guest:admin", ["except"=>['logout']]);
	}

	public function showAdminLoginForm(){
		return view('auth.admin-login');
	}
	public function login(Request $request){
		//validate infos
		$this->validate($request,[

			'email'=>'required|email',
			'password'=>'required|min:6'
		]);
		//log in admin
		$credentials = [
			'email' => $request->email,
			'password' => $request->password
		];
		$remember = $request->remember;
		if (Auth::guard('admin')->attempt($credentials,$remember)) {
			//test if match ifos in the modal (Admin)
			return redirect()->intended(route("admin.dashboard")); 
		} 
		return redirect()->back()->withInput($request->only('email','remember'));
	}


	public function logout()
	{
		Auth::guard("admin")->logout();
		return redirect("/");
	}
}
