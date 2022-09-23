<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Provider;
use App\Models\Product;
use App\Models\ReceivedProduct;
use App\Http\Requests\StorereceiptRequest;
use App\Http\Requests\UpdatereceiptRequest;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('inventory.receipts.index',[
            'provider' => Provider::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Receipt $receipt)
    {

        return view('inventory.receipts.summary',[
            'product' => Product::all(),
            'receipt' => $receipt
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorereceiptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  Receipt $receipt)
    {
        $receipt = $receipt->create($request->all());

        return redirect()
            ->route('receipt-create', $receipt)
            ->withStatus('Receipt registered successfully, you can start adding the products belonging to it.');
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
    public function edit(Receipt $receipt)
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


    public function storeproduct(Request $request, Receipt $receipt, ReceivedProduct $receivedproduct)
    {
        $receivedproduct->create($request->all());

        return redirect()
            ->route('receipt-create', $receipt)
            ->withStatus('Product added successfully.');
    }

}
