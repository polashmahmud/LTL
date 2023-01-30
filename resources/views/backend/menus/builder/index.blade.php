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
                            <div class="dd">
                                <ol>
                                    @forelse($menu->items as $item)
                                        <li>{{ $item->title }} <a href="{{ route('app.menus.builder.edit', [$menu, $item]) }}">Edit</a></li>
                                    @empty
                                        <p>Menu item not found!</p>
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
