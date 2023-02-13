@extends('layouts.backend.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <x-page-headers
            title="Account Settings"
            :breadcrumbs="[
                'Dashboard' => '#',
                'Accounts' => 'active',
            ]"
        >
        </x-page-headers>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-3 d-none d-md-block border-end">
                                <div class="card-body">
                                    <h4 class="subheader">Personal Settings</h4>
                                    <div class="list-group list-group-transparent">
                                        <a href="./settings.html" class="list-group-item list-group-item-action d-flex align-items-center active">My Account</a>
                                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">My Notifications</a>
                                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Connected Apps</a>
                                        <a href="./settings-plan.html" class="list-group-item list-group-item-action d-flex align-items-center">Plans</a>
                                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Billing &amp; Invoices</a>
                                    </div>
                                    <h4 class="subheader mt-4">Experience</h4>
                                    <div class="list-group list-group-transparent">
                                        <a href="#" class="list-group-item list-group-item-action">Give Feedback</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex flex-column">
                                @yield('account-content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

