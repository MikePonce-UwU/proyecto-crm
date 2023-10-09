@extends('layouts.adminlte', ['title' => 'Clients', 'breadcrumbs_title' => 'Client list'])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">{{ __('Client list') }} <a href="{{ route('admin.clients.create') }}"
                            class="btn btn-sm btn-primary float-right">New</a></div>

                    <div class="card-body">
                        @if (session()->has('client-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('client-success') }}
                            </div>
                        @endif
                        <table class="table-sm table table-bordered table-striped text-center" id="client-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Contact name</th>
                                    <th>Contact E-mail</th>
                                    <th>Contact phone number</th>
                                    <th>Company name</th>
                                    <th>Company address</th>
                                    <th>Company phone number</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr key="{{ $client->id }}">
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->contact_name }}</td>
                                        <td>{{ $client->contact_email }}</td>
                                        <td>{{ $client->contact_phone_number }}</td>
                                        <td>{{ $client->company_name }}</td>
                                        <td>{{ $client->company_address }}</td>
                                        <td>{{ $client->company_phone_number }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <h6 class="dropdown-header">Options</h6>
                                                    <a href="{{ route('admin.clients.edit', $client) }}"
                                                        class="dropdown-item bg-gradient-warning"><i class="fas fa-pen mr-4"></i> Edit</a>
                                                    <form action="{{ route('admin.clients.destroy', $client) }}"
                                                        class="d-hidden" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="dropdown-item bg-gradient-danger opacity-25"
                                                            onclick="confirm('Are you sure to do this?');"><i
                                                                class="fas fa-trash mr-4"></i> Delete</button>
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
            $("#client-table").DataTable();
        });
    </script>
@endpush
