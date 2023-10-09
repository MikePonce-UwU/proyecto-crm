@extends('layouts.adminlte', ['breadcrumbs_title' => 'Edit client', 'title' => 'Editing a client'])
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-success">
                    <div class="card-header">{{ __('Edit a client') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.clients.update', $client) }}" method="post">
                            {{ csrf_field() }}
                            @method('put')
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">Client</legend>
                                {{-- contact_name --}}
                                <div class="input-group col-md-4 col-12">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="contact_name" type="text"
                                        class="form-control @error('contact_name') is-invalid @enderror" name="contact_name"
                                        value="{{ old('contact_name', $client->contact_name) }}" autofocus
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
                                <div class="input-group col-md-4 col-12">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="contact_email" type="email"
                                        class="form-control @error('contact_email') is-invalid @enderror" name="contact_email"
                                        value="{{ old('contact_email', $client->contact_email) }}" autofocus
                                        placeholder="Insert your contact email">
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
                                <div class="input-group col-md-4 col-12">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="contact_phone_number" type="text"
                                        class="form-control @error('contact_phone_number') is-invalid @enderror" name="contact_phone_number"
                                        value="{{ old('contact_phone_number', $client->contact_phone_number) }}" autofocus
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
                            </fieldset>
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">Company</legend>
                                {{-- company_name --}}
                                <div class="input-group col-md-4 col-12">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="company_name" type="text"
                                        class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                                        value="{{ old('company_name', $client->company_name) }}" autofocus
                                        placeholder="Insert your company name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-building"></span>
                                        </div>
                                    </div>
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- company_address --}}
                                <div class="input-group col-md-4 col-12">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="company_address" type="text"
                                        class="form-control @error('company_address') is-invalid @enderror" name="company_address"
                                        value="{{ old('company_address', $client->company_address) }}" autofocus
                                        placeholder="Insert your company address">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-map-marker-alt"></span>
                                        </div>
                                    </div>
                                    @error('company_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- company_phone_number --}}
                                <div class="input-group col-md-4 col-12">
                                    {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                    <input id="company_phone_number" type="text"
                                        class="form-control @error('company_phone_number') is-invalid @enderror" name="company_phone_number"
                                        value="{{ old('company_phone_number', $client->company_phone_number) }}" autofocus
                                        placeholder="Insert your company phone number">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                    @error('company_phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </fieldset>
                            <div class="row justify-content-end gap-x-2">
                                <a href="{{ route('admin.clients.index') }}" class="btn btn-sm btn-outline-danger">Cancel</a>
                                <button class="btn btn-sm btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
