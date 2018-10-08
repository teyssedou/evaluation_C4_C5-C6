<?php

namespace App\Http\Controllers;

use App\Category_value;
use App\Total_value;

class StatisticController extends Controller
{
    public function totalValue()
    {
        $total = Total_value::first();
        $categoryValue = Category_value::all();

        return view('statistic', [
            'total' => $total,
            'categoryValue' => $categoryValue,
        ]);
    }
}
