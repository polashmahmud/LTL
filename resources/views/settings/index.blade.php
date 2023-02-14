@extends('settings.layouts.default')

@section('settings-content')
    <form action="{{ route('settings.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="mb-4">General Setting</h2>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>App name <code>setting('app_name')</code></span>
                            <span class="cursor-pointer"><x-tabler icon="copy" /></span>
                        </label>
                        <input type="text" value="{{ old('app_name', setting('app_name')) }}" class="form-control @error('app_name') is-invalid @enderror" name="app_name" placeholder="ex: App Name">
                        @error('app_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>App description <code>setting('app_description')</code></span>
                            <span class="cursor-pointer"><x-tabler icon="copy" /></span>
                        </label>
                        <input type="text" value="{{ old('app_description', setting('app_description')) }}" class="form-control @error('app_description') is-invalid @enderror" name="app_description" placeholder="ex: App Description">
                        @error('app_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
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


