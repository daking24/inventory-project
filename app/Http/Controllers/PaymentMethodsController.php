<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethods;
use Carbon\Carbon;
use App\Models\Transaction;
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
        return view('payment-methods.index',[
            'methods' => PaymentMethods::paginate(15),
            'month' => Carbon::now()->month
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
    public function show(PaymentMethods $method)
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

        $transactionname = [
            'income' => 'Income',
            'payment' => 'Payment',
            'expense' => 'Expense',
            'transfer' => 'Transfer'
        ];

        $balances = [
            'daily' => Transaction::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->sum('amount'),
            'weekly' => Transaction::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount'),
            'quarter' => Transaction::whereBetween('created_at', [Carbon::now()->startOfQuarter(), Carbon::now()->endOfQuarter()])->sum('amount'),
            'monthly' => Transaction::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amount'),
            'annual' => Transaction::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('amount'),
        ];
        return view('payment-methods.view', [
            'methods' => $method,
            'transactions' => Transaction::where('payment_methods_id', $method->id)->latest()->paginate(25),
            'balances' => $balances,
            'transactionname' => $transactionname
        ]);
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
