@extends('layouts.adminlte', ['title' => 'Teams', 'breadcrumbs_title' => 'Team list'])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">{{ __('Team list') }} <a href="{{ route('admin.teams.create') }}"
                            class="btn btn-sm btn-primary float-right">New</a></div>

                    <div class="card-body">
                        @if (session()->has('team-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('team-success') }}
                            </div>
                        @endif
                        <table class="table-sm table table-bordered table-striped text-center" id="team-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Users count</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr key="{{ $team->id }}">
                                        <td>{{ $team->id }}</td>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->users_count }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <h6 class="dropdown-header">Options</h6>
                                                    <a href="{{ route('admin.teams.edit', $team) }}"
                                                        class="dropdown-item bg-gradient-warning"><i class="fas fa-pen mr-4"></i> Edit</a>
                                                    {{-- <form action="{{ route('admin.teams.destroy', $team) }}"
                                                        class="d-hidden" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="dropdown-item bg-gradient-danger"
                                                            onclick="confirm('Are you sure to do this?');"><i
                                                                class="fas fa-trash mr-4"></i> Delete</button>
                                                    </form> --}}
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
            $("#team-table").DataTable({
                responsive: true
            });
        });
    </script>
@endpush
