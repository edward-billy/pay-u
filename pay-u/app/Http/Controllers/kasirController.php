<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class kasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $category = $request->input('category');

        // $stok = produk::with('kategori')->where('kategoriId', $category)->simplePaginate(8);

        return view('cashier.kasir');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $category = $request->query('category');

        $stok = produk::with('kategori')->where('kategoriId', $category)->simplePaginate(8);

        return view('cashier.kategorikasir', compact('stok'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}