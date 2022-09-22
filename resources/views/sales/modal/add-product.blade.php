<div class="modal modal-right large fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="mb-3" action="" method="post">
          <div class="mb-3">
            <label for="receiver_method" class="form-label">Select Product</label>
            <select id="receiver_method" name="product" id="product" class="select-product">
              <option value="1">Choose...</option>
              <option value="2">...</option>
              <option value="3">...</option>
              <option value="4">...</option>
              <option value="5">...</option>
            </select>
          </div>
          <fieldset disabled="">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Selling Price" id="product-price" name="selling_price" value="₦2000" disabled="">
                    <label>Selling Price</label>
                </div>
            </fieldset>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" placeholder="Quantity" name="quantity">
                <label>Quantity</label>
            </div>
            <fieldset disabled="">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Total Price" name="total_price" value="₦2000" disabled="">
                    <label>Total Price</label>
                </div>
            </fieldset>
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
    })

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
