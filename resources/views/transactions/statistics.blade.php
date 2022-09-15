@extends('layouts.app', ['pageSlug' => 'transactions_stats', 'page' => 'Transactions | Statistics', 'section' => ''])

@section('content')
<div class="page-title-container">

</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-12 col-sm-6">
                <h1 class="mb-0 pb-0 display-4">Transaction Statistics</h1>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
                        <!-- Tour Button Start -->
                <a type="button" class="btn btn-outline-primary" href="{{route('transactions')}}">View Transactions</a>
                <!-- Tour Button End -->
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Period</th>
                <th scope="col">Transactions</th>
                <th scope="col">Income</th>
                <th scope="col">Expenses</th>
                <th scope="col">Payments</th>
                <th scope="col">Cash Balance</th>
                <th scope="col">Total Balance</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Day</th>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>0</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <th scope="row">Yesterday</th>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>0</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <th scope="row">Week</th>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>0</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <th scope="row">Month</th>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>0</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <th scope="row">Year</th>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>0</td>
                <td>1</td>
                <td>1</td>
            </tr>
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
                        <h1 class="mb-0 pb-0 display-4">Pending Balances</h1>
                    </div>
                    <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
                                <!-- Tour Button Start -->
                        <a type="button" class="btn btn-outline-primary" href="{{route('transactions')}}">View Clients</a>
                        <!-- Tour Button End -->
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Client</th>
                        <th scope="col">Purchase</th>
                        <th scope="col">Transactions</th>
                        <th scope="col">Balance</th>
                        <th scope="col"></th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Joe</th>
                        <td>MM</td>
                        <td>2</td>
                        <td>1</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-end">
                                <button class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" data-bs-toggle="modal" data-bs-target="#transfersEdit" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-eye mb-3 d-inline-block text-primary"><path d="M2.47466 10.8418C2.15365 10.3203 2.15365 9.67971 2.47466 9.15822C3.49143 7.50643 6.10818 4 10 4C13.8918 4 16.5086 7.50644 17.5253 9.15822C17.8464 9.67971 17.8464 10.3203 17.5253 10.8418C16.5086 12.4936 13.8918 16 10 16C6.10818 16 3.49143 12.4936 2.47466 10.8418Z"></path><path d="M10 12C11.1046 12 12 11.1046 12 10C12 8.89543 11.1046 8 10 8C8.89543 8 8 8.89543 8 10C8 11.1046 8.89543 12 10 12Z"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
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
                        <h1 class="mb-0 pb-0 display-4">Stats By Methods</h1>
                    </div>
                    <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
                                <!-- Tour Button Start -->
                        <a type="button" class="btn btn-outline-primary" href="{{route('transactions')}}">View Payment Methods</a>
                        <!-- Tour Button End -->
                    </div>
                </div>
            
            <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Method</th>
                        <th scope="col">Transactions 2022</th>
                        <th scope="col">Balance 2022</th>
                        <th scope="col"></th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Joe</th>
                        <td>2</td>
                        <td>1</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-end">
                                <button class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" data-bs-toggle="modal" data-bs-target="#transfersEdit" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-eye mb-3 d-inline-block text-primary"><path d="M2.47466 10.8418C2.15365 10.3203 2.15365 9.67971 2.47466 9.15822C3.49143 7.50643 6.10818 4 10 4C13.8918 4 16.5086 7.50644 17.5253 9.15822C17.8464 9.67971 17.8464 10.3203 17.5253 10.8418C16.5086 12.4936 13.8918 16 10 16C6.10818 16 3.49143 12.4936 2.47466 10.8418Z"></path><path d="M10 12C11.1046 12 12 11.1046 12 10C12 8.89543 11.1046 8 10 8C8.89543 8 8 8.89543 8 10C8 11.1046 8.89543 12 10 12Z"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    </tbody>
                </table>
                </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-12 col-sm-6">
                <h1 class="mb-0 pb-0 display-4">Sale Statistics</h1>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
                        <!-- Tour Button Start -->
                <a type="button" class="btn btn-outline-primary" href="{{route('sales')}}">View Sales</a>
                <!-- Tour Button End -->
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Period</th>
                <th scope="col">Sales</th>
                <th scope="col">Clients</th>
                <th scope="col">Billed Amount</th>
                <th scope="col">To Finalize</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Day</th>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <th scope="row">Yesterday</th>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <th scope="row">Week</th>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <th scope="row">Month</th>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <th scope="row">Year</th>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>1</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
