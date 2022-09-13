<?php

namespace App\Http\Controllers;

use App\Models\Sold_product;
use App\Http\Requests\StoreSold_productRequest;
use App\Http\Requests\UpdateSold_productRequest;

class SoldProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSold_productRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSold_productRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sold_product  $sold_product
     * @return \Illuminate\Http\Response
     */
    public function show(Sold_product $sold_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sold_product  $sold_product
     * @return \Illuminate\Http\Response
     */
    public function edit(Sold_product $sold_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSold_productRequest  $request
     * @param  \App\Models\Sold_product  $sold_product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSold_productRequest $request, Sold_product $sold_product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sold_product  $sold_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sold_product $sold_product)
    {
        //
    }
}
