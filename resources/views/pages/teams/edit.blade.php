@extends('layouts.adminlte', ['breadcrumbs_title' => 'Edit team', 'title' => 'Editing a team'])
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">{{ __('Edit a team') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.teams.update', $team) }}" method="post">
                            {{ csrf_field() }}
                            @method('put')
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">team</legend>
                                {{-- Name --}}
                                <div class="col-md-6 col-12  mb-4 mb-sm-0">
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $team->name) }}" autofocus placeholder="Insert your name">
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
                                </div>
                                {{-- manager_id --}}
                                <div class="col-md-4 col-12 mb-4">
                                    <div class="input-group">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        <select name="manager_id" id="manager_id" class="form-control"
                                            value="{{ old('manager_id', $team->manager_id) }}">
                                            <option disabled>Select one of the options below</option>
                                            @foreach ($users as $key => $user)
                                                <option value="{{ $key }}"
                                                    {{ $team->manager_id === $key ? 'selected' : '' }}>{{ $user }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        @error('manager_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <!-- Is this user associated to this tenant team -->
                                <div class="form-check col-md-6 col-12  mb-4 mb-sm-0">
                                    <input type="checkbox" name="associated" id="associated" class="form-check-input" {{ $associated ? 'checked' : '' }}>
                                    <label for="associated" class="form-check-label">Is this profile associated to this team?</label>
                                </div> --}}
                            </fieldset>
                            <fieldset class="row mb-3 border rounded py-4">
                                <legend class="pl-2">Users</legend>
                                <div class="col-12" id="repeater-container">
                                    @foreach ($team->users as $item)
                                        {{-- @dump($item->pivot->user_id)
                                    @dump($item->pivot->role) --}}
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-12  mb-4 mb-sm-0">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <button id="btnRemoveUser" type="button" class="btn btn-danger"><i
                                                                class="fas fa-times"></i></button>
                                                    </span>
                                                    <select name="user_id" id="user_id" class="form-control">
                                                        <option disabled>Select an option</option>
                                                        @foreach (App\Models\User::all()->pluck('name', 'id') as $key => $user)
                                                            <option value="{{ $key }}"
                                                                {{ $item->pivot->user_id == $key ? 'selected' : '' }}>
                                                                {{ $user }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12  mb-4 mb-sm-0">
                                                <div class="form-group">
                                                    <select name="role" id="role" class="form-control">
                                                        <option disabled>Select an option</option>
                                                        <option value="supervisor"
                                                            {{ $item->pivot->role == 'supervisor' ? 'selected' : '' }}>
                                                            Supervisor</option>
                                                        <option value="collaborator"
                                                            {{ $item->pivot->role == 'collaborator' ? 'selected' : '' }}>
                                                            Telemarketer</option>
                                                        <option value="independant"
                                                            {{ $item->pivot->role == 'independant' ? 'selected' : '' }}>
                                                            Independiente</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div id="repeater"></div>

                                </div>
                                <div class="col-12">
                                    <button type="button" id="btnAddUser" class="btn btn-sm btn-default"
                                        hx-get="/api/get-users" hx-trigger="click" hx-target="#repeater"
                                        hx-swap="beforeend">
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
        $(document).ready(function() {
            // var users = [];
            // axios.get()

            // console.log(users);
            listUser();
        });
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
                });
                // user_list[$(users[i]).val()] = {
                //     'role': $(roles[i]).val()
                // };
            }
            console.log(user_list);

            $("input#user_list").val(JSON.stringify(user_list));
        }
    </script>
@endpush
