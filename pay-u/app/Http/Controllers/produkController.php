<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produkController extends Controller
{
    public function index()
    {
        return view('TempStokbarang');

    }
}