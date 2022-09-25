@extends('layouts.app', ['pageSlug' => 'transactions_payment', 'page' => 'Transactions | Payments', 'section' => ''])

@section('content')
  <div class="page-title-container">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h1 class="mb-0 pb-0 display-4">Payment</h1>
      </div>
      <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
        <!-- Tour Button Start -->
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
          data-bs-target="#paymentRegister">Register Payment</button>
        <!-- Tour Button End -->
      </div>
    </div>
  </div>
  <div class="card mb-5">
    <div class="card-body">
      @include('alerts.success')
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Provider</th>
            <th scope="col">Title</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Amount</th>
            <th scope="col">Reference</th>
            <th scope="col"></th>

          </tr>
        </thead>
        <tbody>
          @forelse ($transactions as $transaction)
            <tr>
              <td> {{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
              <td><a href="{{ route('supplier-view', $transaction->provider) }}">{{ $transaction->provider->name }}</a>
              </td>
              <td> {{ $transaction->title }}</td>
              <td><a href="{{ route('method-view', $transaction->method) }}">{{ $transaction->method->name }}</a></td>
              <td>{{ __($transaction->amount) }}</td>
              <td>{{ $transaction->reference }}</td>
              <td></td>
              <td class="td-actions text-right">

                <div class="d-flex align-items-center justify-content-end">
                  <button class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" data-bs-toggle="modal"
                    data-bs-target="#paymentEdit" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20"
                      fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" class="acorn-icons acorn-icons-edit-square undefined">
                      <path
                        d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11">
                      </path>
                      <path
                        d="M15.4978 3.06224C15.7795 2.78052 16.1616 2.62225 16.56 2.62225C16.9585 2.62225 17.3405 2.78052 17.6223 3.06224C17.904 3.34396 18.0623 3.72605 18.0623 4.12446C18.0623 4.52288 17.904 4.90497 17.6223 5.18669L10.8949 11.9141L8.06226 12.6223L8.7704 9.78966L15.4978 3.06224Z">
                      </path>
                    </svg>
                    <span class="d-none d-xxl-inline-block">Edit</span>
                  </button>
                  <button class="btn btn-sm btn-icon btn-icon-start btn-outline-danger ms-1" type="button" data-bs-toggle="modal"
                    data-bs-target="#paymentDelete">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20"
                      fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" class="acorn-icons acorn-icons-bin undefined">
                      <path
                        d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5">
                      </path>
                      <path
                        d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5">
                      </path>
                      <path d="M2 5H18M12 9V13M8 9V13"></path>
                    </svg>
                    <span class="d-none d-xxl-inline-block">Delete</span>
                  </button>
                </div>
              </td>
            </tr>
            @empty
            <tr>
                <th scope="row" colspan="7" class="text-center">
                    <span class="text-center text-warning">
                        No Data Available
                    </span>
                </th>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @include('transactions.payment.modal.create')
  @include('transactions.payment.modal.edit')
  @include('transactions.payment.modal.delete')
@endsection
