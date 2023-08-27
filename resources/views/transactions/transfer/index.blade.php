@extends('layouts.app', ['pageSlug' => 'transactions_transfers', 'page' => 'Transactions | Transfers', 'section' => ''])

@section('content')
  <div class="page-title-container">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h1 class="mb-0 pb-0 display-4">Transfers</h1>
      </div>
      <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
        <!-- Tour Button Start -->
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
          data-bs-target="#transfersRegister">Register Transfers</button>
        <!-- Tour Button End -->
      </div>
    </div>
  </div>
  <div class="card mb-5">
    <div class="card-body">

      <table class="table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Sender Method</th>
            <th>Receiver Method</th>
            <th>Reference</th>
            <th>Amount Sent</th>
            <th>Amount Received</th>
            <th></th>

          </tr>
        </thead>
        <tbody>
          @forelse ($transfers as $transfer)
            <tr>
              <td>{{ date('d-m-y', strtotime($transfer->created_at)) }}</td>
              <td style="max-width:150px">{{ $transfer->title }}</td>
              <td><a
                  href="{{ route('method-view', $transfer->sender_payment_method) }}">{{ $transfer->sender_payment_method->name }}</a>
              </td>
              <td><a
                  href="{{ route('method-view', $transfer->receiver_payment_method) }}">{{ $transfer->receiver_payment_method->name }}</a>
              </td>
              <td>{{ $transfer->reference }}</td>
              <td>₦{{ $transfer->sender_method }}</td>
              <td>₦{{ $transfer->receiver_method }}</td>
              <td>
                @role('Admin Manager')
                  <button class="btn btn-sm btn-icon btn-icon-start btn-outline-danger ms-1" type="button"
                    data-bs-toggle="modal" data-bs-target="#transferDelete{{ $transfer->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="acorn-icons acorn-icons-bin undefined">
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
                  @include('transactions.transfer.modal.delete')
                @endrole
              </td>
            </tr>
          @empty
            <tr>
              <th scope="row" colspan="7" class="text-center">
                <span class="text-warning"> No Transfers</span>
              </th>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-footer py-4">
        <nav class="d-flex justify-content-end" aria-label="...">
            {{ $transfers->links() }}
        </nav>
    </div>
  </div>

  @include('transactions.transfer.modal.create')
@endsection
