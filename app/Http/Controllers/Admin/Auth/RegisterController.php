<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegiForm()
    {
        return view('admin.auth.registration');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function rules($data)
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'address' => 'string|max:1000',
            //'image_url' => 'string|min:6|mimes:jpeg,gif,png',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function register(Request $request)
    {   
        $data = $request->all();
        $this->validate($request, $this->rules($data));
        $admin = Admin::create([
            'name' => $data['name'],   
            'email' => $data['email'],
            'address' => $data['address'],
            //'image_url' => $data['image_url'],
            'password' => bcrypt($data['password']),
        ]);
        $this->guard()->login($admin);
        return redirect($this->redirectTo);
    }


    public function guard()
    {
        return Auth::guard('admin_guard');
    }
}
