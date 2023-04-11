<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class dashboardController extends Controller
{
    //
    public function index()
    {
        $chart1_options = [
            'chart_title' => 'Transaksi Bulanan',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\transaksi',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'aggregate_field' => 'amount',
            'chart_type' => 'bar',
            'height' => '200',
            'width' => '200',
            'date_format' => 'F Y', // Add this line to format the date as month name and year
            'group_by_field_format' => 'm-Y', // Add this line to format the group by field to month and year
        ];
    
        $chart1 = new LaravelChart($chart1_options);

        return view('Dashboard', compact('chart1'));
    }
}
