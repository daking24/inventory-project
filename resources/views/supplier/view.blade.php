@extends('layouts.app', ['pageSlug' => 'supplier_view', 'page' => 'Supplier | View', 'section' => ''])

@section('content')
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">Supplier Information</h1>
        </div>
        <!-- Title End -->

        <!-- Top Buttons Start -->
        <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
            <!-- Add New Button Start -->
            <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto ">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-bin undefined"><path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M2 5H18M12 9V13M8 9V13"></path></svg>
                <span>Print Receipt</span>
            </button>
            <!-- Add New Button End -->

        </div>
        <!-- Top Buttons End -->
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
                    <th scope="col">Description</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Payment Info</th>
                    <th scope="col">Payment Made</th>
                    <th scope="col">Total Payment</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{ $provider->id }}</th>
                    <td>{{ $provider->name }}</td>
                    <td>{{ $provider->description }}</td>
                    <td>{{ $provider->email }}</td>
                    <td>{{ $provider->phone }}</td>
                    <td style="max-width: 175px">{{ $provider->paymentInfo }}</td>
                    <td>{{ $provider->transactions->count() }}</td>
                    <td>{{ __(abs($provider->transactions->sum('amount'))) }}</td>
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
            <h1 class="mb-0 pb-0 display-4" id="title">Last Payments</h1>
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
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Method</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Reference</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ date('d-m-y', strtotime($transaction->created_at)) }}</th>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->title }}</td>
                        <td><a href="{{ route('method-view', $transaction->method) }}">{{ $transaction->method->name }}</a></td>
                        <td>{{ __($transaction->amount) }}</td>
                        <td>{{ $transaction->reference }}</td>
                    </tr>
                    @empty
                    <tr>
                    <td class="text-center" colspan="6">
                        No Transactions Available
                    </td>
                    </tr>
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
            <h1 class="mb-0 pb-0 display-4" id="title">Last Receipts</h1>
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
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Products</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Defective Stock</th>
                    <th scope="col">Total Stock</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>

                    @forelse ($receipts as $receipt)
                    <tr>
                        <th scope="row">{{ date('d-m-y', strtotime($receipt->created_at)) }}</th>
                        <td><a href="{{ route('receipt-view', $receipt) }}">{{ $receipt->id }}</a></td>
                        <td>{{ $receipt->title }}</td>
                        <td>{{ $receipt->products->count() }}</td>
                        <td>{{ $receipt->products->sum('stock') }}</td>
                        <td>{{ $receipt->products->sum('stock_defective') }}</td>
                        <td>{{ $receipt->products->sum('stock') + $receipt->products->sum('stock_defective') }}</td>
                        <td>

                <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('receipt-view', $receipt) }}" type="button" class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-glasses undefined"><circle cx="5.5" cy="6.5" r="3.5"></circle><circle cx="14.5" cy="6.5" r="3.5"></circle><path d="M11 6 9 6M2 6 2.89031 14.9031C2.95859 15.586 3.37218 16.1861 3.98596 16.493L5 17M18 6 17.1097 14.9031C17.0414 15.586 16.6278 16.1861 16.014 16.493L15 17"></path></svg>
                        <span class="d-none d-xxl-inline-block">View</span>
                    </a>
                </div>

                        </td>
                    </tr>
                    @empty
                    <tr>
                    <td class="text-center" colspan="8">
                        No Receipts Available
                    </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
