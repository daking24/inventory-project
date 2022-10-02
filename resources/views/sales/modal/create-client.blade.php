<div class="modal modal-right large fade" id="createClient" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Register/Select Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="mb-3" action="{{ route('sales.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="method" class="form-label">Select Customer</label>
            <select id="method" name="client_id" class="customer-select">
              <option disabled selected>Choose...</option>
              @foreach ($client as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
              @endforeach
            </select>
            <div class="form-floating mb-3">
              <input type="hidden" class="form-control" name="user_id" value="{{ Auth::id() }}">
            </div>

          </div>
          <button type="submit" class="btn btn-lg btn-primary">Continue</button>
        </form>
        <hr>
        <form action="{{ route('createClient') }}" method="post">
          @csrf
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" placeholder="Customer's Name">
            <label>Customer's Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
            <label>Phone Number</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="email" placeholder="Email">
            <label>Email</label>
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
      select: '.customer-select'
    })
  </script>
@endpush
