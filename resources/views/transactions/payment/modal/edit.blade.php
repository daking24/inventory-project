{{-- Edit Payment Modal --}}
<div class="modal modal-right large fade" id="paymentEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{__('Name')}} Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{__('hmm')}}">
                    <label>Title</label>
                </div>
                <div class="mb-3">
                    <label for="provider" class="form-label">Provider</label>
                    <select id="provider" name="provider" class="provider-selected">
                        <option selected="">Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="method" class="form-label">Payment Method</label>
                    <select id="method" name="method" class="method-selected">
                        <option>Choose...</option>
                        <option>...</option>
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
                <button type="submit" class="btn btn-lg btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@push('js')
<script>
    new SlimSelect({
        select: '.provider-selected'
    })
    new SlimSelect({
        select: '.method-selected'
    })
</script>
@endpush('js')
