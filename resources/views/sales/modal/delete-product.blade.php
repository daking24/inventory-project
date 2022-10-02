<!-- Modal -->
<div class="modal fade" id="deleteProduct{{ $sold_product->id }}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelDefault">Delete {{ $sold_product->product->name }} ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Are You Sure You Want To Delete Product: {{ $sold_product->product->name }} ?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{ route('sales.product.delete', ['sale' => $sale, 'soldproduct' => $sold_product->id]) }}"
          method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-primary">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
