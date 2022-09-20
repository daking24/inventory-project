
{{-- Edit Transfers Modal --}}
<div class="modal modal-right large fade" id="transfersEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{__('Name')}} Transfers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                    <label>Title</label>
                </div>
                <div class="mb-3">
                    <label for="sender_method" class="form-label">Sender Payment Method</label>
                    <select id="sender_method" name="sender_method" class="form-control sender-method-edit">
                        <option selected="">Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="receiver_method" class="form-label">Receiver Payment Method</label>
                    <select id="receiver_method" name="receiver_method" class="form-control receiver-method-edit">
                        <option selected="">Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="amount-sent" placeholder="Amount Sent">
                    <label>Amount Sent</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="amount-received" placeholder="Amount Received">
                    <label>Amount Received</label>
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
        select: '.sender-method-edit'
    })
    new SlimSelect({
        select: '.receiver-method-edit'
    })
</script>
@endpush('js')
