{{-- Create Transfers Modal --}}
<div class="modal modal-right large fade" id="transfersRegister" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register New Transfers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transfer.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                    <label>Title</label>
                </div>
                <div class="mb-3">
                    <label for="sender_method" class="form-label">Sender Payment Method</label>
                    <select id="sender_method" name="sender_method_id" class="sender-method">
                        @foreach ($payment as $item)
                            <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="receiver_method" class="form-label">Receiver Payment Method</label>
                    <select id="receiver_method" name="receiver_method_id" class="receiver-method">
                        @foreach ($payment as $item)
                            <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="sender_method" placeholder="Amount Sent">
                    <label>Amount Sent</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="receiver_method" placeholder="Amount Received">
                    <label>Amount Received</label>
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
        select: '.sender-method'
    })
    new SlimSelect({
        select: '.receiver-method'
    })
</script>
@endpush('js')
