@extends('layouts.adminlte', ['breadcrumbs_title' => 'Create customer', 'title' => 'Creating a customer'])
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-success">
                    <div class="card-header">{{ __('Create a customer') }}</div>
                    <div class="card-body">
                        {{-- @dd(\App\Enums\StatusEnum::cases()) --}}
                        <form action="{{ route('admin.customers.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @if ($errors)
                                @foreach ($errors->all() as $item)
                                    {{ $item }}
                                @endforeach
                            @endif
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">{{ __('Customer') }}</legend>
                                {{-- first_name --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>First name</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="first_name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                            value="{{ old('first_name', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- last_name --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Last name</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="last_name" type="text"
                                            class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                            value="{{ old('last_name', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- main_address --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Main address</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="main_address" type="text"
                                            class="form-control @error('main_address') is-invalid @enderror"
                                            name="main_address" value="{{ old('main_address', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('main_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- secondary_address --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Secondary address</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="secondary_address" type="text"
                                            class="form-control @error('secondary_address') is-invalid @enderror"
                                            name="secondary_address" value="{{ old('secondary_address', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('secondary_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- city --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>City</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="city" type="text"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                            value="{{ old('city', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- state --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>State</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="state" type="text"
                                            class="form-control @error('state') is-invalid @enderror" name="state"
                                            value="{{ old('state', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- zip_code --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Zip code</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="zip_code" type="text"
                                            class="form-control @error('zip_code') is-invalid @enderror" name="zip_code"
                                            value="{{ old('zip_code', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- county --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>County</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="county" type="text"
                                            class="form-control @error('county') is-invalid @enderror" name="county"
                                            value="{{ old('county', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('county')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- phone_number --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Phone number</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="phone_number" type="text"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number" value="{{ old('phone_number', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- owner_renter --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Owner/renter</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="owner_renter" type="text"
                                            class="form-control @error('owner_renter') is-invalid @enderror"
                                            name="owner_renter" value="{{ old('owner_renter', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('owner_renter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- credit_rating --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Credit rating</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="credit_rating" type="text"
                                            class="form-control @error('credit_rating') is-invalid @enderror"
                                            name="credit_rating" value="{{ old('credit_rating', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('credit_rating')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- home_value --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Home value</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="home_value" type="text"
                                            class="form-control @error('home_value') is-invalid @enderror"
                                            name="home_value" value="{{ old('home_value', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('home_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- income --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>HouseHold income</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="income" type="text"
                                            class="form-control @error('income') is-invalid @enderror" name="income"
                                            value="{{ old('income', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('income')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- age --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Age</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="age" type="text"
                                            class="form-control @error('age') is-invalid @enderror" name="age"
                                            value="{{ old('age', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- birth_month --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Birth month</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="birth_month" type="text"
                                            class="form-control @error('birth_month') is-invalid @enderror"
                                            name="birth_month" value="{{ old('birth_month', '') }}" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('birth_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- foto --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Bill photo</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <div class="custom-file">
                                            <input id="foto" type="file" accept="image/*"
                                                class="custom-file-input @error('foto') is-invalid @enderror"
                                                name="foto" value="{{ old('foto', '') }}" autofocus>
                                            <label class="custom-file-label" for="foto">Subir factura</label>
                                        </div>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- status --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>Status</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <select name="status" id="status" class="form-control"
                                            value="{{ old('status', '') }}">
                                            <option selected disabled>Select one of the options below</option>
                                            @foreach (\App\Enums\StatusEnum::cases() as $status)
                                                <option value="{{ $status->value }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-info"></span>
                                            </div>
                                        </div>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- user_id --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <label>User</label>
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <select name="user_id" id="user_id" class="form-control"
                                            value="{{ old('user_id', '') }}"
                                            {{ !auth()->user()->hasRole('Admin')? 'readonly': '' }}>
                                            <option selected disabled>Select one of the options below</option>
                                            @foreach ($users as $key => $user)
                                                <option value="{{ $key }}"
                                                    {{ auth()->id() === $key ? 'selected' : '' }}>{{ $user }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row justify-content-end gap-x-2">
                                <a href="{{ route('admin.customers.index') }}"
                                    class="btn btn-sm btn-outline-danger">Cancel</a>
                                <button class="btn btn-sm btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
