@extends('settings.layouts.default')

@section('settings-content')
    <form action="{{ route('settings.sms.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="mb-4">Google Service</h2>
        </div>
        <div class="card-footer bg-transparent mt-auto">
            <div class="btn-list justify-content-end">
                <button type="submit" class="btn btn-primary">
                    Update Setting
                </button>
            </div>
        </div>
    </form>
@endsection
