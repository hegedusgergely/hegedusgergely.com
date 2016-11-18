<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Credit;
use Request;

class kamatosController extends Controller
{
    public function index()
    {
        return view('kamatos.index');
    }

    public function calculate()
    {
        $input = Request::all();

        $credit = new Credit;

        $credit->setLoan($input['loan']);

        $credit->setDurationInMonth($input['duration']);

        $credit->setInterestRate($input['interest']);

        $credit->setInterestRateForAMonth(1);

        $credit->setReedemForAMonth(1);

        $credit->setLoanCounter(1);

        $credit->setInterestRateCounter(1);

        $credit->setSumInterestRate(1);

        return view('kamatos.calculate', ['credit' => $credit]);
    }
}
