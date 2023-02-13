@extends('account.layouts.default')

@section('account-content')
    <form action="{{ route('account.password.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="mb-4">Change Password</h2>
            <div class="row">
                <div class="col-12 col-md-6">
                    <x-form.input label="Current Password" name="current_password" type="password"
                                  placeholder="Enter your current password"/>
                    <x-form.input label="New Password" name="password" type="password"
                                  placeholder="Enter new password"/>
                    <x-form.input label="New password again" name="password_confirmation" type="password"
                                  placeholder="Enter new password again"/>
                </div>
            </div>
        </div>

        <div class="card-footer bg-transparent mt-auto">
            <div class="btn-list justify-content-end">
                <button type="submit" class="btn btn-primary">
                    Change Password
                </button>
            </div>
        </div>
    </form>
@endsection
