@extends('layouts.adminlte', ['breadcrumbs_title' => 'Edit customer', 'title' => 'Editing a customer'])
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-success">
                    <div class="card-header">{{ __('Edit a customer') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.customers.update', $customer) }}" method="post">
                            {{ csrf_field() }}
                            @method('put')
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">Customer</legend>
                                {{-- contact_name --}}
                                <div class="input-group col-md-4 col-12 mb-4">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="contact_name" type="text"
                                        class="form-control @error('contact_name') is-invalid @enderror" name="contact_name"
                                        value="{{ old('contact_name', $customer->contact_name) }}" autofocus
                                        placeholder="Insert your contact name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('contact_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- contact_email --}}
                                <div class="input-group col-md-4 col-12 mb-4">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="contact_email" type="email"
                                        class="form-control @error('contact_email') is-invalid @enderror"
                                        name="contact_email" value="{{ old('contact_email', $customer->contact_email) }}"
                                        autofocus placeholder="Insert your contact email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('contact_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- contact_phone_number --}}
                                <div class="input-group col-md-4 col-12 mb-4">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="contact_phone_number" type="text"
                                        class="form-control @error('contact_phone_number') is-invalid @enderror"
                                        name="contact_phone_number"
                                        value="{{ old('contact_phone_number', $customer->contact_phone_number) }}" autofocus
                                        placeholder="Insert your contact phone number">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                    @error('contact_phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- contact_address --}}
                                <div class="col-md-6 col-12 mb-4">
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="contact_address" type="text"
                                            class="form-control @error('contact_address') is-invalid @enderror"
                                            name="contact_address"
                                            value="{{ old('contact_address', $customer->contact_address) }}"
                                            placeholder="Insert your contact phone number">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-map-marker-alt"></span>
                                            </div>
                                        </div>
                                        @error('contact_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- status --}}
                                <div class="col-md-6 col-12 mb-4">
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <select name="status" id="status" class="form-control"
                                            value="{{ old('status', $customer->status) }}">
                                            <option disabled>Select one of the options below</option>
                                            @foreach (\App\Enums\StatusEnum::cases() as $status)
                                                <option value="{{ $status->value }}"
                                                    {{ $customer->status == $status->value ? 'selected' : '' }}>
                                                    {{ $status->name }}</option>
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
