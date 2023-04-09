<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kasirController extends Controller
{
    //
    public function index()
    {
        return view('cashier.kasir');
    }
}