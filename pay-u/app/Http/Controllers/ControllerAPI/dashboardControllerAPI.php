<?php
namespace App\Http\Controllers\ControllerAPI;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use App\Models\transaksiDetail;
use App\Models\Customer;
use Carbon\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardControllerAPI extends Controller
{
    public function index()
    {
        $totalPenjualan = Transaksi::sum('total');
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $totalPenjualanBulan = transaksi::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('total');
        $totalProdukTerjual = transaksiDetail::sum('jumlah');
        $totalPengunjung = Customer::count();

        $chart1_options = [
            'chart_title' => 'Jumlah Transaksi Bulanan',
            'report_type' => 'group_by_date',
            'model' => transaksi::class,
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'aggregate_field' => 'amount',
            'chart_type' => 'bar',
            'date_format' => 'F Y',
            'group_by_field_format' => 'm-Y',
        ];

        $chart1 = new LaravelChart($chart1_options);

        $data = [
            'totalPenjualan' => $totalPenjualan,
            'totalPenjualanBulan' => $totalPenjualanBulan,
            'totalProdukTerjual' => $totalProdukTerjual,
            'totalPengunjung' => $totalPengunjung,
            'chart1' => $chart1,
        ];

        return response()->json($data, 200);
    }
}