@extends('settings.layouts.default')

@section('settings-content')
    <div class="container-xl">
        <div class="mt-3 d-flex justify-content-end">
            <a href="{{ route('settings.menus.builder.create', $menu) }}" class="btn d-none d-md-inline-flex">
                <x-tabler icon="plus"/>
                Add New menu item
            </a>
        </div>
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
                                <x-menus.menu-builder :menu="$menu"/>
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
        $('.dd').nestable({maxDepth: 2})
            .on('change', function (e) {
                $.post('{{ route('settings.menus.builder.move', $menu) }}', {
                    order: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '{{ csrf_token() }}'
                }, function (data) {
                    console.log(data);
                });
            })
    </script>
@endpush
