@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <x-page-headers
            title="User"
            :breadcrumbs="[
                'Dashboard' => '#',
                'Users' => route('users.index'),
                isset($user) ? 'Edit' : 'Create' => 'active',
            ]"
        >
            <div class="btn-list">
                <a href="{{ route('users.index') }}" class="btn d-none d-md-inline-flex">
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
                          action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}">
                        @csrf
                        @if(isset($user))
                            @method('PUT')
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Create</h3>
                            </div>

                            <div class="card-body border-bottom py-3">
                                <div class="mb-3">
                                    <label class="form-label">Role name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ $user->name ?? old('name') }}" name="name" placeholder="Role name">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex">
                                    <button type="submit" class="btn d-none d-md-inline-flex ms-auto">
                                        <x-tabler icon="device-floppy"/>
                                        @isset($user)
                                            Update
                                        @else
                                            Save
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
