@extends('layouts.adminlte', ['breadcrumbs_title' => 'Edit User', 'title' => 'Editing a user'])
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">{{ __('Edit a user') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user) }}" method="post">
                            {{ csrf_field() }}
                            @method('put')
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">User</legend>
                                {{-- Name --}}
                                <div class="input-group col-md-6 col-12">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $user->name) }}" autofocus placeholder="Insert your name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- Email --}}
                                <div class="input-group col-md-6 col-12">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', $user->email) }}" placeholder="Insert your e-mail">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </fieldset>
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">Password</legend>
                                {{-- Name --}}
                                <div class="input-group col-md-6 col-12">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Insert the password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- Email --}}
                                <div class="input-group col-md-6 col-12">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" placeholder="Insert the password again">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row justify-content-end gap-x-2">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-danger">Cancel</a>
                                <button class="btn btn-sm btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
