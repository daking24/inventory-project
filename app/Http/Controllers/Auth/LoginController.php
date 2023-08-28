<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    // Get Endpoint
    //route auth.login
    public function Index()
    {
        return view('auth.login');

    }

    //login controller methods
    // POST endpoint
    //Route admin.login.post
    public function Login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if($user->hasRole('Admin Manager')){
                return redirect()->route('admin-dashboard');
            }elseif ($user->hasRole('Sales Manager')){
                return redirect()->route('admin-dashboard');                # code...
            }
        } else {
            return back()->withError('Invalid Credentials');
        }


    }


    public function profile()
    {
        return view('profile.profile');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');

    }
}
