<div class="modal modal-right large fade" id="createCategory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('client') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                    <label>Name</label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Save</button>

            </form>
            </div>
        </div>
    </div>
</div>
