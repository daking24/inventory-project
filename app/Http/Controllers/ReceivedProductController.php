<?php

namespace App\Http\Controllers;

use App\Models\received_product;
use App\Http\Requests\Storereceived_productRequest;
use App\Http\Requests\Updatereceived_productRequest;

class ReceivedProductController extends Controller
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
     * @param  \App\Http\Requests\Storereceived_productRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storereceived_productRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\received_product  $received_product
     * @return \Illuminate\Http\Response
     */
    public function show(received_product $received_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\received_product  $received_product
     * @return \Illuminate\Http\Response
     */
    public function edit(received_product $received_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatereceived_productRequest  $request
     * @param  \App\Models\received_product  $received_product
     * @return \Illuminate\Http\Response
     */
    public function update(Updatereceived_productRequest $request, received_product $received_product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\received_product  $received_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(received_product $received_product)
    {
        //
    }
}
