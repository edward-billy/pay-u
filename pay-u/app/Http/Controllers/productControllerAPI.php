<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class productControllerAPI extends Controller
{
    //
    public function index()
    {
        $stok = produk::with('kategori')->paginate(8);

        return response()->json([
            'message' => 'Success',
            'stok' => $stok,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = kategori::all();
        return response()->json([
            'message' => 'Success',
            'kategoris' => $kategoris,
        ]);
    }

    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'nama' => 'required|min:3',
                'kategoriId' => 'required',
                'deskripsi' => 'required:min:3',
                'stok' => 'required|integer|min:1',
                'harga' => 'required|integer|min:1',
                'foto_produk' => 'required|mimes:jpg,png,jpeg|max:16000'
            ],
            [
                'nama.min' => 'Kolom harus memiliki minimal 3 karakter',
                'nama.required' => 'Kolom ini wajib diisi',
                'deskripsi.min' => 'Kolom harus memiliki minimal 3 karakter',
                'deskripsi.required' => 'Kolom ini wajib diisi',
                'stok.required' => 'Kolom ini wajib diisi',
                'stok.integer' => 'Kolom harus berupa integer',
                'stok.min' => 'Kolom harus memiliki minimal 1 karakter',
                'harga.integer' => 'Kolom harus berupa integer',
                'harga.required' => 'Kolom ini wajib diisi',
                'harga.min' => 'Kolom harus memiliki minimal 1 karakter',
                'foto_produk.required' => 'Kolom ini wajib diisi',
            ]
        );

        $file = Request()->foto_produk;
        $fileName = Request()->nama . '.' . $file->extension();
        $file->move(public_path('kategori'), $fileName);

        $produk = new produk;
        $produk->nama = $request->nama;
        $produk->kategoriId = $request->kategoriId;
        $produk->deskripsi = $request->deskripsi;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->foto_produk = $fileName;

        $produk->save();

        $response = [
            'message' => 'Product has been added.',
        ];

        return response()->json($response);
    }

    public function show($id)
    {
        $produk = produk::find($id);
        return response()->json([
            'message' => 'Success',
            'produk' => $produk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = produk::find($id);
        $kategoris = kategori::all();

        return response()->json([
            'message' => 'Success',
            'produk' => $produk,
            'kategoris' => $kategoris,
        ]);
    }

    public function update(Request $request, $id)
    {
        //
        $produk = produk::find($id);
        $request->validate(
            [
                'nama' => 'required|min:3',
                'kategoriId' => 'required',
                'deskripsi' => 'required:min:3',
                'stok' => 'required|integer|min:1',
                'harga' => 'required|integer|min:1',
                'foto_produk' => 'mimes:jpg,png,jpeg|max:16000'
            ],
            [
                'nama.min' => 'Kolom harus memiliki minimal 3 karakter',
                'nama.required' => 'Kolom ini wajib diisi',
                'deskripsi.min' => 'Kolom harus memiliki minimal 3 karakter',
                'deskripsi.required' => 'Kolom ini wajib diisi',
                'stok.required' => 'Kolom ini wajib diisi',
                'stok.integer' => 'Kolom harus berupa integer',
                'stok.min' => 'Kolom harus memiliki minimal 1 karakter',
                'harga.integer' => 'Kolom harus berupa integer',
                'harga.required' => 'Kolom ini wajib diisi',
                'harga.min' => 'Kolom harus memiliki minimal 1 karakter',

            ]
        );

        if (Request()->foto_produk <> "") {
            $file = Request()->foto_produk;
            $fileName = Request()->nama . '.' . $file->extension();
            // unlink(public_path('kategori') . '/' . $produk->foto_produk);
            $file->move(public_path('kategori'), $fileName);

            produk::where('id', $produk->id)
                ->update([
                    'nama' => $request->nama,
                    'kategoriId' => $request->kategoriId,
                    'deskripsi' => $request->deskripsi,
                    'stok' => $request->stok,
                    'harga' => $request->harga,
                    'foto_produk' => $fileName,
                ]);

        } else {
            produk::where('id', $produk->id)
                ->update([
                    'nama' => $request->nama,
                    'kategoriId' => $request->kategoriId,
                    'deskripsi' => $request->deskripsi,
                    'stok' => $request->stok,
                    'harga' => $request->harga,

                ]);
        }

        session()->flash('success', 'Produk telah diupdate.');
        return redirect("product");
    }

    public function destroy(string $id)
    {
        $produk = produk::find($id);
        if ($produk->foto_produk <> "") {
            unlink(public_path('kategori') . '/' . $produk->foto_produk);
        }
        produk::destroy($id);

        return response()->json([
            'message' => 'Product has been deleted.',
        ]);
    }
}