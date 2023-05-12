<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginControllerAPI extends Controller
{
    // public function index()
    // {
    //     return response()->json([
    //         'message' => 'Success',
    //         'view' => view('registlogin.login')->render()
    //     ]);
    // }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
            return response()->json([
             'success' => true,
             'token' => $success,
             'user' => $user,
            ]);
        } else{
            return response()->json([
             'success' => false,
             'message' => 'Invalid Email or Password',
            ], 401);
        }
    }

    public function logout(Request $request){
        if(Auth::user()){
         $user = Auth::user()->token();
         $user->revoke();
      return response()->json([
          'success' => true,
          'message' => 'Logout successfully',
         ]);
        } else{
         return response()->json([
          'success' => false,
          'message' => 'Unable to Logout',
         ]);
        }
       }
}