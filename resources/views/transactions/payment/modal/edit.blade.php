{{-- Edit Payment Modal --}}
<div class="modal modal-right large fade" id="paymentEdit{{ $transaction->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{__($transaction->title)}} Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transaction.update', $transaction->id) }}" method="post">
                @csrf
                <input type="hidden" id="type" name="type" value="{{$transaction->type}}">
                <input type="hidden" id="user_id" name="user_id" value="{{ $transaction->user_id }}">
            <div class="modal-body">
                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="text" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Title" value="{{ $transaction->title }}">
                    <label>Title</label>
                </div>
                    @include('alerts.feedback', ['field' => 'title'])
                </div>
                <div class="form-group{{ $errors->has('provider_id') ? ' has-danger' : '' }} mb-3">
                    <label for="provider" class="form-label">Provider</label>
                    <select id="provider" name="provider_id" class="provider-selected{{ $transaction->id }} {{ $errors->has('provider_id') ? ' is-invalid' : '' }}" required>
                        @foreach ($provider as $provider)
                            @if( $provider['id'] ==  $transaction->provider_id)
                                <option value="{{$provider['id']}}" selected>{{$provider['name']}}</option>
                            @else
                                <option value="{{$provider['id']}}">{{$provider['name']}}</option>
                            @endif
                        @endforeach
                    </select>@include('alerts.feedback', ['field' => 'provider_id'])
                </div>
                <div class="form-group{{ $errors->has('payment_method_id') ? ' has-danger' : '' }} mb-3">
                    <label for="method" class="form-label">Payment Method</label>
                    <select id="method" name="payment_method_id" class="method-selected{{ $transaction->id }} {{ $errors->has('payment_method_id') ? ' is-invalid' : '' }}" required>
                        @foreach ($payment as $payment_method)
                            @if( $payment_method['id'] === $transaction->payment_method_id)
                                <option value="{{$payment_method['id']}}" selected>{{$payment_method['name']}}</option>
                            @else
                                <option value="{{$payment_method['id']}}">{{$payment_method['name']}}</option>
                            @endif
                        @endforeach
                    </select>@include('alerts.feedback', ['field' => 'payment_method_id'])
                </div>
                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input id="amount" type="number" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" placeholder="Amount" value="{{ $transaction->amount * -1 }}">
                    <label>Amount</label>
                </div>@include('alerts.feedback', ['field' => 'amount'])
                </div>
                <div class="form-group{{ $errors->has('reference') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input id="reference" type="text" class="form-control{{ $errors->has('reference') ? ' is-invalid' : '' }}" name="reference" placeholder="Reference" value="{{ $transaction->reference }}">
                    <label>Reference</label>
                </div>@include('alerts.feedback', ['field' => 'reference'])
                </div>
                <button type="submit" id="submitPayment" class="btn btn-lg btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@push('js')
<script>
    new SlimSelect({
        select: '.provider-selected{{ $transaction->id }}'
    })
    new SlimSelect({
        select: '.method-selected{{ $transaction->id }}'
    })
</script>
@endpush('js')
