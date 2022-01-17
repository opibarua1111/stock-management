<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    //protected $redirectTo = '/home';
    public function redirectTo()
    {
        $role = Auth::user()->role;
        $status = Auth::user()->status;
        if ($role=='admin' && $status=='active')
            return '\home';
        elseif ($role=='user' && $status=='pending')
            return '\verify-user';
        else
            return '/login';

        // Check user role
//        switch ($role) {
//            case 'admin':
//                return '/home';
//                break;
//            case 'user':
//                return '/points';
//                break;
//            default:
//                return '/login';
//                break;
//        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
