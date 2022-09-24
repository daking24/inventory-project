<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ReceivedProduct;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::where('is_active', true)->get();
        $product = Product::paginate(25)->where('is_active', true);
        return view('inventory.products.index', compact('categories','product'));
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


    public function fetchProduct(Product $id)
    {

        echo json_encode($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request, Product $products)
    {
        $products->create($request->all());

        return redirect()->route('inventory-product')->withStatus('Product Created Successful');
    }

    /**
     * Display the specified resource.
     *Products $products
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $products)
    {
        $solds = $products->solds()->latest()->limit(25)->get();

        $receiveds = $products->receiveds()->latest()->limit(25)->get();
        return view('inventory.products.view', compact('products', 'solds', 'receiveds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
    {
        $categories = ProductCategory::where('is_active', false)->get();
        return view('inventory.products.index', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsRequest  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductsRequest $request, Product $product)
    {
        $product->update($request->all());

        return redirect()
            ->route('inventory-product')
            ->withStatus('Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        dd($product);
        $product->delete();

        return redirect()
            ->route('inventory-product')
            ->withStatus('Product removed successfully.');
    }
}
