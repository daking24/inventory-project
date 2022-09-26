<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Provider;
use App\Models\Product;
use App\Models\ReceivedProduct;
use App\Http\Requests\StorereceiptRequest;
use App\Http\Requests\UpdatereceiptRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            'provider' => Provider::all(),
            'receipts' => Receipt::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Receipt $receipt)
    {

        $products = Product::all();
        return view('inventory.receipts.summary', compact('receipt', 'products'));
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
    public function show(Receipt $receipt)
    {
        return view('inventory.receipts.finalized-summary', compact('receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {

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


    public function finalize(Receipt $receipt)
    {
        $receipt->finalized_at = Carbon::now()->toDateTimeString();
        $receipt->save();

        foreach($receipt->products as $receivedproduct) {
            $receivedproduct->product->stock += $receivedproduct->stock;
            $receivedproduct->product->stock_defective += $receivedproduct->stock_defective;
            $receivedproduct->product->save();
        }

        return redirect()->route('receipt-view', $receipt)->withStatus('Receipt successfully completed.');
    }


}
