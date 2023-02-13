@extends('account.layouts.default')

@section('account-content')
    <form action="{{ route('account.email.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="mb-4">Change Email</h2>
            <div class="row">
                <div class="col-12 col-md-6">
                    <x-form.input label="Current Email" name="current_email" type="email"
                                  placeholder="Enter your current email"/>
                    <x-form.input label="New Email" name="email" type="email"
                                  placeholder="Enter new email"/>
                    <x-form.input label="New email again" name="email_confirmation" type="email"
                                  placeholder="Enter new email again"/>
                </div>
            </div>
        </div>

        <div class="card-footer bg-transparent mt-auto">
            <div class="btn-list justify-content-end">
                <button type="submit" class="btn btn-primary">
                    Change Email
                </button>
            </div>
        </div>
    </form>
@endsection
