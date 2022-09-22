<div class="modal modal-right large fade" id="createReceipt" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                    <label>Title</label>
                </div>
                <div class="mb-3" >
                    <label class="form-label">Supplier (Optional)</label>
                    <select class="supplier-select">
                        {{-- <option label="&nbsp;"></option> --}}
                        <option value="Breadstick">Breadstick</option>
                        <option value="Biscotti">Biscotti</option>
                        <option value="Fougasse">Fougasse</option>
                        <option value="Lefse">Lefse</option>
                        <option value="Melonpan">Melonpan</option>
                        <option value="Naan">Naan</option>
                        <option value="Panbrioche">Panbrioche</option>
                        <option value="Rewena">Rewena</option>
                        <option value="Shirmal">Shirmal</option>
                        <option value="Tunnbröd">Tunnbröd</option>
                        <option value="Vánočka">Vánočka</option>
                        <option value="Zopf">Zopf</option>
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
