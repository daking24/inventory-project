<?php

namespace App\Http\Controllers;

use App\Models\Product_categories;
use App\Http\Requests\StoreProduct_categoriesRequest;
use App\Http\Requests\UpdateProduct_categoriesRequest;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory.categories.index');
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
     * @param  \App\Http\Requests\StoreProduct_categoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct_categoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_categories  $product_categories
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('inventory.categories.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_categories  $product_categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_categories $product_categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduct_categoriesRequest  $request
     * @param  \App\Models\Product_categories  $product_categories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct_categoriesRequest $request, Product_categories $product_categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_categories  $product_categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_categories $product_categories)
    {
        //
    }
}
