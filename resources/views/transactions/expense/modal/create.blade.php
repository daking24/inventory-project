{{-- Create Expense Modal --}}
<div class="modal modal-right large fade" id="expensesRegister" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register Expenses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transactions.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" name="type" value="expense">
                </div>
                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" name="user_id" value="{{ Auth::id() }}">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                    <label>Name</label>
                </div>
                <div class="mb-3">
                    <label for="method" class="form-label">Method Of Payment</label>
                    <select id="method" name="payment_methods_id" class="form-control form-select">
                        @foreach ($payment as $item)
                            <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="amount" placeholder="Amount">
                    <label>Amount</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="reference" placeholder="Reference">
                    <label>Reference</label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Register</button>
            </div>
            </form>
        </div>
    </div>
</div>
@push('js')
<script>
    new SlimSelect({
        select: '#method'
    })
</script>
@endpush('js')