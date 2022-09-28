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
          <a type="button" class="btn btn-outline-primary" href="{{ route('transactions') }}">View Transactions</a>
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
          @foreach ($transactionsperiods as $period => $data)
            <tr>
              <td scope="row">{{ $period }}</td>
              <td>{{ $data->count() }}</td>
              <td>{{ __($data->where('type', 'income')->sum('amount')) }}</td>
              <td>{{ __($data->where('type', 'expense')->sum('amount')) }}</td>
              <td>{{ __($data->where('type', 'payment')->sum('amount')) }}</td>
              <td>
                {{ __($data->where('payment_method_id', optional($methods->where('name', 'Cash')->first())->id)->sum('amount')) }}
              </td>
              <td>{{ __($data->sum('amount')) }}</td>

            </tr>
          @endforeach
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
              <a type="button" class="btn btn-outline-primary" href="{{ route('clients') }}">View Clients</a>
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
              @forelse($clients as $client)
                <tr>
                  <td scope="row"><a
                      href="{{ route('clientShow', $client) }}">{{ $client->name }}<br>{{ $client->document_type }}-{{ $client->document_id }}</a>
                  </td>
                  <td>{{ $client->sales->count() }}</td>
                  <td>{{ __($client->transactions->sum('amount')) }}</td>
                  <td>
                    @if ($client->balance > 0)
                      <span class="text-success">{{ __($client->balance) }}</span>
                    @elseif ($client->balance < 0.0)
                      <span class="text-danger">{{ __($client->balance) }}</span>
                    @else
                      {{ __($client->balance) }}
                    @endif
                  </td>
                  <td>
                    <div class="d-flex align-items-center justify-content-end">
                      <a href="{{ route('clientShow', $client) }}"
                        class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" data-bs-toggle="modal"
                        data-bs-target="#transfersEdit" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20"
                          fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" class="acorn-icons acorn-icons-eye mb-3 d-inline-block text-primary">
                          <path
                            d="M2.47466 10.8418C2.15365 10.3203 2.15365 9.67971 2.47466 9.15822C3.49143 7.50643 6.10818 4 10 4C13.8918 4 16.5086 7.50644 17.5253 9.15822C17.8464 9.67971 17.8464 10.3203 17.5253 10.8418C16.5086 12.4936 13.8918 16 10 16C6.10818 16 3.49143 12.4936 2.47466 10.8418Z">
                          </path>
                          <path
                            d="M10 12C11.1046 12 12 11.1046 12 10C12 8.89543 11.1046 8 10 8C8.89543 8 8 8.89543 8 10C8 11.1046 8.89543 12 10 12Z">
                          </path>
                        </svg>
                      </a>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <th scope="row" colspan="5">
                    <div class="text-center">
                      <p>There are no pending balances.</p>
                    </div>
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
              <h1 class="mb-0 pb-0 display-4">Stats By Methods</h1>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
              <!-- Tour Button Start -->
              <a type="button" class="btn btn-outline-primary" href="{{ route('payment-methods') }}">View Payment
                Methods</a>
              <!-- Tour Button End -->
            </div>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Method</th>
                <th scope="col">Transactions {{ $date->year }}</th>
                <th scope="col">Balance {{ $date->year }}</th>
                <th scope="col"></th>

              </tr>
            </thead>
            <tbody>
              @forelse($methods as $method)
                <tr>
                  <th scope="row"><a href="{{ route('method-view', $method) }}">{{ $method->name }}</a></th>
                  <td>{{ __($transactionsperiods['Year']->where('payment_method_id', $method->id)->count()) }}</td>
                  <td>{{ __($transactionsperiods['Year']->where('payment_method_id', $method->id)->sum('amount')) }}</td>
                  <td>
                    <div class="d-flex align-items-center justify-content-end">
                      <a href="{{ route('method-view', $method) }}"
                        class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" data-bs-toggle="modal"
                        data-bs-target="#transfersEdit" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20"
                          fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" class="acorn-icons acorn-icons-eye mb-3 d-inline-block text-primary">
                          <path
                            d="M2.47466 10.8418C2.15365 10.3203 2.15365 9.67971 2.47466 9.15822C3.49143 7.50643 6.10818 4 10 4C13.8918 4 16.5086 7.50644 17.5253 9.15822C17.8464 9.67971 17.8464 10.3203 17.5253 10.8418C16.5086 12.4936 13.8918 16 10 16C6.10818 16 3.49143 12.4936 2.47466 10.8418Z">
                          </path>
                          <path
                            d="M10 12C11.1046 12 12 11.1046 12 10C12 8.89543 11.1046 8 10 8C8.89543 8 8 8.89543 8 10C8 11.1046 8.89543 12 10 12Z">
                          </path>
                        </svg>
                      </a>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <th scope="row" colspan="5">
                    <div class="text-center">
                      <p>There are no pending transactions.</p>
                    </div>
                  </th>
                </tr>
              @endforelse
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
          <a type="button" class="btn btn-outline-primary" href="{{ route('sales') }}">View Sales</a>
          <!-- Tour Button End -->
        </div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="row">Period</th>
            <th scope="row">Sales</th>
            <th scope="row">Clients</th>
            <th scope="row">Total Stock</th>
            <th scope="row" data-toggle="tooltip" data-placement="bottom"
              title="Promedio de ingresos por cada venta">Average C / V</th>
            <th scope="row">Billed Amount</th>
            <th scope="row">To Finalize</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          @foreach ($salesperiods as $period => $data)
            <tr>
              <td>{{ $period }}</td>
              <td>{{ $data->count() }}</td>
              <td>{{ $data->groupBy('client_id')->count() }}</td>
              <td>
                {{ $data->where('finalized_at', '!=', null)->map(function ($sale) {return $sale->products->sum('quantity');})->sum() }}
              </td>
              <td>{{ __($data->avg('total_amount')) }}</td>
              <td>
                {{ __($data->where('finalized_at', '!=', null)->map(function ($sale) {return $sale->products->sum('total_amount');})->sum()) }}
              </td>
              <td>{{ $data->where('finalized_at', null)->count() }}</td>
              <td>
                @if ($data->count() > 0)
                <div class="d-flex align-items-center justify-content-end">
                  <a href="{{ route('sales.receipt.print', $period) }}" class="btn btn-sm btn-icon btn-icon-start btn-outline-success ms-1" type="button"
                    >

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                      fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" class="acorn-icons acorn-icons-download undefined">
                      <path
                        d="M2 14V14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18H14.5C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5V14">
                      </path>
                      <path d="M14 10 10.7071 13.2929C10.3166 13.6834 9.68342 13.6834 9.29289 13.2929L6 10M10 2 10 13">
                      </path>
                    </svg>
                    <span class="d-none d-xxl-inline-block">Print Receipt</span>
                  </a>
                </div>
                @else
                <div class="text-warning">
                    No Sales
                </div>
                @endif

              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
