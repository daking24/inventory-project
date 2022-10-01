<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use App\Models\SoldProduct;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class InventoryStatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $role = $user->getRoleNames()->first();
        return view('inventory.stats', [
            'categories' => ProductCategory::all(),
            'products' => Product::all(),
            'soldproductsbystock' => SoldProduct::selectRaw('product_id, max(created_at), sum(quantity) as total_qty, sum(total_amount) as incomes, avg(unit_price) as avg_price')->whereYear('created_at', Carbon::now()->year)->groupBy('product_id')->orderBy('total_qty', 'desc')->limit(15)->get(),
            'soldproductsbyincomes' => SoldProduct::selectRaw('product_id, max(created_at), sum(quantity) as total_qty, sum(total_amount) as incomes, avg(unit_price) as avg_price')->whereYear('created_at', Carbon::now()->year)->groupBy('product_id')->orderBy('incomes', 'desc')->limit(15)->get(),
            'soldproductsbyavgprice' => SoldProduct::selectRaw('product_id, max(created_at), sum(quantity) as total_qty, sum(total_amount) as incomes, avg(unit_price) as avg_price')->whereYear('created_at', Carbon::now()->year)->groupBy('product_id')->orderBy('avg_price', 'desc')->limit(15)->get(),
            'user' => $user,
            'role' => $role,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
