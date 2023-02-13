@extends('layouts.backend.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <x-page-headers
            title="Dashboard"
            :breadcrumbs="[
                'Dashboard' => '#',
                'Roles' => 'active',
            ]"
        >
            <div class="btn-list">
                <a href="{{ route('roles.index') }}" class="btn d-none d-md-inline-flex">
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
                          action="{{ isset($role) ? route('roles.update', $role) : route('roles.store') }}">
                        @csrf
                        @if(isset($role))
                            @method('PUT')
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manage roles</h3>
                            </div>

                            <div class="card-body border-bottom py-3">
                                <div class="mb-3">
                                    <label class="form-label">Role name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ $role->name ?? old('name') }}" name="name" placeholder="Role name">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="hr-text">
                                    <span>Manage permissions for role</span>
                                </div>
                                @error('permissions')
                                <div class="text-danger text-center mb-3">{{ $message }}</div>
                                @enderror

                                @forelse($modules->chunk(2) as $key => $chunks)
                                    <div class="row row-deck">
                                        @foreach($chunks as $k => $module)
                                            <div class="col-md-6 mb-3">
                                                <div class="card">
                                                    <div class="card-status-top bg-primary @error('permissions') bg-danger @enderror"></div>
                                                    <div class="card-body">
                                                        <h3 class="card-title"><input name="checked"
                                                                                      class="form-check-input"
                                                                                      type="checkbox"> {{ $module->name }}
                                                        </h3>
                                                        <div class="hr text-primary"></div>
                                                        @foreach($module->permissions as $permission)
                                                            <label class="form-check">
                                                                <input name="permissions[]"
                                                                       value="{{ $permission->id }}"
                                                                       class="form-check-input"
                                                                       type="checkbox"
                                                                        @if(isset($role) && $role->hasPermissionTo($permission->slug)) checked @endif
                                                                >
                                                                <span
                                                                    class="form-check-label">{{ $permission->name }}</span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @empty
                                    <div class="empty">
                                        <div class="empty-img"><img
                                                src="{{ asset('/backend/static/illustrations/undraw_quitting_time_dm8t.svg') }}"
                                                height="128" alt="">
                                        </div>
                                        <p class="empty-title">No modules found!</p>
                                        <p class="empty-subtitle text-muted">
                                            Please add some modules to manage permissions.
                                        </p>
                                        <div class="empty-action">
                                            <a href="#" class="btn btn-primary">
                                                <x-tabler icon="plus"/>
                                                Add Module
                                            </a>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <div class="card-footer">
                                <div class="d-flex">
                                    <button type="submit" class="btn d-none d-md-inline-flex ms-auto">
                                        <x-tabler icon="device-floppy"/>
                                        @isset($role)
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
