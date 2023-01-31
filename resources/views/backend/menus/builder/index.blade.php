@extends('layouts.backend.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <x-backend.page-headers
            title="Menu Builder"
            :breadcrumbs="[
                'Dashboard' => '#',
                'Menus' => route('app.menus.index'),
                'Builder' => 'active',
            ]"
        >
            <div class="btn-list">
                <a href="{{ route('app.menus.builder.create', $menu) }}" class="btn d-none d-md-inline-flex">
                    <x-tabler icon="plus" />
                    Add New menu item
                </a>
            </div>
        </x-backend.page-headers>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Menu: <code>{{ $menu->name }}</code></h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="dd menu-builder">
{{--                                <ol class="dd-list">--}}
{{--                                    @forelse($menu->items as $item)--}}
{{--                                    <li class="dd-item" data-id="{{ $item->id }}">--}}
{{--                                        <div class="dd-handle d-flex justify-content-between align-items-center">--}}
{{--                                            <div>{{ $item->title }}</div>--}}
{{--                                            <div>--}}
{{--                                                <a href="{{ route('app.menus.builder.edit', [$menu, $item]) }}" class="btn btn-sm btn-primary">Edit</a>--}}
{{--                                                <form action="{{ route('app.menus.builder.destroy', [$menu, $item]) }}" method="POST" class="d-inline-block">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="dd-handle">--}}
{{--                                            @if ($item->type == 'divider')--}}
{{--                                                <strong>Divider: {{ $item->divider_title }}</strong>--}}
{{--                                            @else--}}
{{--                                                <span>{{ $item->title }}</span> <small class="url">{{ $item->url }}</small>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    @empty--}}
{{--                                        <p>Menu item not found!</p>--}}
{{--                                    @endforelse--}}
{{--                                </ol>--}}
                                <ol class="dd-list">
                                    @forelse($menu->items as $item)
                                        <li class="dd-item" data-id="{{ $item->id }}">
                                            <div class="pull-right item_actions">
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
                                            <div class="dd-handle">
                                                @if ($item->type == 'divider')
                                                    <strong>Divider: {{ $item->title }}</strong>
                                                @else
                                                    <span>{{ $item->title }}</span> <small class="url">{{ $item->url }}</small>
                                                @endif
                                            </div>
                                            @if(!$item->children->isEmpty())
                                                <ol class="dd-list">
                                                    @foreach($item->children as $children)
                                                        <li class="dd-item" data-id="{{ $children->id }}">
                                                            <div class="pull-right item_actions">
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
                                                            <div class="dd-handle">
                                                                @if ($children->type == 'divider')
                                                                    <strong>Divider: {{ $children->title }}</strong>
                                                                @else
                                                                    <span>{{ $children->title }}</span> <small class="url">{{ $children->url }}</small>
                                                                @endif
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{ asset('backend/js/jquery.nestable.min.js') }}"></script>
    <script>
        $('.dd').nestable({ maxDepth: 2 });

        {{--$('.dd').on('change', function() {--}}
        {{--    $.ajax({--}}
        {{--        url: '{{ route('app.menus.builder.move', $menu) }}',--}}
        {{--        type: 'POST',--}}
        {{--        data: {--}}
        {{--            order: JSON.stringify($('.dd').nestable('serialize')),--}}
        {{--            _token: '{{ csrf_token() }}'--}}
        {{--        },--}}
        {{--        success: function(response) {--}}
        {{--            console.log(response);--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

        $('.dd').on('change', function(e) {
            $.post('{{ route('app.menus.builder.move', $menu) }}', {
                order: JSON.stringify($('.dd').nestable('serialize')),
                _token: '{{ csrf_token() }}'
            }, function(data) {
                console.log(data);
            });
        })
    </script>
@endpush
