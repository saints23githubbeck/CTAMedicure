
<!-- Modal -->
<div class="modal fade" id="profile-update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Profile Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.update')}}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="role" class="col-form-label">Name</label>


                        <input
                                type="text"
                                id="userName"
                                class="form-control form-control-sm @error('userName') is-invalid @enderror border" name="userName"
value="{{auth()->user()->userName}}"
                        />
                        @error('userName')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-form-label">Email</label>
                        <input
                                type="email"
                                id="email"
                                class="form-control form-control-sm @error('email') is-invalid @enderror border" name="email"
                                value="{{$user->email}}"
                        />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-form-label">Contact Number</label>
                        <input
                                type="number"
                                id="contactNumber"
                                class="form-control form-control-sm @error('contactNumber') is-invalid @enderror border" name="contactNumber"
                                value="{{$user->contactNumber}}"
                        />
                        @error('contactNumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-form-label">Role</label>
                        <select class="form-control form-control-sm @error('role_id') is-invalid @enderror border" name="role_id" required>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn medibg text-white ">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


