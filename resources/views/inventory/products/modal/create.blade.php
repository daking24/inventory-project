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
    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name">
                    <label>Name</label>
                </div>
                    @include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="form-group mb-3" {{ $errors->has('product_category_id') ? ' has-danger' : '' }}>
                    <label class="form-label">Category</label>
                    <select class="form-selected{{ $errors->has('name') ? ' is-invalid' : '' }}" name="product_category_id">
                        @foreach ($categories as $item)
                            @if($item['id'] == old('document'))
                                                <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                                            @else
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                            @endif
                        @endforeach
                    </select>
                    @include('alerts.feedback', ['field' => 'product_category_id'])
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="description" placeholder="Description">
                    <label>Description</label>
                </div>
                    @include('alerts.feedback', ['field' => 'description'])
                </div>
                <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock" placeholder="Stock">
                    <label>Stock</label>
                </div>
                    @include('alerts.feedback', ['field' => 'stock'])
                </div>
                <div class="form-group{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock_defective" placeholder="Defectives">
                    <label>Defectives</label>
                </div>
                @include('alerts.feedback', ['field' => 'stock_defective'])
                </div>
                <div class="form-group{{ $errors->has('base_price') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="base_price" placeholder="Cost Price">
                    <label>Cost Price</label>
                </div>
                @include('alerts.feedback', ['field' => 'base_price'])
                </div>
                <div class="form-group{{ $errors->has('selling_price') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="selling_price" placeholder="Selling Price">
                    <label>Selling Price</label>
                </div>
                @include('alerts.feedback', ['field' => 'selling_price'])
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
