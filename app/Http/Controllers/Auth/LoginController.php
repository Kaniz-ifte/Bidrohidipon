<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use URL;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/my-courses';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $req)
    {

        $credentials = $req->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|max:255',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }



        if (Auth::attempt(['email' => $req->email ,'password' => $req->password]) || Auth::attempt(['phone' => $req->email ,'password' => $req->password]))  {
             Auth::logoutOtherDevices($req->password);

             $user=User::where("id",Auth::User()->id)->first();
             $user->active_session=session()->getId();
             $user->save();

            return  redirect()->back();

        } else {

             return redirect()->back()
                         ->withErrors(['email'=> __('auth.failed')])
                         ->withInput();
        }
    }


}
