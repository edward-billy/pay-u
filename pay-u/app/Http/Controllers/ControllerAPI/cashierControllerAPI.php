<?php

namespace App\Http\Controllers\ControllerAPI;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\transaksiDetail;
use Cart;
use League\Csv\Writer;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cashierControllerAPI extends Controller
{
    //
    public function index()
    {
        return response()->json(['message' => 'Welcome to the cashier index page']);
    }

    public function kategoriCart(Request $request)
    {
        $category = $request->query('category');
        $stok = produk::with('kategori')->where('kategoriId', $category)->get();

        return response()->json(['stok' => $stok]);
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
        return response()->json(['message' => 'Item added to cart successfully']);
    }

    public function cart()
    {
        $cart = session("cart");

        return response()->json(['cart' => $cart]);
    }

    public function hapusCart($id)
    {
        $cart = session("cart");
        unset($cart[$id]);

        session(["cart" => $cart]);

        return response()->json(['message' => 'Item removed from cart successfully']);
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
            $totalBill =+ $total;
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
        return response()->json(['message' => 'Transaction successful']);
    }

    public function history()
    {
        $data = DB::table('transaksis')->join('customers', 'transaksis.customerId', '=', 'customers.id')
            ->join('users', 'transaksis.userId', '=', 'users.id')
            ->select('transaksis.*', 'customers.nama as nama', 'users.name as name')
            ->paginate(8);

        return response()->json(['data' => $data]);
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

        return response()->json(['invoiceId' => $invoiceId, 'nama' => $nama, 'name' => $name, 'data' => $data]);
    }

    public function generateCsv()
    {
        $data = DB::table('transaksis')->join('customers', 'transaksis.customerId', '=', 'customers.id')
            ->join('users', 'transaksis.userId', '=', 'users.id')
            ->select('transaksis.*', 'customers.nama as nama', 'users.name as name')
            ->get();

        // Set the headers for the CSV file
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=" . date("d-m-Y") . "_history.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        // Open a file pointer with "w" write mode
        $fp = fopen('php://output', 'w');

        // Write the headers to the file
        fputcsv($fp, array('No', 'Invoice ID', 'Nama Customer', 'Nama Kasir', 'Total'));

        // Loop through the data and write it to the file
        $no = 1;
        foreach ($data as $row) {
            fputcsv($fp, array($no++, $row->invoiceId, $row->nama, $row->name, $row->total));
        }

        // Close the file pointer
        fclose($fp);

        // Return the response with headers and file contents
        return response(file_get_contents('php://output'), 200, $headers);
    }
}
