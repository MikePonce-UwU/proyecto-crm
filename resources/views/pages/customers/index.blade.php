@extends('layouts.adminlte', ['title' => 'Customers', 'breadcrumbs_title' => 'Customer list'])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">{{ __('Customer list') }} <a href="{{ route('admin.customers.create') }}"
                            class="btn btn-sm btn-primary float-right">{{ __('New') }}</a></div>

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
                                    <th>Contact name</th>
                                    <th>Contact E-mail</th>
                                    <th>Contact phone number</th>
                                    <th>Contact address</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr key="{{ $customer->id }}">
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->contact_name }}</td>
                                        <td>{{ $customer->contact_email }}</td>
                                        <td>{{ $customer->contact_phone_number }}</td>
                                        <td>{{ $customer->contact_address }}</td>
                                        <td>
                                            <div
                                                class="badge @if ($customer->status == 'pending') badge-secondary @elseif($customer->status == 'cancelled') badge-danger @elseif ($customer->status == 'confirmed') badge-info @elseif ($customer->status == 'sold') badge-success @endif">
                                                {{ __($customer->status) }}</div>
                                        </td>
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
                                                    <a href="{{ route('admin.customers.edit', $customer) }}"
                                                        class="dropdown-item bg-gradient-warning"><i
                                                            class="fas fa-pen mr-4"></i> {{ __('Edit') }}</a>
                                                    <form action="{{ route('admin.customers.destroy', $customer) }}"
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
            $("#customer-table").DataTable({
                responsive: true
            });
        });
    </script>
@endpush
