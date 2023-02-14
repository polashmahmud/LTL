@extends('settings.layouts.default')

@section('settings-content')
    <div class="card-body">
        <h2 class="mb-4">General Setting</h2>
        <div class="row">

        </div>
    </div>
    <div class="card-footer bg-transparent mt-auto">
        <div class="btn-list justify-content-end">
            <button type="submit" class="btn btn-primary">
                Update Setting
            </button>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Dropzone("#dropzone-default")
        })
    </script>
@endpush
