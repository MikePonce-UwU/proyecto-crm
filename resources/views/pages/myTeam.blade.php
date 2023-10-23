@extends('layouts.adminlte', ['title' => 'My team', 'breadcrumbs_title' => 'My team'])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="card card-outline card-primary">
                    <div class="card-header">{{ __('Team specs') }}
                        {{-- <a href="{{ route('admin.teams.create') }}"
                            class="btn btn-sm btn-primary float-right">New</a> --}}
                    </div>

                    <div class="card-body">
                        @if (session()->has('team-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('team-success') }}
                            </div>
                        @endif
                        @php
                            $myTeam = auth()->user()->myTeam;
                        @endphp
                        {{-- @dump(
                            $myTeam->users->map(function ($user) {
                                return $user->loadCount('myAppts')->my_appts_count;
                            })
                        ) --}}
                        <div class="row mb-3">
                            <h1 class="card-title">{{ $myTeam->name }}</h1>

                        </div>
                        <table class="table-sm table table-bordered table-striped text-center" id="myTeam-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Appts count</th>
                                    <th>Customer count</th>
                                    {{-- <th></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $telesalemen = $myTeam->users->load('myAppts', 'MyCustomers');
                                @endphp
                                {{-- @dd($myTeam->userAppts) --}}
                                @foreach ($telesalemen as $item)
                                    {{-- @dump(
                                        $item->myCustomers()->where('user_id', $item->id)->where('team_id', $item->current_team_id)->count()
                                    ) --}}
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->myAppts()->where('user_id', $item->id)->where('team_id', $item->current_team_id)->count() }}
                                        </td>
                                        <td>{{ $item->myCustomers()->where('user_id', $item->id)->where('team_id', $item->current_team_id)->count() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-outline card-secondary">
                    <div class="card-header">Gráfico de pastel</div>
                    <div class="card-body">
                        <canvas id="pieChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- Page specific script -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        $(function() {
            $("#myTeam-table").DataTable({
                responsive: true
            });
        });

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var users = <?= $myTeam->users->map(fn($user) => $user->name) ?>;
        // var dataset = 
        var data = <?= $myTeam->users->map(fn ($user) => $user->loadCount('myAppts')->my_appts_count) ?>;
        var pieData = {
            labels: users,
            datasets: [{
                data: data,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        };
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })
    </script>
@endpush
