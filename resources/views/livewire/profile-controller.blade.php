<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card card-outline card-primary">
                {{-- In work, do what you enjoy. --}}
                @if (session()->has('profile-success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('profile-success') }}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form wire:submit.prevent="updateProfileData" method="POST">
                    <div class="card-body">
                        @csrf
                        {{-- @dd($name, $email) --}}
                        <div class="row mb-0 mb-sm-3">
                            <div class="col-12 col-md-6 col-lg-5">
                                <label>Nombre Completo</label>
                                <div class="input-group">
                                    <input type="text" name="name" id="name" wire:model="name"
                                        class="form-control @error('name') is-invalid @enderror">
                                    <span class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </span>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5">
                                <label>Correo Electrónico</label>
                                <div class="input-group">
                                    <input type="email" name="email" id="email" wire:model="email"
                                        class="form-control @error('email') is-invalid @enderror">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-success right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
