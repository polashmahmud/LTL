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
                <a href="{{ route('app.roles.create') }}" class="btn d-none d-md-inline-flex">
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
                            <livewire:backend.role-data-table />
                        </div>
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table card-table table-vcenter text-nowrap datatable">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"--}}
{{--                                                           aria-label="Select all invoices"></th>--}}
{{--                                    <th class="w-1">#</th>--}}
{{--                                    <th>Name</th>--}}
{{--                                    <th>Permissions</th>--}}
{{--                                    <th>Created At</th>--}}
{{--                                    <th></th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($roles as $role)--}}
{{--                                    <tr>--}}
{{--                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"--}}
{{--                                                   aria-label="Select invoice"></td>--}}
{{--                                        <td><span class="text-muted">{{ $loop->iteration }}</span></td>--}}
{{--                                        <td>{{ $role->name }}</td>--}}
{{--                                        <td>--}}
{{--                                            @if($role->permissions->count() > 0)--}}
{{--                                                <span class="badge bg-green-lt">{{ $role->permissions->count() }}</span>--}}
{{--                                            @else--}}
{{--                                                <div class="text-muted text-red">No permission found!</div>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $role->created_at->diffForHumans() }}</td>--}}
{{--                                        <td class="text-end">--}}
{{--                                            <a href="{{ route('app.roles.edit', $role) }}" class="btn btn-primary btn-sm">--}}
{{--                                                <x-tabler icon="edit" />--}}
{{--                                                Edit--}}
{{--                                            </a>--}}
{{--                                            <a class="btn btn-danger btn-sm" href="#"--}}
{{--                                               onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('delete-role-{{$role->id}}').submit();">--}}
{{--                                                <x-tabler icon="trash" />--}}
{{--                                                Delete--}}
{{--                                            </a>--}}

{{--                                            <form id="delete-role-{{$role->id}}" action="{{ route('app.roles.destroy', $role->id) }}" method="POST" class="d-none">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                            </form>--}}

{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer d-flex align-items-center">--}}
{{--                            <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span>--}}
{{--                                entries</p>--}}
{{--                            <ul class="pagination m-0 ms-auto">--}}
{{--                                <li class="page-item disabled">--}}
{{--                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">--}}
{{--                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"--}}
{{--                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"--}}
{{--                                             stroke-linecap="round" stroke-linejoin="round">--}}
{{--                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>--}}
{{--                                            <polyline points="15 6 9 12 15 18"></polyline>--}}
{{--                                        </svg>--}}
{{--                                        prev--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                <li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#">--}}
{{--                                        next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"--}}
{{--                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"--}}
{{--                                             stroke-linecap="round" stroke-linejoin="round">--}}
{{--                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>--}}
{{--                                            <polyline points="9 6 15 12 9 18"></polyline>--}}
{{--                                        </svg>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
