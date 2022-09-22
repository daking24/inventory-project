@extends('layouts.app', ['pageSlug' => 'inventory_product_view', 'page' => 'Inventory | Product | View', 'section' => ''])

@section('content')
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">Product Information</h1>
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
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Defective Stock</th>
                    <th scope="col">Base Price</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Total Sales</th>
                    <th scope="col">Income Produced</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{ $products->id }}</th>
                    <td><a href="{{ route('category-view', $products->category) }}">{{ $products->category->name }}</a></td>
                    <td>{{ $products->name }}</td>
                    <td>{{ $products->stock }}</td>
                    <td>{{ $products->stock_defective }}</td>
                    <td>₦{{ $products->base_price }}</td>
                    <td>₦{{ $products->selling_price }}</td>
                    <td>{{ $products->solds->sum('qty') }}</td>
                    <td>₦{{ __($products->solds->sum('total_amount')) }}</td>
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
            <h1 class="mb-0 pb-0 display-4" id="title">Latest Sales</h1>
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
                    <th scope="col">Date</th>
                    <th scope="col">Sale ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price Unit</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($solds as $sold)
                    <tr>
                    <th scope="row">{{ date('d-m-y', strtotime($sold->created_at)) }}</th>
                    <td><a href="{{ route('sales-view', $sold->sale_id) }}">{{ $sold->sale_id }}</a></td>
                    <td>{{ $sold->quantity }}</td>
                    <td>{{ __($sold->unit_price) }}</td>
                    <td>{{ __($sold->total_amount) }}</td>
                    <td>

                <div class="d-flex align-items-center justify-content-end">
                    <button  type="button" class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-glasses undefined"><circle cx="5.5" cy="6.5" r="3.5"></circle><circle cx="14.5" cy="6.5" r="3.5"></circle><path d="M11 6 9 6M2 6 2.89031 14.9031C2.95859 15.586 3.37218 16.1861 3.98596 16.493L5 17M18 6 17.1097 14.9031C17.0414 15.586 16.6278 16.1861 16.014 16.493L15 17"></path></svg>
                        <span class="d-none d-xxl-inline-block">View</span>
                    </button>

                </div>
                    </td>
                </tr>
                    @empty
                    <th>...</th>
                    <th>...</th>
                    <th>...</th>
                    <th>
                       <span> No Data Available</span>
                    </th>
                    <th>....</th>
                    <th>.....</th>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">Latest Receipts</h1>
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
                    <th scope="col">Date</th>
                    <th scope="col">Receipt ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Defective Stock</th>
                    <th scope="col">Total Stock</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>22 Sept 2022</td>
                    <td><a href="#">Income</a></td>
                    <td>Some payments</td>
                    <td>210.66</td>
                    <td>dasdda</td>
                    <td>

                <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('receipt-view') }}" type="button" class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-glasses undefined"><circle cx="5.5" cy="6.5" r="3.5"></circle><circle cx="14.5" cy="6.5" r="3.5"></circle><path d="M11 6 9 6M2 6 2.89031 14.9031C2.95859 15.586 3.37218 16.1861 3.98596 16.493L5 17M18 6 17.1097 14.9031C17.0414 15.586 16.6278 16.1861 16.014 16.493L15 17"></path></svg>
                        <span class="d-none d-xxl-inline-block">View</span>
                    </a>

                </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('transactions.income.modal.edit')
@endsection
