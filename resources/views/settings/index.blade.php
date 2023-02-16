@extends('settings.layouts.default')

@section('title', 'General Setting')

@section('settings-content')
    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h2 class="mb-4">General Setting</h2>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>
                                App name
                                <code>setting('app_name')</code>
                            </span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'app_name\')' }"
                                x-on:click="
                                    navigator.clipboard.writeText(copyText);
                                    copied = true;
                                    setTimeout(() => { copied = false }, 1000);
                                "
                            >
                                <x-tabler x-show="!copied" icon="copy"/>
                                <x-tabler x-show="copied" icon="clipboard-check"/>
                            </div>
                        </label>
                        <input type="text" value="{{ old('app_name', setting('app_name')) }}" class="form-control @error('app_name') is-invalid @enderror" name="app_name" placeholder="ex: App Name">
                        @error('app_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>
                                Use
                                <code>setting('app_use_logo_or_name')</code>
                            </span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'app_use_logo_or_name\')' }"
                                x-on:click="
                                    navigator.clipboard.writeText(copyText);
                                    copied = true;
                                    setTimeout(() => { copied = false }, 1000);
                                "
                            >
                                <x-tabler x-show="!copied" icon="copy"/>
                                <x-tabler x-show="copied" icon="clipboard-check"/>
                            </div>
                        </label>
                        <div>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                       name="app_use_logo_or_name" value="logo" checked>
                                <span class="form-check-label">App Logo</span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                       name="app_use_logo_or_name" value="name"
                                    {{ setting('app_use_logo_or_name') == 'name' ? 'checked' : '' }}>
                                <span class="form-check-label">App Name</span>
                            </label>
                        </div>
                        @error('app_use_logo_or_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>
                                App Logo <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Max Width: 300px, Max Height: 90px</p>">?</span>
                                <code>setting('app_logo')</code>
                            </span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'app_logo\')' }"
                                x-on:click="
                                    navigator.clipboard.writeText(copyText);
                                    copied = true;
                                    setTimeout(() => { copied = false }, 1000);
                                "
                            >
                                <x-tabler x-show="!copied" icon="copy"/>
                                <x-tabler x-show="copied" icon="clipboard-check"/>
                            </div>
                        </label>
                        <input type="file" class="form-control @error('app_logo') is-invalid @enderror" name="app_logo">
                        @error('app_logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @if(setting('app_logo'))
                            <img class="mt-3" src="{{ setting('app_logo') }}" style="max-height: 100px; width: auto" alt="logo">
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>App description <code>setting('app_description')</code></span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'app_description\')' }"
                                x-on:click="
                                    navigator.clipboard.writeText(copyText);
                                    copied = true;
                                    setTimeout(() => { copied = false }, 1000);
                                "
                            >
                                <x-tabler x-show="!copied" icon="copy"/>
                                <x-tabler x-show="copied" icon="clipboard-check"/>
                            </div>
                        </label>
                        <input type="text" value="{{ old('app_description', setting('app_description')) }}" class="form-control @error('app_description') is-invalid @enderror" name="app_description" placeholder="ex: App Description">
                        @error('app_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>
                                Layout
                                <code>setting('layout')</code>
                            </span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'layout\')' }"
                                x-on:click="
                                    navigator.clipboard.writeText(copyText);
                                    copied = true;
                                    setTimeout(() => { copied = false }, 1000);
                                "
                            >
                                <x-tabler x-show="!copied" icon="copy"/>
                                <x-tabler x-show="copied" icon="clipboard-check"/>
                            </div>
                        </label>
                        <div>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                       name="layout" value=""  checked>
                                <span class="form-check-label">Default</span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                       name="layout" value="layout-boxed"
                                    {{ setting('layout') == 'layout-boxed' ? 'checked' : '' }}
                                >
                                <span class="form-check-label">Boxed</span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                       name="layout" value="layout-fluid"
                                    {{ setting('layout') == 'layout-fluid' ? 'checked' : '' }}
                                >
                                <span class="form-check-label">Fluid</span>
                            </label>
                        </div>
                        @error('layout')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>App favicon <code>setting('app_favicon')</code></span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'app_favicon\')' }"
                                x-on:click="
                                    navigator.clipboard.writeText(copyText);
                                    copied = true;
                                    setTimeout(() => { copied = false }, 1000);
                                "
                            >
                                <x-tabler x-show="!copied" icon="copy"/>
                                <x-tabler x-show="copied" icon="clipboard-check"/>
                            </div>
                        </label>
                        <input type="file" class="form-control @error('app_favicon') is-invalid @enderror" name="app_favicon">
                        @error('app_favicon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @if(setting('app_favicon'))
                            <img class="mt-3" src="{{ setting('app_favicon') }}" style="max-height: 100px; width: auto" alt="favicon">
                        @endif
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


