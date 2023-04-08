<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    //
    static function index()
    {
        return view('registlogin.Register');
    }
    static function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:5'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        return redirect('/')->with('success', 'Registrasi berhasil silahkan login kembali');
    }

}