<div class="d-flex space-x-1">
    <a href="" class="btn btn-sm">Edit</a>
    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-simple">
        Delete
    </a>

</div>

<div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <h3>Are you sure?</h3>
                <div class="text-muted">Do you really want to remove 84 files? What you've done cannot be undone.</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Cancel
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                Delete 84 items
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
