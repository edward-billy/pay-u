<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    static function index()
    {
        return view('TempLogin');
    }
    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
 
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('dashboard');
    //     }
    // }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
        
    }
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}