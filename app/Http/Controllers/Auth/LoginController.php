<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\http\Request\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    // Get Endpoint
    //route auth.login
    public function Index()
    {
        return view('auth\login');

    }

    //login controller methods
    // POST endpoint 
    //Route admin.login.post
    public function Login(LoginRequest $request)
    {
        try {
            if(Auth::attempt($request->only('email', 'password')))
            {
                if(Auth::user->hasRole(User::Role_Admin)){
                    return redirect()->route('admin_dashboard');
                }
                elseif(Auth::user->hasRole(User::Role_Sale)){
                    return redirect()->route('sale_dashboard');
                }
            }
        
        } catch (\Exception $e) {
            return redirect()->back()->withError(['message' => $e->getMessage]);
        }
    } 
}
