<div class="modal modal-right large fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="mb-3" action="{{ route('sales.product.store', $sale) }}" method="post">
          @csrf
          <div class="form-floating mb-3">
            <input type="hidden" name="sale_id" value="{{$sale->id}}">
          </div>
          <div class="mb-3">
            <label for="receiver_method" class="form-label">Select Product</label>
            <select id="receiver_method" name="product_id" class="select-product">
              @foreach ($products as $item)
              <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
             @endforeach
            </select>
          </div>
          <div class="form-floating mb-3">
                    <input type="number" class="form-control form-control-alternative" placeholder="Selling Price" name="unit_price" value="0" readonly>
                    <label>Selling Price</label>
          </div>
          <div class="form-floating mb-3">
                <input type="number" class="form-control" placeholder="Quantity" name="quantity">
                <label>Quantity</label>
          </div>
          <div class="form-floating mb-3">
                    <input type="number" class="form-control form-control-alternative" placeholder="Total Amount" name="total_amount" value="0" readonly>
                    <label>Total Price</label>
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
      select: '.select-product'
    });
    </script>
    <script>
     $('#product').change(function() {
        let id = $(this).val();
        console.log(id);
        let url = '{{ route('json-product', ':id') }}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                if (response !== null) {
                    $('#product-price').val('');
                    $('#product-price').val(response.selling_price);
                }
            }
        });
    });
  </script>
@endpush('js')
