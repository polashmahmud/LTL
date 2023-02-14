@extends('layouts.backend.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <x-page-headers
            title="Settings Management"
            :breadcrumbs="[
                'Dashboard' => '#',
                'Settings' => 'active',
            ]"
        >
            <div class="btn-list">
            </div>
        </x-page-headers>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-3 d-none d-md-block border-end">
                                @include('settings.layouts.partials._navigation')
                            </div>
                            <div class="col d-flex flex-column">
                                @yield('settings-content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
