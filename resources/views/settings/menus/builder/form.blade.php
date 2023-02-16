@extends('settings.layouts.default')

@section('settings-content')
    <div class="container-xl">
        <div class="mt-3 d-flex justify-content-end">
            <a href="{{ route('settings.menus.builder.index', $menu) }}" class="btn d-none d-md-inline-flex">
                <x-tabler icon="arrow-back"/>
                Back
            </a>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form method="POST"
                          action="{{ isset($item) ? route('settings.menus.builder.update', [$menu, $item]) : route('settings.menus.builder.store', $menu) }}">
                        @csrf
                        @if(isset($item))
                            @method('PUT')
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manage Menu Item (<code>{{ $menu->name }}</code>)</h3>
                            </div>

                            <div class="card-body border-bottom py-3">
                                <div class="mb-3">
                                    <label class="form-label">Title of the Item</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           value="{{ $item->title ?? old('title') }}" name="title"
                                           placeholder="Title of menu item">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

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
