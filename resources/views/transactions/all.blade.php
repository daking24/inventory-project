@extends('layouts.app', ['pageSlug' => 'transactions_income', 'page' => 'Transactions | Income', 'section' => ''])

@section('content')
  <div class="page-title-container">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h1 class="mb-0 pb-0 display-4">Transactions</h1>
      </div>

    </div>
  </div>
  <div class="card mb-5">
    <div class="card-body">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Type</th>
            <th scope="col">Title</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Amount</th>
            <th scope="col">Reference</th>
            <th scope="col">Client</th>
            <th scope="col">Supplier</th>
            <th scope="col">Transfer</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $transaction)
            <tr>
              <td>{{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
              <td>
                <a
                  href="{{ route('transactions.type', ['type' => $transaction->type]) }}">{{ $transactionname[$transaction->type] }}</a>
              </td>
              <td style="max-width:150px">{{ $transaction->title }}</td>
              <td><a href="{{ route('method-view', $transaction->method) }}">{{ $transaction->method->name }}</a></td>
              <td>{{ __($transaction->amount) }}</td>
              <td>{{ $transaction->reference }}</td>
              <td>
                @if ($transaction->client)
                  <a
                    href="{{ route('clientShow', $transaction->client) }}">{{ $transaction->client->name }}<br>{{ $transaction->client->document_type }}-{{ $transaction->client->document_id }}</a>
                @else
                  Does not apply
                @endif
              </td>
              <td>
                @if ($transaction->provider)
                  <a href="{{ route('supplier-view', $transaction->provider) }}">{{ $transaction->provider->name }}</a>
                @else
                  Does not apply
                @endif
              </td>
              <td>
                @if ($transaction->transfer)
                  <a href="{{ route('transfer', $transaction->transfer) }}">ID {{ $transaction->transfer->id }}</a>
                @else
                  Does not apply
                @endif
              </td>

            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer py-4">
        <nav class="d-flex justify-content-end" aria-label="...">
            {{ $transactions->links() }}
        </nav>
    </div>
  </div>
@endsection
