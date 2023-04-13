<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\transaksi;
use App\Models\transaksiDetail;
use App\Models\produk;
use App\Models\customer;

class dashboardController extends Controller
{
    //
    public function index()
    {
        $totalPenjualan = transaksi::sum('total');
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $totalPenjualanBulan = transaksi::whereMonth('created_at', $currentMonth)->
        whereYear('created_at', $currentYear)->sum('total');
        $totalProdukTerjual = transaksiDetail::sum('jumlah');
        $totalPengunjung = customer::count();

        $chart1_options = [
            'chart_title' => 'Jumlah Transaksi Bulanan',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\transaksi',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'aggregate_field' => 'amount',
            'chart_type' => 'bar',
            'date_format' => 'F Y', 
            'group_by_field_format' => 'm-Y',
        ];
    
        $chart1 = new LaravelChart($chart1_options);

        return view('Dashboard', compact('totalPenjualan','totalPenjualanBulan','totalProdukTerjual','totalPengunjung','chart1'));
    }
}
