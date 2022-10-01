<?php

namespace App\Http\Controllers;

use App\Models\{
    Transaction,
    PaymentMethods,
    Provider,
    User,
};
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTransactionRequest;
use Auth;


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
        $user = User::find(Auth::user()->id);
        $role = $user->getRoleNames()->first();
        return view('transactions.all', compact('transactions', 'transactionname', 'user', 'role'));
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
                    'payment' => PaymentMethods::all(),
                ]);

            case 'payment':
                return view('transactions.payment.create', [
                    'payment' => PaymentMethods::all(),
                    'providers' => Provider::all(),
                ]);

            case 'income':
                return view('transactions.income.create', [
                    'payment' => PaymentMethods::all(),
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
         switch ($transaction->type) {
            case 'expense':
                return view('transactions.expense.index', [
                    'transaction' => $transaction,
                    'payment' => PaymentMethods::all()
                ]);

            case 'payment':
                return view('transactions.payment.index', [
                    'transaction' => $transaction,
                    'payment' => PaymentMethods::all(),
                    'providers' => Provider::all()
                ]);

            case 'income':
                return view('transactions.income.index', [
                    'transaction' => $transaction,
                    'payment' => PaymentMethods::all(),
                ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        switch ($request->get('type')) {
            case 'expense':
                if ($request->get('amount') > 0) {
                    $request->merge(['amount' => ((float) $request->get('amount') * (-1))]);
                }
                return redirect()
                    ->route('transactions.type', ['type' => 'expense'])
                    ->withStatus('Expense updated sucessfully.');

            case 'payment':
                if ($request->get('amount') > 0) {
                    $request->merge(['amount' => ((float) $request->get('amount') * (-1))]);
                }

                return redirect()
                    ->route('transactions.type', ['type' => 'payment'])
                    ->withStatus('Payment updated satisfactorily.');

            case 'income':
                return redirect()
                    ->route('transactions.type', ['type' => 'income'])
                    ->withStatus('Login successfully updated.');

            default:
                return redirect()
                    ->route('transactions.index')
                    ->withStatus('Transaction updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        if ($transaction->transfer) {
            return back()->withStatus('You cannot remove a transaction from a transfer. You must delete the transfer to delete its records.');
        }

        $type = $transaction->type;
        $transaction->delete();

        switch ($type) {
            case 'expense':
                return back()->withStatus('Expenditure successfully removed.');

            case 'payment':
                return back()->withStatus('Payment successfully removed.');

            case 'income':
                return back()->withStatus('Entry successfully removed.');

            default:
                return back()->withStatus('Transaction deleted successfully.');
        }
    }
}
