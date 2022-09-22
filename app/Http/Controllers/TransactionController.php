<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\PaymentMethods;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionname = [
            'income' => 'Income',
            'payment' => 'Payment',
            'expense' => 'Expense',
            'transfer' => 'Transfer'
        ];

        $transactions = Transaction::latest()->paginate(25);

        return view('transactions.all', compact('transactions', 'transactionname'));
    }


    public function type($type)
    {
        $payment = PaymentMethods::all();
        $provider = Provider::all();

        switch ($type) {
            case 'expense':
                return view('transactions.expense.index', ['payment' => $payment,'transactions' => Transaction::where('type', 'expense')->latest()->paginate(25)]);

            case 'payment':
                return view('transactions.payment.index', ['payment' => $payment,'provider' => $provider, 'transactions' => Transaction::where('type', 'payment')->latest()->paginate(25)]);

            case 'income':
                return view('transactions.income.index', ['payment'=> $payment,'transactions' => Transaction::where('type', 'income')->latest()->paginate(25)]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        switch ($type) {
            case 'expense':
                return view('transactions.expense.create', [
                    'payment_methods' => PaymentMethods::all(),
                ]);

            case 'payment':
                return view('transactions.payment.create', [
                    'payment_methods' => PaymentMethods::all(),
                    'providers' => Provider::all(),
                ]);

            case 'income':
                return view('transactions.income.create', [
                    'payment_methods' => PaymentMethods::all(),
                ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Transaction $transaction)
    {
        if ($request->get('client_id')) {
            switch ($request->get('type')) {
                case 'income':
                    $request->merge(['title' => 'Payment Received from Customer ID: ' . $request->get('client_id')]);
                    break;

                case 'expense':
                    $request->merge(['title' => 'Customer ID Return Payment: ' . $request->get('client_id')]);

                    if ($request->get('amount') > 0) {
                        $request->merge(['amount' => (float) $request->get('amount') * (-1)]);
                    }
                    break;
            }

            $transaction->create($request->all());
            $client = Client::find($request->get('client_id'));
            $client->balance += $request->get('amount');
            $client->save();
            

            return redirect()
                ->route('clients.show', $request->get('client_id'))
                ->withStatus('Successfully registered transaction.');
        }

        switch ($request->get('type')) {
            case 'expense':
                if ($request->get('amount') > 0) {
                    $request->merge(['amount' => ((float) $request->get('amount') * (-1))]);
                }

                $transaction->create($request->all());

                return redirect()
                    ->route('transactions.type', ['type' => 'expense'])
                    ->withStatus('Expense recorded successfully.');

            case 'payment':
                if ($request->get('amount') > 0) {
                    $request->merge(['amount' => ((float) $request->get('amount') * (-1))]);
                }

                $transaction->create($request->all());

                return redirect()
                    ->route('transactions.type', ['type' => 'payment'])
                    ->withStatus('Payment registered successfully.');

            case 'income':
                $transaction->create($request->all());

                return redirect()
                    ->route('transactions.type', ['type' => 'income'])
                    ->withStatus('Login successfully registered.');

            default:
                return redirect()
                    ->route('transactions')
                    ->withStatus('Successfully registered transaction.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
