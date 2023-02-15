@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <x-page-headers
            title="Menu item"
            :breadcrumbs="[
                'Dashboard' => '#',
                'Menus' => route('menus.index'),
                isset($item) ? 'Edit' : 'Create' => 'active',
            ]"
        >
            <div class="btn-list">
                <a href="{{ route('menus.builder.index', $menu) }}" class="btn d-none d-md-inline-flex">
                    <x-tabler icon="arrow-back"/>
                    Back
                </a>
            </div>
        </x-page-headers>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form method="POST"
                          action="{{ isset($item) ? route('menus.builder.update', [$menu, $item]) : route('menus.builder.store', $menu) }}">
                        @csrf
                        @if(isset($item))
                            @method('PUT')
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manage Menu Item (<code>{{ $menu->name }}</code>)</h3>
                            </div>

                            <div
                                class="card-body border-bottom py-3"
                                x-data="{item: true}"
                            >
                                <div class="mb-3">
                                    <div class="form-label">Menu type</div>
                                    <div>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" x-on:click="item = true" name="type"
                                                   value="item" type="radio" @isset($item) @if($item->type == 'item') checked @endif @endisset>
                                            <span class="form-check-label">Item</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" x-on:click="item = false" name="type"
                                                   value="divider" type="radio" @isset($item) @if($item->type == 'divider') checked @endif @endisset>
                                            <span class="form-check-label">Divider</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label x-show="item" class="form-label">Title of the Item</label>
                                    <label x-show="!item" class="form-label">Title of the divider</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           value="{{ $item->title ?? old('title') }}" name="title"
                                           placeholder="Title of menu item">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div x-show="item">
                                    <div class="mb-3">
                                        <label class="form-label">URL for the Menu Item</label>
                                        <input type="text" class="form-control @error('url') is-invalid @enderror"
                                               value="{{ $item->url ?? old('url') }}" name="url"
                                               placeholder="URL of menu item">
                                        @error('url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-label">Open In</div>
                                        <div>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" name="target" value="_self" type="radio"
                                                       checked>
                                                <span class="form-check-label">Same Tab/Window</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" name="target" value="_blank"
                                                       type="radio">
                                                <span class="form-check-label">New Tab/Window</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Icon name for the Menu Item
                                            <a target="_blank" href="https://tabler-icons.io/">(Use Tabler Icon)</a>
                                        </label>
                                        <input type="text"
                                               class="form-control @error('icon_class') is-invalid @enderror"
                                               value="{{ $item->icon_class ?? old('icon_class') }}" name="icon_class"
                                               placeholder="Icon Class (optional)">
                                        @error('icon_class')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="d-flex">
                                    <button type="submit" class="btn d-none d-md-inline-flex ms-auto">
                                        <x-tabler icon="device-floppy"/>
                                        @isset($item)
                                            Item Update
                                        @else
                                            Item Create
                                        @endisset
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
