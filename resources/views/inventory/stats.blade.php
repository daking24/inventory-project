@extends('layouts.app', ['pageSlug' => 'inventory_stats', 'page' => 'Inventory | Statistics', 'section' => ''])

@section('content')
<div class="page-title-container">

</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-12 col-sm-6">
                <h1 class="mb-0 pb-0 display-4">Statistics by Quantity (TOP 15)</h1>
            </div>
            {{-- <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
                        <!-- Tour Button Start -->
                <a type="button" class="btn btn-outline-primary" href="{{route('transactions')}}">View Transactions</a>
                <!-- Tour Button End -->
            </div> --}}
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Annual Sales</th>
                <th scope="col">Average Price</th>
                <th scope="col">Annual Income</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            @forelse($soldproductsbystock as $soldproduct)
                <tr>
                    <td><a href="{{ route('product-view', $soldproduct->product) }}">{{ $soldproduct->product_id }}</a></td>
                    <td><a href="{{ route('category-view', $soldproduct->product->category) }}">{{ $soldproduct->product->category->name }}</a></td>
                    <td>{{ $soldproduct->product->name }}</td>
                    <td>{{ $soldproduct->product->stock }}</td>
                    <td>{{ $soldproduct->total_qty }}</td>
                    <td>₦{{ __(round($soldproduct->avg_price, 2)) }}</td>
                    <td>₦{{ __($soldproduct->incomes) }}</td>
                    <td>
                        <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('product-view', $soldproduct->product) }}" type="button" class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-glasses undefined"><circle cx="5.5" cy="6.5" r="3.5"></circle><circle cx="14.5" cy="6.5" r="3.5"></circle><path d="M11 6 9 6M2 6 2.89031 14.9031C2.95859 15.586 3.37218 16.1861 3.98596 16.493L5 17M18 6 17.1097 14.9031C17.0414 15.586 16.6278 16.1861 16.014 16.493L15 17"></path></svg>
                    <span class="d-none d-xxl-inline-block">More Details</span>

                </a>
                </div>
                    </td>
                </tr>
                @empty
                <tr>
                        <td class="text-center" colspan="8">No data found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-6 col-md-6 col-sm-12 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 col-sm-6">
                        <h1 class="mb-0 pb-0 display-4">Stats by Income (TOP 15)</h1>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Income</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($soldproductsbyincomes as $soldproduct)
                        <tr>
                            <td>{{ $soldproduct->product_id }}</td>
                            <td><a href="{{ route('category-view', $soldproduct->product->category) }}">{{ $soldproduct->product->category->name }}</a></td>
                            <td><a href="{{ route('product-view', $soldproduct->product) }}">{{ $soldproduct->product->name }}</a></td>
                            <td>{{ $soldproduct->total_qty }}</td>
                            <td>₦{{ __($soldproduct->incomes) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="5">No data found</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-6 col-sm-12 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 col-sm-6">
                        <h1 class="mb-0 pb-0 display-4">Stats By Avg Price (TOP 15)</h1>
                    </div>
                </div>

            <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Avg Price</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($soldproductsbyavgprice as $soldproduct)
                        <tr>
                            <td>{{ $soldproduct->product_id }}</td>
                            <td><a href="{{ route('category-view', $soldproduct->product->category) }}">{{ $soldproduct->product->category->name }}</a></td>
                            <td><a href="{{ route('product-view', $soldproduct->product) }}">{{ $soldproduct->product->name }}</a></td>
                            <td>{{ $soldproduct->total_qty }}</td>
                            <td>₦{{ __(round($soldproduct->avg_price, 2)) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="5">No data found</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                </div>
        </div>
    </div>
</div>

@endsection
