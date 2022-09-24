<div class="modal modal-right large fade" id="editProduct" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ __('This') }} Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('products.update', $item) }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $item->name }}">
                    <label>Name</label> 
                </div>
                <div class="mb-5">
                    <label class="form-label">Category</label>
                    <select class="select2" name="product_category_id">
                        <option >Choose ...</option>
                        @foreach ($categories as $category)
                            @if($category['id'] == old('product_category_id') or $category['id'] == $item->product_category_id)
                            <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                            @else
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endif
                            @endforeach
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $item->description }}">
                    <label>Description</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock" placeholder="Stock" value="{{ $item->stock }}">
                    <label>Stock</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock_defective" placeholder="Defectives" value="{{ $item->stock_defective}}">
                    <label>Defectives</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="base_price" placeholder="Cost Price" value="{{ old('base_price', $item->base_price) }}">
                    <label>Cost Price</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="selling_price" placeholder="Selling Price" value="{{ $item->selling_price }}">
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
