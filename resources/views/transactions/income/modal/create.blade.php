{{-- Create Income Modal --}}
<div class="modal modal-right large fade" id="incomeRegister" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register New Income</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Title">
                    <label>Name</label>
                </div>
                <div class="mb-3">
                    <label for="method" class="form-label">Payment Method</label>
                    <select id="method" name="method" class="payment-select">
                        <option selected="">Choose...</option>
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
                <button type="submit" class="btn btn-lg btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@push('js')
<script>
    new SlimSelect({
        select: '.payment-select'
    })
</script>
@endpush('js')
