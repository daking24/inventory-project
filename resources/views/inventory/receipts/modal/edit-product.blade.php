<div class="modal modal-right large fade" id="editProduct" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ __('This') }} Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('client') }}" method="post">
                @csrf
                <div class="mb-3" >
                    <label class="form-label">Product</label>
                    <select class="product-selected">
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

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock" placeholder="Stock">
                    <label>Stock</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="defects" placeholder="Defective Stock">
                    <label>Defective Stock</label>
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
        select: '.product-selected'
    })
</script>
@endpush
