@extends('layouts.adminlte', ['title' => 'Appointments', 'breadcrumbs_title' => 'Appointment list'])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">{{ __('Appointment list') }} <a href="{{ route('admin.appointments.create') }}"
                            class="btn btn-sm btn-primary float-right">{{ __('New') }}</a></div>

                    <div class="card-body">
                        @if (session()->has('appointment-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('appointment-success') }}
                            </div>
                        @endif
                        <table class="table-sm table table-bordered table-striped text-center" id="appointment-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>User Name</th>
                                    <th>Description</th>
                                    <th>Appt date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr key="{{ $appointment->id }}">
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->customer->contact_name }}</td>
                                        <td>{{ $appointment->user->name }}</td>
                                        <td>{{ $appointment->description }}</td>
                                        <td>{{ $appointment->appointment_date }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" role="button"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <h6 class="dropdown-header">{{ __('Options') }}</h6>
                                                    <a href="{{ route('admin.appointments.edit', $appointment) }}"
                                                        class="dropdown-item bg-gradient-warning"><i
                                                            class="fas fa-pen mr-4"></i> {{ __('Edit') }}</a>
                                                    <form action="{{ route('admin.appointments.destroy', $appointment) }}"
                                                        class="d-hidden" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="dropdown-item bg-gradient-danger opacity-25"
                                                            onclick="confirm('Are you sure to do this?');"><i
                                                                class="fas fa-trash mr-4"></i> {{ __('Delete') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#appointment-table").DataTable({
                responsive: true
            });
        });
    </script>
@endpush
