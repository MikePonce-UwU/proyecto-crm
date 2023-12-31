@extends('layouts.adminlte', ['title' => 'Users', 'breadcrumbs_title' => 'User list'])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">{{ __('User list') }}
                        @role('Admin')
                            <a href="{{ route('admin.users.create') }}"
                                class="btn btn-sm btn-primary float-right">{{ __('New') }}</a>
                        @endrole
                    </div>

                    <div class="card-body">
                        @if (session()->has('user-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('user-success') }}
                            </div>
                        @endif
                        <table class="table-sm table table-bordered table-striped text-center" id="user-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Is admin</th>
                                    <th>Verified at</th>
                                    <th>Joined at</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    {{-- @dump($user->currentGlobalRole) --}}
                                    {{-- @dd($user->teams()->firstWhere('team_id', '=', $user->current_team_id)->pivot->role) --}}
                                    <tr key="{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{-- @dd ($user->getRoleNames()) --}}
                                            @if ($user->getRoleNames() != null)
                                                @foreach ($user->getRoleNames() as $key => $role)
                                                    <div class="badge badge-sm badge-info">{{ $role }}</div>
                                                @endforeach
                                            @else
                                                {{ Str::of('<i>sin rol</i>')->toHtmlString() }}
                                            @endif
                                            {{-- {{ $user->currentGlobalRole ? Str::of($user->currentGlobalRole)->title() :  }} --}}
                                        </td>
                                        <td>
                                            {{ $user->is_admin
                                                ? Str::of('<i class="fas fa-check-circle text-success"></i>')->toHtmlString()
                                                : Str::of('<i class="fas fa-times-circle text-danger"></i>')->toHtmlString() }}
                                        </td>
                                        <td>
                                            {{ $user->email_verified_at ? Str::of('&check;')->toHtmlString() : Str::of('&times;')->toHtmlString() }}
                                        </td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>
                                            {{ $user->deleted_at ? Str::of('<i class="fas fa-times text-danger"></i>')->toHtmlString() : Str::of('<i class="fas fa-check text-success"></>')->toHtmlString() }}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" role="button"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <h6 class="dropdown-header">{{ __('Options') }}</h6>
                                                    @role('Admin')
                                                        <a href="{{ route('admin.users.edit', $user) }}"
                                                            class="dropdown-item bg-gradient-warning"><i
                                                                class="fas fa-pen mr-4"></i> {{ __('Edit') }}</a>
                                                        <form action="{{ route('admin.users.destroy', $user) }}"
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
            $("#user-table").DataTable({
                responsive: true
            });
        });
    </script>
@endpush
