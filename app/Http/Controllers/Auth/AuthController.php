<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    // Redirect user after registration
    protected $redirectTo = '/';

    // Redirect user after login
    protected $redirectPath = '/';

    protected $loginUsername = 'user_id';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'user_id' => 'required|size:4|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function postLogin(Request $request)
    {
        //pass through validation rules
        $this->validate($request, ['user_id' => 'required', 'password' => 'required']);
        $credentials = [
            'user_id' => trim($request->get('user_id')),
            'password' => trim($request->get('password'))
        ];

        //log in the user
        if (Auth::attempt($credentials)) {
             return redirect()->intended('/');
        }

        //show error if invalid data entered
        return redirect()->back()->withErrors('Invalid credentials')->withInput();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'user_id' => $data['user_id'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
