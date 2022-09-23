<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethods;
// use App\Http\Requests\StorePayment_methodsRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePayment_methodsRequest;


class PaymentMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment-methods.index');
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
     * @param  \App\Http\Requests\StorePayment_methodsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PaymentMethods $payment)
    {
        $payment->create($request->all());

        return redirect()->route('payment-methods')->withStatus('Payment Method is created successfully');
    }

    /**
     * Display the specified resource.
     *Payment_methods $payment_methods
     * @param  \App\Models\Payment_methods  $payment_methods
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethods $methods)
    {
        return view('payment-methods.view', compact('method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment_methods  $payment_methods
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment_methods $payment_methods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayment_methodsRequest  $request
     * @param  \App\Models\Payment_methods  $payment_methods
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayment_methodsRequest $request, Payment_methods $payment_methods)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment_methods  $payment_methods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment_methods $payment_methods)
    {
        //
    }
}
