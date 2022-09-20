<div class="modal modal-right large fade" id="editSupplier" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ __('This') }} Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('client') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                    <label>Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="description" placeholder="Description">
                    <label>Description</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <label>Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                    <label>Phone Number</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Payment Information" rows="3" spellcheck="false"></textarea>
                    <label>Payment Information</label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Update</button>

            </form>
            </div>
        </div>
    </div>
</div>
