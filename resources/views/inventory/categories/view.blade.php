@extends('layouts.app', ['pageSlug' => 'inventory_category_view', 'page' => 'Inventory | Category | View', 'section' => ''])

@section('content')
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">Category Information</h1>
        </div>
        <!-- Title End -->

    </div>
</div>

<div class="col-12 mb-5">
    <div class="card mb-5">
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Products</th>
                    <th scope="col">Stocks</th>
                    <th scope="col">Defective Stocks</th>
                    <th scope="col">Average Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{ $product_categories->id }}</th>
                    <td>{{ $product_categories->name }}</td>
                    <td>{{ count($product_categories->products) }}</td>
                    <td>{{ $product_categories->products->sum('stock') }}</td>
                    <td>{{ $product_categories->products->sum('stock_defective') }}</td>
                    <td>{{ __($product_categories->products->avg('selling_price')) }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">Products: {{ count($product_categories->products) }}</h1>
        </div>
        <!-- Title End -->
    </div>
</div>
<div class="col-12 mb-5">
    <div class="card mb-5">
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Defective Stock</th>
                    <th scope="col">Base Price</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Total Sales</th>
                    <th scope="col">Income Produced</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($product_categories->products as $item)


                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->stock_defective }}</td>
                    <td>₦{{ $item->base_price }}</td>
                    <td>₦{{ $item->selling_price }}</td>
                    <td>{{ $item->solds->sum('qty') }}</td>
                    <td>₦{{ __($item->solds->sum('total_amount')) }}</td>
                    <td><div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('product-view', $item->id) }}" type="button" class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-glasses undefined"><circle cx="5.5" cy="6.5" r="3.5"></circle><circle cx="14.5" cy="6.5" r="3.5"></circle><path d="M11 6 9 6M2 6 2.89031 14.9031C2.95859 15.586 3.37218 16.1861 3.98596 16.493L5 17M18 6 17.1097 14.9031C17.0414 15.586 16.6278 16.1861 16.014 16.493L15 17"></path></svg>
                        <span class="d-none d-xxl-inline-block">View</span>
                    </a>

                </div></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
