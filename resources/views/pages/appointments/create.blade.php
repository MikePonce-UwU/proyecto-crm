@extends('layouts.adminlte', ['breadcrumbs_title' => 'Create appointment', 'title' => 'Creating a appointment'])
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-success">
                    <div class="card-header">{{ __('Create a appointment') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.appointments.store') }}" method="post">
                            {{ csrf_field() }}
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">User - Client</legend>
                                {{-- client data --}}
                                <div class="col-md-6 col-12 mb-4 mb-sm-0">
                                    <div class="input-group">
                                        <select name="client_id" id="client" class="form-control"
                                            value="{{ old('client_id', '') }}">
                                            <option selected disabled>Select one of the options below</option>
                                            @foreach ($clients as $id => $client)
                                                <option value="{{ $id }}">{{ $client }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user-plus"></span>
                                            </div>
                                        </div>
                                        @error('contact_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- client data --}}
                                <div class="col-md-6 col-12 mb-4 mb-sm-0">
                                    <div class="input-group">
                                        <select name="user_id" id="user" class="form-control"
                                            value="{{ old('user_id', '') }}">
                                            <option selected disabled>Select one of the options below</option>
                                            @foreach ($users as $id => $user)
                                                <option value="{{ $id }}"
                                                    {{ auth()->id() === $id ? 'selected' : '' }}>{{ $user }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user-friends"></span>
                                            </div>
                                        </div>
                                        @error('contact_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">Appointment specifications</legend>
                                {{-- appointment-description --}}
                                <div class="col-md-6 col-12 mb-4 mb-sm-0">
                                    <div class="input-group">
                                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ old('description', '') }}" placeholder="Insert a description for the appointment"></textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-building"></span>
                                            </div>
                                        </div>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- appointment_date --}}
                                <div class="col-md-6 col-12 mb-4 mb-sm-0">
                                    <div class="input-group date" id="appointmentdatetime" data-target-input="nearest">
                                        <input type="text" name="appointment_date"
                                            value="{{ old('appointment_date', '') }}"
                                            class="form-control datetimepicker-input @error('appointment_date') is-invalid @enderror"
                                            data-target="#appointmentdatetime" />
                                        <div class="input-group-append" data-target="#appointmentdatetime"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        @error('appointment_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="input-group date" id="appointment-date" data-target-input="nearest">
                                        <input id="appointment_date" type="text"
                                            class="form-control datetimepicker-input @error('appointment_date') is-invalid @enderror"
                                            name="appointment_date" value="{{ old('appointment_date', '') }}"
                                            placeholder="Insert the appointment's date">
                                        <div class="input-group-append" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <span class="fas fa-calendar"></span>
                                            </div>
                                        </div>
                                        @error('appointment_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                </div>
                            </fieldset>
                            <div class="row justify-content-end gap-x-2">
                                <a href="{{ route('admin.clients.index') }}"
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
@push('scripts')
    <script>
        $('#appointmentdatetime').datetimepicker({
            format: "YYYY-MM-DD HH:mm:ss",
            icons: {
                time: 'far fa-clock'
            }
        });
    </script>
@endpush
