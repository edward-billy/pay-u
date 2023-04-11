<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok = produk::with('kategori')->simplePaginate(8);
        return view('produk.stokbarang', compact('stok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategoris = kategori::all();
        return view('produk.addStokbarang', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

        session()->flash('success', 'Produk telah ditambahkan.');
        return redirect("product");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = produk::where('kategoriId');
        // $produk = produk::find($id);
        return view('produk.detailstokbarang', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $produk = produk::find($id);
        $kategoris = kategori::all();

        return view('produk.editstokbarang', compact('produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
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
                'foto_produk.required' => 'Kolom ini wajib diisi',
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
            // $produk->nama = $request->nama;
            // $produk->kategoriId = $request->kategoriId;
            // $produk->deskripsi = $request->deskripsi;
            // $produk->stok = $request->stok;
            // $produk->harga = $request->harga;
            // $produk->foto_produk = $request->foto_produk;
            // $produk->save();

        } else {
            produk::where('id', $produk->id)
                ->update([
                    'nama' => $request->nama,
                    'kategoriId' => $request->kategoriId,
                    'deskripsi' => $request->deskripsi,
                    'stok' => $request->stok,
                    'harga' => $request->harga,

                ]);

            // $produk->nama = $request->nama;
            // $produk->kategoriId = $request->kategoriId;
            // $produk->deskripsi = $request->deskripsi;
            // $produk->stok = $request->stok;
            // $produk->harga = $request->harga;

            // $produk->save();

        }

        session()->flash('success', 'Produk telah diupdate.');
        return redirect("product");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = produk::find($id);
        if ($produk->foto_produk <> "") {
            unlink(public_path('kategori') . '/' . $produk->foto_produk);
        }
        produk::destroy($id);

        session()->flash('success', 'Produk telah berhasil dihapus.');
        return redirect("product");
    }
}