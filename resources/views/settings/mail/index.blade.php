@extends('settings.layouts.default')

@section('settings-content')
    <form action="{{ route('settings.mail.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="mb-4">Mail Setting</h2>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Mail Mailer <code>setting('mail_mailer')</code></span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'mail_mailer\')' }"
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
                        <input type="text" value="{{ old('mail_mailer', setting('mail_mailer')) }}"
                               class="form-control @error('mail_mailer') is-invalid @enderror" name="mail_mailer"
                               placeholder="ex: smtp">
                        @error('mail_mailer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Mail Port <code>setting('mail_port')</code></span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'mail_port\')' }"
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
                        <input type="text" class="form-control @error('mail_port') is-invalid @enderror"
                               value="{{ old('mail_port', setting('mail_port')) }}" name="mail_port"
                               placeholder="ex: 2525">
                        @error('mail_port')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Mail Password <code>setting('mail_password')</code></span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'mail_password\')' }"
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
                        <input type="text" class="form-control @error('mail_password') is-invalid @enderror"
                               value="{{ old('mail_password', setting('mail_password')) }}" name="mail_password"
                               placeholder="ex: mail.password">
                        @error('mail_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Mail From Address <code>setting('mail_from_address')</code></span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'mail_from_address\')' }"
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
                        <input type="text" class="form-control @error('mail_from_address') is-invalid @enderror"
                               value="{{ old('mail_from_address', setting('mail_from_address')) }}"
                               name="mail_from_address" placeholder="ex: form@example.com">
                        @error('mail_from_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Mail Host <code>setting('mail_host')</code></span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'mail_host\')' }"
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
                        <input type="text" class="form-control @error('mail_host') is-invalid @enderror"
                               value="{{ old('mail_host', setting('mail_host')) }}" name="mail_host"
                               placeholder="ex: smtp.mailtrap.oi">
                        @error('mail_host')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Mail Username <code>setting('mail_username')</code></span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'mail_username\')' }"
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
                        <input type="text" class="form-control @error('mail_username') is-invalid @enderror"
                               value="{{ old('mail_username', setting('mail_username')) }}" name="mail_username"
                               placeholder="ex: mail.username">
                        @error('mail_username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Mail Encryption <code>setting('mail_encryption')</code></span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'mail_encryption\')' }"
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
                        <input type="text" class="form-control @error('mail_encryption') is-invalid @enderror"
                               value="{{ old('mail_encryption', setting('mail_encryption')) }}" name="mail_encryption"
                               placeholder="ex: tls">
                        @error('mail_encryption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Mail From Name <code>setting('mail_from_name')</code></span>
                            <div
                                class="cursor-pointer"
                                x-data="{ copied: false, copyText: 'setting(\'mail_from_name\')' }"
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
                        <input type="text" class="form-control @error('mail_from_name') is-invalid @enderror"
                               value="{{ old('mail_from_name', setting('mail_from_name')) }}" name="mail_from_name"
                               placeholder="ex: Company Name">
                        @error('mail_from_name')
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

