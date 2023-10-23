@extends('layouts.adminlte', ['title' => 'Roles', 'breadcrumbs_title' => 'Role list'])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">{{ __('Role list') }}
                        @role('Admin')
                            <a href="{{ route('admin.roles.create') }}"
                                class="btn btn-sm btn-primary float-right">{{ __('New') }}</a>
                        @endrole
                    </div>

                    <div class="card-body">
                        @if (session()->has('role-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('role-success') }}
                            </div>
                        @endif
                        <table class="table-sm table table-bordered table-striped text-center" id="Role-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Users count</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr key="{{ $role->id }}">
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->users_count }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" role="button"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <h6 class="dropdown-header">{{ __('Options') }}</h6>
                                                    @role('Admin')
                                                        <a href="{{ route('admin.roles.edit', $role) }}"
                                                            class="dropdown-item bg-gradient-warning"><i
                                                                class="fas fa-pen mr-4"></i> {{ __('Edit') }}</a>
                                                        <form action="{{ route('admin.roles.destroy', $role) }}"
                                                            class="d-hidden" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item bg-gradient-danger"
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
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#role-table").DataTable({
                responsive: true
            });
        });
    </script>
@endpush
