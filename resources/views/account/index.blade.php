@extends('account.layouts.default')

@section('account-content')
    <form action="{{ route('account.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h2 class="mb-4">My Account</h2>
            <h3 class="card-title">Profile Avatar</h3>
            <div class="row align-items-center">
                <div class="col-auto">
                    <x-avatar size="avatar-xl" />
                </div>
                <div class="col-auto">
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="col-auto">
                    <button class="btn btn-ghost-danger" id="deleteAvatarButton">
                        Delete avatar
                    </button>
                </div>
            </div>
            <h3 class="card-title mt-4">Profile Details</h3>
            <div class="row g-3">
                <div class="col-md-6 col-12">
                    <div class="form-label">Name</div>
                    <input type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}">
                </div>
            </div>
        </div>

        <div class="card-footer bg-transparent mt-auto">
            <div class="btn-list justify-content-end">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </form>
@endsection


@push('scripts')
    <script>
        document.getElementById('deleteAvatarButton').addEventListener('click', function (event) {
            event.preventDefault();

            if (confirm('Are you sure you want to delete your avatar?')) {
                axios.delete('{{ route('account.destroy') }}')
                    .then(function (response) {
                        window.location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        });
    </script>
@endpush
