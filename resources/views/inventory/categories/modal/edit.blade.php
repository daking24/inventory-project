<div class="modal modal-right large fade" id="editCategory{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $item->name }} Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('inventory-category.update', $item->id) }}" method="post">
                @csrf
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ $item->name }}">
                    <label>Name</label>
                </div>
                    @include('alerts.feedback', ['field' => 'name'])
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Update</button>

            </form>
            </div>
        </div>
    </div>
</div>
