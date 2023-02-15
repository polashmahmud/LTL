@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <x-page-headers
            title="Menu"
            :breadcrumbs="[
                'Dashboard' => '#',
                'Menus' => route('app.menus.index'),
                isset($menu) ? 'Edit' : 'Create' => 'active',
            ]"
        >
            <div class="btn-list">
                <a href="{{ route('app.menus.index') }}" class="btn d-none d-md-inline-flex">
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
                          action="{{ isset($menu) ? route('app.menus.update', $menu) : route('app.menus.store') }}">
                        @csrf
                        @if(isset($menu))
                            @method('PUT')
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Menu Create</h3>
                            </div>

                            <div class="card-body border-bottom py-3">
                                <div class="mb-3">
                                    <label class="form-label">Menu name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ $menu->name ?? old('name') }}" name="name" placeholder="Role name">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Menu description</label>
                                    <textarea class="form-control @error('name') is-invalid @enderror" name="description" placeholder="Menu description">
                                        {{ $menu->description ?? old('description') }}
                                    </textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
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
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
