<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;

class profileController extends Controller
{
    //
    public function index()
    {
        return view('profile');
    }
}