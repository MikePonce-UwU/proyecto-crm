@extends('layouts.adminlte', ['title' => 'Customers', 'breadcrumbs_title' => 'Customer list'])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">{{ __('Customer list') }}
                        @role('Admin')
                        <a href="#" data-toggle="modal" data-target="#customer-massCreate"
                        class="btn btn-sm btn-outline-primary float-right ml-1">{{ __('Add mass Clients') }}</a>
                        @endrole
                        @role('Admin|Team Supervisor|Team Collaborator|Independiente')
                            <a href="{{ route('admin.customers.create') }}"
                                class="btn btn-sm btn-primary float-right">{{ __('New') }}</a>
                        @endrole
                    </div>

                    <div class="card-body">
                        @if (session()->has('customer-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('customer-success') }}
                            </div>
                        @endif
                        <table class="table-sm table table-bordered table-striped text-center" id="customer-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team ID</th>
                                    <th>Contact name</th>
                                    <th>Contact phone number</th>
                                    <th>Contact address</th>
                                    <th>City</th>
                                    <th>County</th>
                                    <th>Status</th>
                                    <th>User</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                {{-- @dd($customer->user->first_name) --}}
                                    <tr key="{{ $customer->id }}">
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->team->name }}</td>
                                        <td>{{ $customer->first_name . ' ' . $customer->last_name[0] . '.' }}</td>
                                        <td>{{ $customer->phone_number }}</td>
                                        <td>{{ $customer->main_address }}</td>
                                        <td>{{ $customer->city }}</td>
                                        <td>{{ $customer->state }}</td>
                                        <td>
                                            <div
                                                class="badge @if ($customer->status == 'pending') badge-secondary @elseif($customer->status == 'cancelled') badge-danger @elseif ($customer->status == 'confirmed') badge-info @elseif ($customer->status == 'sold') badge-success @endif">
                                                {{ __($customer->status) }}</div>
                                        </td>
                                        <td>{{ $customer->user->first_name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" role="button"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <h6 class="dropdown-header">{{ __('Options') }}</h6>
                                                    {{-- <a href="{{ route('admin.customers.toggle-sold', $customer) }}"
                                                        class="dropdown-item bg-gradient-default"><i
                                                            class="fas fa-toggle-{{ $customer->sold ? 'on' : 'off' }} mr-4"></i>
                                                        Toggle sold field</a> --}}
                                                    @role('Admin|Team Supervisor|Team Collaborator|Independiente')
                                                        <a href="{{ route('admin.customers.edit', $customer) }}"
                                                            class="dropdown-item bg-gradient-warning"><i
                                                                class="fas fa-pen mr-4"></i> {{ __('Edit') }}</a>
                                                    @endrole
                                                    @role('Admin')
                                                        <form action="{{ route('admin.customers.destroy', $customer) }}"
                                                            class="d-hidden" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="dropdown-item bg-gradient-danger opacity-25"
                                                                onclick="confirm('Are you sure to do this?');"><i
                                                                    class="fas fa-trash mr-4"></i> {{ __('Delete') }}</button>
                                                        </form>
                                                    @endrole
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
    <div class="modal fade" id="customer-massCreate">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.customers.massCreate') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Add customers from an excel document</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- <p>One fine body&hellip;</p> --}}
                        @csrf
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="customers"
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#customer-table").DataTable({
                responsive: true
            });
        });
    </script>
@endpush
