<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use App\Models\Transaction;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\UpdateTransferRequest;
use Illuminate\Http\Request;
use App\Models\PaymentMethods;
use Auth;
class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        return view('transactions.transfer.index',[
            'payment' => PaymentMethods::all(),
            'transfers' => Transfer::latest()->paginate(25),
            'user' => $user,
            'role' => $role

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
     * @param  \App\Http\Requests\StoreTransferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Transfer $transfer, Transaction $transaction)
    {
        $transfer = $transfer->create($request->all());

        $transaction->create([
            "type" => "expense",
            "title" => "TransferID: ".$transfer->id,
            "transfer_id" => $transfer->id,
            "payment_methods_id" => $transfer->sender_method_id,
            "amount" => ((float) abs($transfer->sender_method) * (-1)),
            "user_id" => Auth::id(),
            "reference" => $transfer->reference
        ]);

        $transaction->create([
            "type" => "income",
            "title" => "TransferID: ".$transfer->id,
            "transfer_id" => $transfer->id,
            "payment_methods_id" => $transfer->receiver_method_id,
            "amount" => abs($transfer->receiver_method),
            "user_id" => Auth::id(),
            "reference" => $transfer->reference
        ]);

        return redirect()
            ->route('transfer')
            ->withStatus('Transaction registered successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransferRequest  $request
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransferRequest $request, Transfer $transfer)
    {
        // update transfer
        $transfer->update($request->all());
        return redirect()
            ->route('transfer')
            ->withStatus('Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        // delete transfer
        $transfer->delete();
        return redirect()
            ->route('transfer')
            ->withStatus('Transaction deleted successfully.');

    }
}
