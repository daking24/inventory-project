<div class="modal modal-right large fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="mb-3" action="{{ route('storeProduct') }}" method="post">
          @csrf
          <div class="mb-3">
            <label for="receiver_method" class="form-label">Select Product</label>
            <select id="receiver_method" name="product" class="select-product">
              @foreach ($products as $item)
              <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
             @endforeach
            </select>
          </div>
          <fieldset disabled="">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Selling Price" name="selling_price" value="₦2000" disabled="">
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
  </script>
@endpush('js')
