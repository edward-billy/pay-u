<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class registerControllerAPI extends Controller
{

    // static function register(Request $request)
    // {
    //     $validateData = $request->validate([
    //         'name' => 'required|max:255',
    //         'email' => 'required|unique:users',
    //         'password' => 'required|min:5'
    //     ]);

    //     $validateData['password'] = Hash::make($validateData['password']);

    //     User::create($validateData);
    //     return redirect('/')->with('success', 'Registrasi berhasil silahkan login kembali');
    // }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
         'name' => ['required', 'string', 'max:255'],
         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
         'password' => ['required', 'string', 'min:8'],
        ]);
        if($validator->fails()){
         return response()->json([
          'success' => false,
          'message' => $validator->errors(),
         ], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('appToken')->accessToken;
        return response()->json([
         'success' => true,
         'token' => $success,
         'user' => $user
        ]);
       }
}