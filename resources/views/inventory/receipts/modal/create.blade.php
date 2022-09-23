<div class="modal modal-right large fade" id="createReceipt" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('receipt.store') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" name="user_id" value="{{ Auth::id() }}">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                    <label>Title</label>
                </div>
                <div class="mb-3" >
                    <label class="form-label">Supplier (Optional)</label>
                    <select class="supplier-select" name="provider_id">
                        @foreach ($provider as $item)
                            <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Continue</button>

            </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    new SlimSelect({
        select: '.supplier-select'
    })
</script>
@endpush
