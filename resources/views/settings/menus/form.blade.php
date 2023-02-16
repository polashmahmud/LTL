@extends('settings.layouts.default')

@section('settings-content')
    <div class="container-xl">
        <div class="mt-3 d-flex justify-content-end">
            <a href="{{ route('settings.menus.index') }}" class="btn btn-ghost-secondary">
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
                          action="{{ isset($menu) ? route('settings.menus.update', $menu) : route('settings.menus.store') }}">
                        @csrf
                        @if(isset($menu))
                            @method('PUT')
                        @endif


                        <div class="mb-3">
                            <label class="form-label">Menu name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ $menu->name ?? old('name') }}" name="name" placeholder="Menu name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Menu Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                   value="{{ $menu->description ?? old('description') }}" name="description" placeholder="Menu details">
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex">
                            <button type="submit" class="btn d-none d-md-inline-flex ms-auto">
                                <x-tabler icon="device-floppy"/>
                                @isset($menu)
                                    Menu Update
                                @else
                                    Menu Create
                                @endisset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
