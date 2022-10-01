{{-- Edit Method Modal --}}
<div class="modal modal-right large fade" id="editMethod{{ $method->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $method->name }} Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('payment-methods.update', $method->id) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-floating mb-3{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="name" placeholder="Name" value="{{ $method->name }}">
                    <label>Name</label>@include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="form-floating mb-3{{ $errors->has('description') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ $method->description }}" name="description" placeholder="Description">
                    <label>Description</label>@include('alerts.feedback', ['field' => 'description'])
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
