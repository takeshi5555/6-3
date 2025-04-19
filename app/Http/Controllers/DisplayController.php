<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spending;
use App\Models\Income;
use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    public function index()
    {
        $spending = new Spending;
        $income = new Income;
        $all1 = $income->where('del_flg', 0)->get()->toArray();
        $all = $spending->where('del_flg', 0)->get()->toArray();
        return view('home',[
            'spends' =>$all,
            'incomes' =>$all1,
        ]);


    }
    public function spendDetail(int $spendId)
    {
        $spend = Spending::with('type')->findOrFail($spendId);

        return view('spend.detail', ['spend' => $spend]);
    }

    public function incomeDetail(int $incomeId)
    {
        $income = Income::with('type')->findOrFail($incomeId);

        return view('income.detail', ['income' => $income]);
    }
}



