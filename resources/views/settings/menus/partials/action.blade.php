<div class="d-flex space-x-1">
    <a href="{{ route('settings.menus.builder.index', $row) }}" class="btn btn-sm btn-success">Builder</a>
    <a href="" class="btn btn-sm">Edit</a>
    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-simple-{{ $row->id }}">
        Delete
    </a>

</div>

<div class="modal modal-blur fade" id="modal-simple-{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <h3>Are you sure?</h3>
                <div class="text-muted">Do you really want to remove <code>{{ $row->slug }}</code> role? What you've done cannot be undone.</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Cancel
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" onclick="event.preventDefault();document.getElementById('delete-role-{{$row->id}}').submit();" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                Delete
                            </a>
                            <form id="delete-role-{{$row->id}}" action="{{ route('settings.roles.destroy', $row->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
