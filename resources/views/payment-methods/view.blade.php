@extends('layouts.app', ['pageSlug' => 'method_view', 'page' => 'Method | View', 'section' => ''])

@section('content')
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">Method Information</h1>
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
                    <th scope="col">Description</th>
                    <th scope="col">Transactions</th>
                    <th scope="col">Daily Balance</th>
                    <th scope="col">Weekly Balance</th>
                    <th scope="col">Monthly Balance</th>
                    <th scope="col">Annual Balance</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $methods->id }}</td>
                    <td>{{ $methods->name }}</td>
                    <td>{{ $methods->description }}</td>
                    <td>{{ $methods->transactions->count() }}</td>
                    <td>{{ __($balances['daily']) }}</td>
                    <td>{{ __($balances['weekly']) }}</td>
                    <td>{{ __($balances['monthly']) }}</td>
                    <td>{{ __($balances['annual']) }}</td>
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
            <h1 class="mb-0 pb-0 display-4" id="title">Transactions: {{ $transactions->count() }}</h1>
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
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Title</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Reference</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
                        {{-- {{ route('transactions.type', $transaction->type) }} --}}
                        <td><a href="#">{{ $transactionname[$transaction->type] }}</a></td>
                        <td>{{ $transaction->title }}</td>
                        <td>{{ __($transaction->amount) }}</td>
                        <td>{{ $transaction->reference }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
