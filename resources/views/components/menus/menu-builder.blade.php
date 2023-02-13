<ol class="dd-list">
    @forelse($menu->items as $item)
        <li class="dd-item my-3" data-id="{{ $item->id }}">
            <div style="text-align: end; margin-bottom: -50px; margin-right: 15px">
                <a href="{{ route('menus.builder.edit', [$menu, $item]) }}" class="btn btn-sm">Edit</a>
                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                   data-bs-target="#modal-danger-{{ $item->id }}">
                    Delete
                </a>

                <div class="modal modal-blur fade" id="modal-danger-{{ $item->id }}" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-status bg-danger"></div>
                            <div class="modal-body text-center py-4">
                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 9v2m0 4v.01"/>
                                    <path
                                        d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"/>
                                </svg>
                                <h3>Are you sure?</h3>
                                <div class="text-muted">Do you really want to remove this menu? What you've done cannot
                                    be undone.
                                </div>
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
                                            <a class="btn btn-danger w-100" href="{{ route('menus.builder.destroy', [$menu, $item]) }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$item->id}}').submit();">
                                                Delete
                                            </a>

                                            <form id="delete-form-{{ $item->id }}" action="{{ route('menus.builder.destroy', [$menu, $item]) }}" method="POST"
                                                  class="d-none">
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
            </div>

            <div class="dd-handle my-3">
                <div>
                    @if ($item->type == 'divider')
                        <strong>Divider: {{ $item->title }}</strong>
                    @else
                        <span>{{ $item->title }}</span> <small class="url">{{ $item->url }}</small>
                    @endif
                </div>
            </div>

            @if(!$item->children->isEmpty())
                <ol class="dd-list">
                    @foreach($item->children as $children)
                        <li class="dd-item" data-id="{{ $children->id }}">
                            <div style="text-align: end; margin-bottom: -50px; margin-right: 15px">
                                <a href="{{ route('menus.builder.edit', [$item, $children]) }}" class="btn btn-sm">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                   data-bs-target="#modal-danger-{{ $children->id }}">
                                    Delete
                                </a>

                                <div class="modal modal-blur fade" id="modal-danger-{{ $children->id }}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <div class="modal-status bg-danger"></div>
                                            <div class="modal-body text-center py-4">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                                                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                     stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M12 9v2m0 4v.01"/>
                                                    <path
                                                        d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"/>
                                                </svg>
                                                <h3>Are you sure?</h3>
                                                <div class="text-muted">Do you really want to remove this menu? What you've done cannot
                                                    be undone.
                                                </div>
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
                                                            <a class="btn btn-danger w-100" href="{{ route('menus.builder.destroy', [$item, $children]) }}"
                                                               onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$children->id}}').submit();">
                                                                Delete
                                                            </a>

                                                            <form id="delete-form-{{ $children->id }}" action="{{ route('menus.builder.destroy', [$item, $children]) }}" method="POST"
                                                                  class="d-none">
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
                            </div>
                            <div class="dd-handle my-3">
                                <div>
                                    @if ($children->type == 'divider')
                                        <strong>Divider: {{ $children->title }}</strong>
                                    @else
                                        <span>{{ $children->title }}</span> <small
                                            class="url">{{ $children->url }}</small>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            @endif
        </li>
    @empty
        <div class="text-center">
            <strong>No menu item found.</strong>
        </div>
    @endforelse
</ol>
