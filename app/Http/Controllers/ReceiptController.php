<?php

namespace App\Http\Controllers;

use App\Models\receipt;
use App\Http\Requests\StorereceiptRequest;
use App\Http\Requests\UpdatereceiptRequest;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory.receipts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.receipts.summary');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorereceiptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorereceiptRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *receipt $receipt
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('inventory.receipts.finalized-summary');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatereceiptRequest  $request
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatereceiptRequest $request, receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(receipt $receipt)
    {
        //
    }
}
