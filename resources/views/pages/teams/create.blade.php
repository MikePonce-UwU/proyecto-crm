@extends('layouts.adminlte', ['breadcrumbs_title' => 'Create team', 'title' => 'Creating a team'])
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-success">
                    <div class="card-header">{{ __('Create a team') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.teams.store') }}" method="post" id="form">
                            {{ csrf_field() }}
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">Team details</legend>
                                {{-- Name --}}
                                <div class="input-group col-md-6 col-12 mb-4 mb-sm-0">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', '') }}" autofocus placeholder="Insert your name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-users-cog"></span>
                                        </div>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <!-- Is this user associated to this tenant team -->
                                <div class="form-check col-md-6 col-12 mb-4 mb-sm-0">
                                    <input type="checkbox" name="associated" id="associated" class="form-check-input">
                                    <label for="associated" class="form-check-label">Is this profile associated to this team?</label>
                                </div> --}}
                            </fieldset>
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">Users</legend>
                                <div class="col-12 mb-4 mb-sm-0" id="repeater-container">
                                    <div id="repeater"></div>
                                </div>
                                <div class="col-12 mb-4 mb-sm-0">
                                    <button type="button" id="btnAddUser" class="btn btn-sm btn-default"
                                        hx-get="/api/get-users" hx-trigger="click" hx-target="#repeater" hx-swap="beforeend">
                                        Add user
                                    </button>
                                </div>
                                <input type="hidden" name="user_list" id="user_list">
                            </fieldset>
                            <div class="row justify-content-end gap-x-2">
                                <a href="{{ route('admin.teams.index') }}" class="btn btn-sm btn-outline-danger">Cancel</a>
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
    <script src="https://unpkg.com/htmx.org@1.9.6"
        integrity="sha384-FhXw7b6AlE/jyjlZH5iHa/tTe9EpJ1Y55RjcgPbjeWMskSxZt1v9qkxLJWNJaGni" crossorigin="anonymous">
    </script>
    <script>
        $("#repeater-container").on('click', 'button#btnRemoveUser', function() {
            console.log('Entré al repetidor');
            $(this).parent().parent().parent().parent().remove();
            listUser();
        });
        // $("#repeater-container").on('change', 'select#user_id', function() {
        //     console.log('Entré al user_id');
        //     listUser();
        // });
        $("#repeater-container").on('change', 'select#role', function() {
            console.log('Entré al user_id');
            listUser();
        });
        $("form#form").on('click', 'button#btnAddUser', function() {
            console.log('Add user');
            listUser();
        });

        const listUser = () => {
            console.log('Entré a la función \'Listar usuarios()\'')

            var user_list = [];

            var users = $("select#user_id");
            // console.log(users);
            var roles = $("select#role");
            // console.log(roles);

            for (var i = 0; i < users.length; i++) {

                user_list.push({
                    "user_id": $(users[i]).val(),
                    "role": $(roles[i]).val(),
                })
            }
            console.log(user_list);

            $("input#user_list").val(JSON.stringify(user_list));
        }
    </script>
@endpush
