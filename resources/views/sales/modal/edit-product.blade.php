<div class="modal modal-right large fade" id="editProduct{{ $sold_product->id }}" tabindex="-1" role="dialog"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Product: {{ $sold_product->product->name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="mb-3"
          action="{{ route('sales.product.update', ['sale' => $sale, 'soldproduct' => $sold_product->id]) }}"
          method="post">
          @csrf
          <div class="form-floating mb-3">
            <input type="hidden" name="sale_id" value="{{ $sale->id }}">
          </div>
          <div class="mb-3">
            <label for="receiver_method" class="form-label">Select Product</label>
            <select id="receiver_methods" name="product_id" class="select-product{{ $sold_product->id }}">
              <option disabled>Choose...</option>
              @foreach ($products as $item)
                @if ($item['id'] == old('product_id'))
                  <option value="{{ $item['id'] }}" selected>[{{ $item->category->name }}] {{ $item->name }}</option>
                @else
                  <option value="{{ $item['id'] }}">[{{ $item->category->name }}] {{ $item->name }} </option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-floating mb-3">
            <input id="product-prices" type="number" class="form-control form-control-alternative"
              placeholder="Selling Price" name="unit_price" value="{{ $sold_product->unit_price }}" readonly>
            <label>Selling Price(Naira)</label>
          </div>
          <div class="form-floating mb-3">
            <input id="input-qtys" type="number" class="form-control" placeholder="Quantity" name="quantity" value="{{ $sold_product->quantity }}">
            <label>Quantity</label>
          </div>
          <div class="form-floating mb-3">
            <input id="input-totals" type="text" class="form-control form-control-alternative"
              placeholder="Total Amount" name="total_amount" value="{{ $sold_product->total_amount }}" readonly>
            <label>Total Price(Naira)</label>
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
      select: '.select-product{{ $sold_product->id }}'
    });
  </script>
  <script>
    $('#receiver_methods').change(function() {
      let id = $(this).val();
      // console.log(id);
      let urls = '{{ route('json-product', ':id') }}';
      urls = urls.replace(':id', id);

      $.ajax({
        url: urls,
        type: 'get',
        dataType: 'json',
        success: function(response) {
          if (response !== null) {
            $('#product-prices').val('');
            $('#product-prices').val(response.selling_price);
          }
        }
      });
    });
  </script>
  <script>
    let input_qtys = document.getElementById('input-qtys');
    let input_prices = document.getElementById('product-prices');
    let input_totals = document.getElementById('input-totals');
    input_qtys.addEventListener('input', updateTotals);
    input_prices.addEventListener('input', updateTotals);

    function updateTotals() {
      input_totals.value = "₦" + (parseInt(input_qtys.value) * parseFloat(input_prices.value));
    }
  </script>
@endpush
