@extends('layouts.app', ['pageSlug' => 'client_info', 'page' => 'Clients | Client Stats', 'section' => ''])

@section('content')
  <div class="card mb-3">
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-12 col-sm-6">
          <h1 class="mb-0 pb-0 display-4">Client Information</h1>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Balance</th>
            <th scope="col">Purchases</th>
            <th scope="col">Total Payment</th>
            <th scope="col">Last Payment</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">{{ $client->id }}</th>
            <td>{{ $client->name }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->email }}</td>
            <td>@if ($client->balance > 0)
                                        <span class="text-success">{{ __($client->balance) }}</span>
                                    @elseif ($client->balance < 0.00)
                                        <span class="text-danger">{{ __($client->balance) }}</span>
                                    @else
                                        {{ __($client->balance) }}
                                    @endif</td>
            <td>{{ $client->sales->count() }}</td>
            <td>{{ __($client->transactions->sum('amount')) }}</td>
            <td>{{ (empty($client->sales)) ? date('d-m-y', strtotime($client->sales->reverse()->first()->created_at)) : 'N/A' }}</td>
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
              <h1 class="mb-0 pb-0 display-4">Latest Transactions</h1>
            </div>

          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Method</th>
                <th scope="col">Amount</th>

              </tr>
            </thead>
            <tbody>
              @forelse ($client->transactions->reverse()->take(25) as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
                                    <td><a href="{{ route('method-view', $transaction->method) }}">{{ $transaction->method->name }}</a></td>
                                    <td>{{ __($transaction->amount) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="4" class="text-center">
                                        <span class="text-warning">No Transctions made</span>
                                    </th>
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
              <h1 class="mb-0 pb-0 display-4">Latest Purchase</h1>
            </div>
            <!-- Top Buttons Start -->
            <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
              <!-- Add New Button Start -->
              <form method="post" action="{{ route('sales.store') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                <button type="submit" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable"
                >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                  class="acorn-icons acorn-icons-plus undefined">
                  <path d="M10 17 10 3M3 10 17 10"></path>
                </svg>
                <span>New Purchase</span>
              </button>
                            </form>

              <!-- Add New Button End -->
            </div>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Date</th>
                  <th scope="col">Products</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Total Amount</th>
                  <th scope="col">State</th>
                  <th scope="col"></th>

                </tr>
              </thead>
              <tbody>
                @foreach ($client->sales->reverse()->take(25) as $sale)
                                <tr>
                                    <td><a href="{{ route('sales-view', $sale) }}">{{ $sale->id }}</a></td>
                                    <td>{{ date('d-m-y', strtotime($sale->created_at)) }}</td>
                                    <td>{{ $sale->products->count() }}</td>
                                    <td>{{ $sale->products->sum('quantity') }}</td>
                                    <td>{{ __($sale->products->sum('total_amount')) }}</td>
                                    <td>{{ ($sale->finalized_at) ? 'FINISHED' : 'ON HOLD' }}</td>
                                    <td class="td-actions text-right">
                                        <div class="d-flex align-items-center justify-content-end">
                      <a href="{{ route('sales-view', $sale) }}" type="button" class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                          fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" class="acorn-icons acorn-icons-glasses undefined">
                          <circle cx="5.5" cy="6.5" r="3.5"></circle>
                          <circle cx="14.5" cy="6.5" r="3.5"></circle>
                          <path
                            d="M11 6 9 6M2 6 2.89031 14.9031C2.95859 15.586 3.37218 16.1861 3.98596 16.493L5 17M18 6 17.1097 14.9031C17.0414 15.586 16.6278 16.1861 16.014 16.493L15 17">
                          </path>
                        </svg>
                        <span class="d-none d-xxl-inline-block">More Details</span>

                      </a>
                    </div>
                                    </td>
                                </tr>
                            @endforeach


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endsection
