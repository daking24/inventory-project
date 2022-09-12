<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminIndex()
    {
        return view('admin.dashboard');
    }

    public function saleIndex()
    {
        return view('sales-manager.dashboard');
    }
}
