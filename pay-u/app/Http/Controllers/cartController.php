<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class cartController extends Controller
{
    //

    public function index()
    {
        // $stok = produk::with('kategori')->simplePaginate(8);
        $selected = 9;
        $stok = produk::with('kategori')->where('kategoriId', $selected)->simplePaginate(8);
        return view('cashier.but', compact('stok'));
    }

// public function choose(Request $request)
// {

//     $request->validate([
//         'nama' => 'required'
//     ]);

//     $kategori = new kategori;
//     $kategori->nama = $request->nama;
//     $id = kategori::where('nama', $request->nama);
//     // dd($request->nama);

//     session()->flash('success', 'awdawd.');
//     return redirect("/cart");

// }


}