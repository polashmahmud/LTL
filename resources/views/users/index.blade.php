@extends('layouts.backend.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <x-backend.page-headers
            title="Dashboard"
            :breadcrumbs="[
                'Dashboard' => '#',
                'Users' => 'active',
            ]"
        >
            <div class="btn-list">
                <a href="{{ route('users.create') }}" class="btn d-none d-md-inline-flex">
                    <x-tabler icon="plus" />
                    Add New user
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
                            <h3 class="card-title">Users</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <livewire:users.user-data-table />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
