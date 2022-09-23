<div class="modal modal-right large fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('receipts.product.store', $receipt) }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" name="receipt_id" value="{{ $receipt->id }}">
                </div>
                <div class="mb-3" >
                    <label class="form-label">Product</label>
                    <select class="product-select" name="product_id">
                        @foreach ($products as $product)
                            @if($product['id'] == old('product_id'))
                                <option value="{{$product['id']}}" selected>[{{ $product->category->name }}] {{ $product->name }}</option>
                            @else
                                <option value="{{$product['id']}}">[{{ $product->category->name }}] {{ $product->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock" placeholder="Stock">
                    <label>Stock</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock_defective" placeholder="Defective Stock">
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
        select: '.product-select'
    })
</script>
@endpush
