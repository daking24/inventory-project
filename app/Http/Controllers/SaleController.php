<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Models\SoldProduct;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use Auth;
use Carbon\Carbon;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        $sales = Sale::latest()->paginate(25);
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        return view('sales.index', compact('client', 'sales', 'user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProductSale(Sale $sale)
    {
        $products = Product::all();

        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        return view('sales.create', ['sale' => $sale, 'products' => $products,
            'user' => $user, 'role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sale $model)
    {
        $existent = Sale::where('client_id', $request->get('client_id'))->where('finalized_at', null)->get();

        if($existent->count()) {
            return back()->withError('There is already an unfinished sale belonging to this customer. <a href="'.route('sales.product.create', $existent->first()).'">Click here to go to it</a>');
        }

        $sale = $model->create($request->all());

        return redirect()
            ->route('sales.product.create', ['sale' => $sale->id])
            ->withStatus('Sale registered successfully, you can start registering products and transactions.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {

         $client = Client::all();
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        return view('sales.view', compact('client', 'sale', 'user', 'role'));
    }

    public function saleReceipt(Sale $sale)
    {
        $client = Client::all();
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        return view('sales.receipt', compact('client', 'sale', 'user', 'role'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function finalizeSale(Sale $sale)
    {

        $sale->total_amount = $sale->products->sum('total_amount');

        foreach ($sale->products as $sold_product) {
            $product_name = $sold_product->product->name;
            $product_stock = $sold_product->product->stock;
            if($sold_product->qty > $product_stock) return back()->withError("The product '$product_name' does not have enough stock. Only has $product_stock units.");
        }

        foreach ($sale->products as $sold_product) {
            $sold_product->product->stock -= $sold_product->qty;
            $sold_product->product->save();
        }

        $sale->finalized_at = Carbon::now()->toDateTimeString();
        $sale->client->balance -= $sale->total_amount;
        $sale->save();
        $sale->client->save();

        return redirect()->route('sales.receipt', $sale)->withStatus('The sale has been successfully completed.');

    }

    public function storeProduct(Request $request, SoldProduct $soldProduct, Sale $sale)
    {
        $request->merge(['total_amount' => $request->get('unit_price') * $request->get('quantity')]);

        $soldProduct->create($request->all());
            return redirect()
                ->route('sales.product.create', ['sale' => $sale])
                ->withStatus('Product successfully registered.');

    }

}
