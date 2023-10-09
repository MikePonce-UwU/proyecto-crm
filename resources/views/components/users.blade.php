<div class="row mb-3">
    <div class="col-md-6 col-12 mb-4 mb-sm-0">
        <div class="input-group">
            <span class="input-group-prepend">
                <button id="btnRemoveUser" type="button" class="btn btn-danger"><i
                        class="fas fa-times"></i></button>
            </span>
            <select name="user_id" id="user_id" class="form-control">
                <option selected disabled>Select an option</option>
                @foreach ($users as $key => $user)
                    <option value="{{ $key }}">
                        {{ $user }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6 col-12 mb-4 mb-sm-0">
        <div class="form-group">
            <select name="role" id="role" class="form-control">
                <option selected disabled>Select an option</option>
                <option value="supervisor">Supervisor</option>
                <option value="collaborator">Collaborator</option>
            </select>
        </div>
    </div>
</div>
