{{-- Create Payment Modal --}}
<div class="modal modal-right large fade" id="paymentRegister" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register New Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transactions.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" name="type" value="payment">
                </div>
                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" name="user_id" value="{{ Auth::id() }}">
                </div>

                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Title">
                    <label>Title</label>
                </div>@include('alerts.feedback', ['field' => 'title'])
                </div>
                <div class="mb-3{{ $errors->has('provider_id') ? ' has-danger' : '' }}">
                    <label for="provider" class="form-label">Provider</label>
                    <select id="provider" name="provider_id" class="provider-select{{ $errors->has('provider_id') ? ' is-invalid' : '' }}">
                        @foreach ($provider as $item)
                            @if($item['id'] == old('provider_id'))
                                <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                            @else
                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                            @endif
                        @endforeach
                    </select>@include('alerts.feedback', ['field' => 'provider_id'])
                </div>
                <div class="mb-3{{ $errors->has('payment_methods_id') ? ' has-danger' : '' }}">
                    <label for="method" class="form-label">Payment Method</label>
                    <select id="method" name="payment_methods_id" class="method-select{{ $errors->has('payment_methods_id') ? ' is-invalid' : '' }}">
                        @foreach ($payment as $items)
                            @if($items['id'] == old('payment_methods_id'))
                                <option value="{{$items['id']}}" selected>{{$items['name']}}</option>
                            @else
                                <option value="{{$items['id']}}">{{$items['name']}}</option>
                            @endif
                        @endforeach
                    </select>@include('alerts.feedback', ['field' => 'payment_methods_id'])
                </div>
                <div class="{{ $errors->has('amount') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" placeholder="Amount">
                    <label>Amount</label>
                </div>@include('alerts.feedback', ['field' => 'amount'])
                </div>
                <div class="form-group{{ $errors->has('reference') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control{{ $errors->has('reference') ? ' is-invalid' : '' }}" name="reference" placeholder="Reference">
                    <label>Reference</label>
                </div>@include('alerts.feedback', ['field' => 'reference'])
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@push('js')
<script>
    new SlimSelect({
        select: '.provider-select'
    })
    new SlimSelect({
        select: '.method-select'
    })
</script>
@endpush('js')
