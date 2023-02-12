@extends('layouts.backend.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <x-backend.page-headers
            title="Dashboard"
            :breadcrumbs="[
                'Dashboard' => '#',
                'Roles' => 'active',
            ]"
        >
            <div class="btn-list">
                <a href="{{ route('roles.create') }}" class="btn d-none d-md-inline-flex">
                    <x-tabler icon="plus" />
                    Add New Role
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
                            <h3 class="card-title">Roles</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <livewire:settings.role-data-table />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
