@extends('settings.layouts.default')

@section('settings-content')
    <div class="container-xl">
        <div class="mt-3 d-flex justify-content-end">
            <a href="{{ route('settings.menus.create') }}" class="btn d-none d-md-inline-flex">
                <x-tabler icon="plus"/>
                Add New menu
            </a>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <livewire:settings.menus.menu-data-table/>
                </div>
            </div>
        </div>
    </div>
@endsection
