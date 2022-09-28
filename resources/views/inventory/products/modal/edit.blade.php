<div class="modal modal-right large fade" id="editProduct" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ __('This') }} Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                    <label>Name</label>
                </div>
                </div>
                <div class="mb-5">
                    <label class="form-label">Category</label>

                    <select class="select2">
                        @foreach ($categories as $category)
                            @if($category['id'] == old('document') )
                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                            @else
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="description" placeholder="Description">
                    <label>Description</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock" placeholder="Stock">
                    <label>Stock</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="defective" placeholder="Defectives">
                    <label>Defectives</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="cost_price" placeholder="Cost Price">
                    <label>Cost Price</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="sell_price" placeholder="Selling Price">
                    <label>Selling Price</label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Update</button>

            </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    new SlimSelect({
        select: '.select2'
    })
</script>
@endpush
