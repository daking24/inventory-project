{{-- Edit Expense Modal --}}
<div class="modal modal-right large fade" id="expensesEdit{{ $transaction->id }}" tabindex="-1" role="dialog"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit {{ $transaction->title }} Expenses</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('transaction.update', $transaction->id) }}" method="post">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="type" value="{{ $transaction->type }}">
          <input type="hidden" name="user_id" value="{{ $transaction->user_id }}">

          <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
            <div class="form-floating mb-3">
              <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                value="{{ $transaction->title }}" placeholder="Title">
              <label>Title</label>
            </div>@include('alerts.feedback', ['field' => 'title'])
          </div>
          <div class="mb-3{{ $errors->has('payment_methods_id') ? ' has-danger' : '' }}">
            <label for="method" class="form-label">Payment Method</label>
            <select id="method" name="payment_methods_id"
              class="payment-selected{{ $transaction->id }}{{ $errors->has('payment_methods_id') ? ' is-invalid' : '' }}">
              @foreach ($payment as $payment_method)
                @if ($payment_method['id'] == old('payment_method_id') or
                    $payment_method['id'] == $transaction->payment_methods_id)
                  <option value="{{ $payment_method['id'] }}" selected>{{ $payment_method['name'] }}</option>
                @else
                  <option value="{{ $payment_method['id'] }}">{{ $payment_method['name'] }}</option>
                @endif
              @endforeach
            </select>@include('alerts.feedback', ['field' => 'payment_methods_id'])
          </div>
          <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
            <div class="form-floating mb-3">
              <input type="number" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                name="amount" placeholder="Amount" value="{{ $transaction->amount }}">
              <label>Amount</label>
            </div>@include('alerts.feedback', ['field' => 'amount'])
          </div>
          <div class="form-group{{ $errors->has('reference') ? ' has-danger' : '' }}">
            <div class="form-floating mb-3">
              <input type="text" class="form-control{{ $errors->has('reference') ? ' is-invalid' : '' }}"
                name="reference" placeholder="Reference" value="{{ $transaction->reference }}">
              <label>Reference</label>
            </div>@include('alerts.feedback', ['field' => 'reference'])
          </div>
          <button type="submit" class="btn btn-lg btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>
