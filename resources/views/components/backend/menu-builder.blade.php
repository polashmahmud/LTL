<ol class="dd-list">
    @forelse($menu->items as $item)
        <li class="dd-item my-3" data-id="{{ $item->id }}">
                <div style="text-align: end; margin-bottom: -50px; margin-right: 15px">
                    <a href="{{ route('app.menus.builder.edit', [$menu, $item]) }}" class="btn btn-sm">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                       data-bs-target="#modal-simple-{{ $item->id }}">
                        Delete
                    </a>
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
                                <a href="#" class="btn btn-sm">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                   data-bs-target="#modal-simple-{{ $children->id }}">
                                    Delete
                                </a>
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
