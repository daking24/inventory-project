<div class="modal modal-right large fade" id="editSupplier{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $item->name }} Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('supplier.update', $item->id) }}" method="post">
                @csrf
                <div class="form-floating mb-3{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ $item->name }}">
                    <label>Name</label>@include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="form-floating mb-3{{ $errors->has('description') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $item->description }}" placeholder="Description">
                    <label>Description</label>@include('alerts.feedback', ['field' => 'description'])
                </div>
                <div class="form-floating mb-3{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $item->email }}" name="email" placeholder="Email">
                    <label>Email</label>@include('alerts.feedback', ['field' => 'email'])
                </div>
                <div class="form-floating mb-3{{ $errors->has('phone') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $item->phone }}" name="phone" placeholder="Phone Number">
                    <label>Phone Number</label>@include('alerts.feedback', ['field' => 'phone'])
                </div>
                <div class="form-floating mb-3{{ $errors->has('paymentInfo') ? ' has-danger' : '' }}">
                    <textarea class="form-control{{ $errors->has('paymentInfo') ? ' is-invalid' : '' }}" value="{{ $item->paymentInfo }}" name="paymentInfo" placeholder="Payment Information" rows="3" spellcheck="false"></textarea>
                    <label>Payment Information</label>@include('alerts.feedback', ['field' => 'paymentInfo'])
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Update</button>

            </form>
            </div>
        </div>
    </div>
</div>
