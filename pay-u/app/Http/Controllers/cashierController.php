<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\transaksiDetail;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cashierController extends Controller
{
    //
    public function index()
    {
        return view('cashier.kasir');

    }

    public function kategoriCart(Request $request)
    {
        $category = $request->query('category');
        $stok = produk::with('kategori')->where('kategoriId', $category)->simplePaginate(8);

        return view('cashier.kategorikasir', compact('stok'));

    }

    public function tambahCart(Request $request, $id)
    {
        $cart = session('cart');
        $jumlah = $request->input('jumlah');
        $produk = produk::find($id);
        $cart[$id] = [
            "nama" => $produk->nama,
            "harga" => $produk->harga,
            "jumlah" => $jumlah
        ];

        session(["cart" => $cart]);
        return redirect("cashier/cart");
    }

    public function cart()
    {
        $cart = session("cart");

        return view('cashier.cartCashier')->with("cart", $cart);
    }

    public function hapusCart($id)
    {
        $cart = session("cart");
        unset($cart[$id]);

        session(["cart" => $cart]);

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang belanja.');
    }

    public function transaksiCart(Request $request)
    {
        $cart = session("cart");
        $customerData = $request->validate([
            "email" => "nullable|email",
            "nama" => "required|min:4|max:255",
            "alamat" => "nullable|string|min:10",
            "noHp" => "nullable|string|min:8"
        ]);

        foreach ($cart as $item => $val) {
            $produk = produk::find($item);
            if ($produk) {
                $produk->stok -= $val['jumlah'];
                $produk->save();

            }
            $total = $val['harga'] * $val['jumlah'];
            $totalBill = 0;
            $totalBill += $total;
            $id = $item;

        }
        $customer = customer::where('email', $request->email)->first();

        if (!$customer) {
            customer::create($customerData);
        }
        $custID = customer::where('email', $request->email)->pluck('id')->first();

        $transID = transaksi::addTransaksi($totalBill, $custID);

        foreach ($cart as $item => $val) {
            $jumlah = $val["jumlah"];
            $harga = $val["harga"];
            transaksiDetail::addTransaksiDetail($transID, $item, $jumlah, $harga);
        }

        session()->forget("cart");
        return redirect()->back()->with('success', 'Transaksi Berhasil');

    }

    public function history()
    {
        $data = DB::table('transaksis')->join('customers', 'transaksis.customerId', '=', 'customers.id')
            ->join('users', 'transaksis.userId', '=', 'users.id')
            ->select('transaksis.*', 'customers.nama as nama', 'users.name as name')
            ->simplePaginate(8);

        return view("history.history", compact('data'));
    }

    public function detail($id)
    {
        $invoiceId = request()->query('invoiceId');
        $nama = request()->query('nama');
        $name = request()->query('name');
        $data = DB::table('transaksidetails')->join('transaksis', 'transaksidetails.transaksiId', "=", 'transaksis.id')
            ->join('produks', 'transaksidetails.produkId', "=", "produks.id")
            ->select("transaksidetails.*", 'transaksis.invoiceId as invoice', 'produks.nama as namaproduk')
            ->where('transaksidetails.transaksiId', $id)->get();

        return view('history.detail', compact('invoiceId','nama','name','data'));
    }
}
