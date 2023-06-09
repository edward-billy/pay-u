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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class cashierControllerAPI extends Controller
{
    //
    public function index()
    {
        return response()->json(['message' => 'Welcome to the cashier index page']);
    }

    public function kategoriCart($id)
    {
        $category = $id;
        $stok = produk::with('kategori')->where('kategoriId', $category)->get();

        return response()->json(
            [
                'data' => $stok,
                'success' => true
            ],
            200
        );
    }

    public function tambahCart(Request $request, $id)
    {
        $jumlah = $request->jumlah;
        $produk = produk::find($id);
        $existingCart = json_decode(Cookie::get('cart'), true) ?? [];
        $existingCart[$id] = [
            "nama" => $produk->nama,
            "harga" => $produk->harga,
            "jumlah" => $jumlah,
            "iduser" => auth()->user()->id
        ];
        $cookieCart = Cookie::make('cart', json_encode($existingCart), 1440);
        // $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $output->writeln("hello goodbye");
        // session(["cart" => $cart]);
        // $var = session('cart');
        return response()->json(['message' => 'Item added to cart successfully', 'data' => $cookieCart->getValue()])
            ->cookie($cookieCart);
    }

    public function cart()
    {

        // $cart = Session::get('nama');
        $cookieCart = Cookie::get('cart');
        $cart = json_decode($cookieCart, true);

        print_r($cart);
        // Lakukan sesuatu dengan data cart
        // Misalnya, tampilkan data cart
        return response()->json(['data' => $cart]);

    }

    public function hapusCart($id)
    {
        $existingCart = json_decode(Cookie::get('cart'), true) ?? [];

        unset($existingCart[$id]);
        $cookieCart = Cookie::make('cart', json_encode($existingCart), 1440);

        return response()->json(['message' => 'Item removed from cart successfully'])
            ->cookie($cookieCart);
    }


    public function transaksiCart(Request $request)
    {
        $cart = json_decode($request->input('cart'), true);
        $customerData = $request->validate([
            "email" => "required|email",
            "nama" => "required|min:4|max:255",
            "alamat" => "nullable|string|min:10",
            "noHp" => "nullable|string|min:8"
        ]);

        $totalBill = 0;

        if ($cart != null) {
            foreach ($cart as $item) {
                $produk = Produk::find($item['id']);

                if ($produk) {
                    $produk->stok -= $item['jumlah'];
                    $produk->save();
                }

                $total = $item['harga'] * $item['jumlah'];
                $totalBill += $total;
            }
        }

        $customer = Customer::where('email', $request->email)->first();

        if (!$customer) {
            $customer = Customer::create($customerData);
        }

        $custID = $customer->id;

        $transID = Transaksi::addTransaksi($totalBill, $custID);

        if ($cart != null) {
            foreach ($cart as $item) {
                $jumlah = $item["jumlah"];
                $harga = $item["harga"];
                TransaksiDetail::addTransaksiDetail($transID, $item['id'], $jumlah, $harga);
            }
        }

        $response = response()->json(['message' => 'Transaction successful', 'cart' => $cart]);

        return $response;
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