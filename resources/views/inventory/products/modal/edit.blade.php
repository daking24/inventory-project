<div class="modal modal-right large fade" id="editProduct{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $item->name }} Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('products.update', $item) }}" method="post">
                @csrf
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ $item->name }}" required>
                    <label>Name</label>
                </div>@include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="mb-5{{ $errors->has('product_category_id') ? ' has-danger' : '' }}">
                    <label class="form-label">Category</label>
                    <select class="select2{{ $item->id }}{{ $errors->has('product_category_id') ? ' is-invalid' : '' }}" name="product_category_id" required>
                        <option >Choose ...</option>
                        @foreach ($categories as $category)
                            @if($category['id'] == old('product_category_id') or $category['id'] == $item->product_category_id)
                            <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                            @else
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endif
                            @endforeach
                    </select>@include('alerts.feedback', ['field' => 'product_category_id'])
                </div>
                <div class="form-floating mb-3{{ $errors->has('description') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Description" value="{{ $item->description }}" >
                    <label>Description</label>@include('alerts.feedback', ['field' => 'description'])
                </div>
                <div class="form-floating mb-3{{ $errors->has('stock') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}" name="stock" placeholder="Stock" value="{{ $item->stock }}" required>
                    <label>Stock</label>@include('alerts.feedback', ['field' => 'stock'])
                </div>

                <div class="form-floating mb-3{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control{{ $errors->has('stock_defective') ? ' is-invalid' : '' }}" name="stock_defective" placeholder="Defectives" value="{{ $item->stock_defective}}">
                    <label>Defectives</label>@include('alerts.feedback', ['field' => 'stock_defective'])
                </div>

                <div class="form-floating mb-3{{ $errors->has('base_price') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control{{ $errors->has('base_price') ? ' is-invalid' : '' }}" name="base_price" placeholder="Cost Price" value="{{ old('base_price', $item->base_price) }}" required>
                    <label>Cost Price</label>@include('alerts.feedback', ['field' => 'base_price'])
                </div>
                <div class="form-floating mb-3{{ $errors->has('selling_price') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control{{ $errors->has('selling_price') ? ' is-invalid' : '' }}" name="selling_price" placeholder="Selling Price" value="{{ $item->selling_price }}" required>
                    <label>Selling Price</label>@include('alerts.feedback', ['field' => 'selling_price'])
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
        select: '.select2{{ $item->id }}'
    })
</script>
@endpush
