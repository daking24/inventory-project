{{-- Edit Method Modal --}}
<div class="modal modal-right large fade" id="editStaff{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $item->name }} Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('staffs.update', $item->id) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $item->name }}" readonly>
                    <label>Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $item->email }}" readonly>
                    <label>E-mail</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="password" placeholder="Password" >
                    <label>Password</label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
