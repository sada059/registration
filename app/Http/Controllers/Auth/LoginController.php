<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Requests\customRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use App\User;
use Auth;
use App\Users;
use App\UserProfile;
use DateTime;
use DB;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
    logout as performLogout;
}

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getRegister()
    {
            return view('auth.register');
    }

	/**
     * registration form.
     *
     * @param type User            $user
     * @param type RegisterRequest $request
     *
     * @return type Response
     */
	 
	 
    /*public function postRegister(User $user,Request $request)
    {
		    if(\Request::isMethod('get'))
    {
            return view('auth.register');
    }
	elseif(\Request::isMethod('post')) {
		*/  
    public function postRegister(User $user,UserProfile $user_profile, customRequest $request) {
		
	try {
            $password = Hash::make($request->input('user_password'));
            $user->password = $password;
            $name = $request->input('user_name');
            $user->user_name = $name;
           $user->user_id = $name;
            $code = str_random(60);
            $user->remember_token = $code;
            $user->save();
			$user_profile->user_id = $user->id;
			$user_profile->user_email = $request->input('user_email');
			$user_profile->states = 'Karnataka';
			$user_profile->save();
            $message = 'You have been registered into the system';
            return redirect()->back()->with('success', $message);
		
        } catch (\Exception $e) {
            return redirect()->back()->with('fails', $e->getMessage());
        }
		/*
        try {
            $request_array = $request->input();
			$validator = Validator::make($request, [
            'user_name' => 'required|bannedUserwords|unique:users|min:8|max:12|alpha_num',
			'user_email' => 'required|email|unique:user_profiles',
			'user_password' => 'required|min:8|max:12|alpha_num|different:user_name|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
			'confirm_password' => 'required|same:user_password'
        ]);
		if($validator->passes()) {
            $password = Hash::make($request->input('user_password'));
            $user->password = $password;
            $name = $request->input('user_name');
            $user->user_name = $name;
            
            $code = str_random(60);
            $user->remember_token = $code;
            $user->save();
            $message12 = '';

            return redirect('/')->with('success', $message12);
		}
        } catch (\Exception $e) {
            return redirect()->back()->with('fails', $e->getMessage());
        }
		*/
    }
	
}
