@extends('settings.layouts.default')

@section('settings-content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="mt-3 d-flex justify-content-end ">
            <button
                class="btn d-none d-md-inline-flex"
                onclick="event.preventDefault(); document.getElementById('new-backup-form').submit()"
            >
                <x-tabler icon="plus"/>
                Add New backup
            </button>
            <form id="new-backup-form" class="d-none" action="{{ route('settings.backups.store') }}" method="POST">
                @csrf
            </form>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>File name</th>
                                <th>File size</th>
                                <th>Created at</th>
                                <th width="200">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($backups as $key=>$backup)
                                <tr>
                                    <td>#{{ $key + 1 }}</td>
                                    <td><code>{{ $backup['file_name'] }}</code></td>
                                    <td>{{ $backup['file_size'] }}</td>
                                    <td>{{ $backup['last_modified'] }}</td>
                                    <td>
                                        <a href="{{ route('settings.backups.download', $backup['file_name']) }}"
                                           class="btn btn-sm btn-primary">Download</a>
                                        <button
                                            class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $key }}').submit();"
                                        >Delete
                                        </button>
                                        <form id="delete-form-{{ $key }}"
                                              action="{{ route('settings.backups.destroy',$backup['file_name']) }}"
                                              method="POST"
                                              style="display: none;">
                                            @csrf()
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
