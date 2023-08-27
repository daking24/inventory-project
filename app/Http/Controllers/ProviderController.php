<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provider = Provider::paginate(25);
        $user = User::find(Auth::user()->id);
        $role = $user->getRoleNames()->first();
        return view('supplier.index', compact('provider', 'user', 'role'));
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
     * @param  \App\Http\Requests\StoreProviderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProviderRequest $request, Provider $provider)
    {
        $provider->create($request->all());
        return redirect()->route('supplier')->withStatus('Successfully Register a Vendor');
    }

    /**
     * Display the specified resource.
     *Provider $provider
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        $transactions = $provider->transactions()->latest()->limit(25)->get();

        $receipts = $provider->receipts()->latest()->limit(25)->get();
        $user = User::find(Auth::user()->id);
        $role = $user->getRoleNames()->first();
        return view('supplier.view', compact('provider', 'transactions', 'receipts', 'user', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProviderRequest  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        // update the provider
        $provider->update($request->all());
        return redirect()->route('supplier')->withStatus('Successfully Updated a Vendor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        // delete the provider
        if ($provider->transactions()->count() > 0 || $provider->receipts()->count() > 0) {
            return redirect()->route('supplier')->withStatus('Cannot delete a supplier with transactions or receipts');
        } else {
            $provider->delete();
            return redirect()->route('supplier')->withStatus('Successfully Deleted a Supplier');
        }
    }
}
