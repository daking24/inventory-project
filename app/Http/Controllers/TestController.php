<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // For Testing
    public function expense()
    {
        return view('transactions.expense.index');
    }

    public function income()
    {
        return view('transactions.income.index');
    }
}
