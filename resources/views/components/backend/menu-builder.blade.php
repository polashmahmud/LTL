<ol class="dd-list">
    @forelse($menu as $item)
        <li class="dd-item" data-id="{{ $item->id }}">
            <div class="dd-handle d-flex justify-content-between align-items-center">
                <div>
                    @if ($item->type == 'divider')
                        <strong>Divider: {{ $item->title }}</strong>
                    @else
                        <span>{{ $item->title }}</span> <small class="url">{{ $item->url }}</small>
                    @endif
                </div>

                <div>
                    <button type="button" class="btn btn-sm btn-danger float-right delete" onclick="deleteData({{ $item->id }})">
                        <i class="fas fa-trash-alt"></i>
                        <span>Delete</span>
                    </button>
                    <form id="delete-form-{{ $item->id }}" action=""
                          method="POST" style="display: none;">
                        @csrf()
                        @method('DELETE')
                    </form>
                    <a class="btn btn-sm btn-primary float-right edit" href="">
                        <i class="fas fa-edit"></i>
                        <span>Edit</span>
                    </a>
                </div>
            </div>
            @if(!$item->children->isEmpty())
                <ol class="dd-list">
                    @foreach($item->children as $children)
                        <li class="dd-item" data-id="{{ $children->id }}">
                            <div class="dd-handle d-flex justify-content-between align-items-center">
                                <div>
                                    @if ($children->type == 'divider')
                                        <strong>Divider: {{ $children->title }}</strong>
                                    @else
                                        <span>{{ $children->title }}</span> <small class="url">{{ $children->url }}</small>
                                    @endif
                                </div>

                                <div>
                                    <button type="button" class="btn btn-sm btn-danger float-right delete" onclick="deleteData({{ $children->id }})">
                                        <i class="fas fa-trash-alt"></i>
                                        <span>Delete</span>
                                    </button>
                                    <form id="delete-form-{{ $children->id }}" action=""
                                          method="POST" style="display: none;">
                                        @csrf()
                                        @method('DELETE')
                                    </form>
                                    <a class="btn btn-sm btn-primary float-right edit" href="">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            @endif
        </li>
    @empty
        <div class="text-center">
            <strong >No menu item found.</strong>
        </div>
    @endforelse
</ol>
