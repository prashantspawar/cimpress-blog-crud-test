<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Hash;
use Redirect;

use App\Models\User;

class UserController extends Controller
{

	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	public function loginShow(){
		$password =  Hash::make('pawar');
		return view('backend.login');
	}

	public function login(Request $request){
		$email 		= 	Input::get("email");
		$password 	= 	Input::get("password");

		$user = $this->user->where('email', '=', $email)->first();

		if (Hash::check($password, $user->password)){
			session()->put('userLogged', "1");
			session()->put('userId', $user->id);
			session()->put('email', $email);
			session()->put('userType', $user->user_type);
			return redirect(url('backend/blogs'));
			exit('Login Successfully!!!');
		}else{
			return Redirect::back()->withErrors(['Invalid Login'])->withInput();
			exit('Invalid Login');
		}

	}
	
	public function logout(Request $request){
		Session()->flush();
		return redirect(route('login'));
	}

}
