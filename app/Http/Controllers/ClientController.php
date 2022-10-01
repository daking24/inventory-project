<?php

namespace App\Http\Controllers;

use App\Models\{
    Client,
    User,
};
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;
use Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(25);
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        return view('clients.index', compact('clients', 'user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request, Client  $client)
    {
        // dd($request);
        $client->create($request->all());

        return redirect()->route('sales')->withStatus('Successfully registered customer.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        return view('clients.view', compact('client', 'user', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        return view('clients.edit', compact('client', 'user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());

        return redirect()
            ->route('clients')
            ->withStatus('Successfully modified customer.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()
            ->route('clients')
            ->withStatus('Customer successfully removed.');

    }



}
