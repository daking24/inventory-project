<div class="modal modal-right large fade" id="createProduct" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('createProduct') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                    <label>Name</label>
                </div>
                <div class="mb-3" >
                    <label class="form-label">Category</label>
                    <select class="form-selected" name="product_category_id">
                        @foreach ($categories as $item)
                            <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
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
                    <input type="number" class="form-control" name="stock_defective" placeholder="Defectives">
                    <label>Defectives</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="base_price" placeholder="Cost Price">
                    <label>Cost Price</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="selling_price" placeholder="Selling Price">
                    <label>Selling Price</label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Save</button>

            </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    new SlimSelect({
        select: '.form-selected'
    })
</script>
@endpush('js')
