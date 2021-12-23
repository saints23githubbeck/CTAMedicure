
<!-- Modal -->
<div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="userName" class="col-form-label">UserName</label>
                        <input class="form-control {{$errors->has('userName') ? ' is-invalid' : ''}}" name = "title" value="{{old('userName')}}" required>
                        @if ($errors->has('userName'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('userName') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input class="form-control {{$errors->has('email') ? ' is-invalid' : ''}}" name = "email" value="{{old('email')}}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contactNumber" class="col-form-label">Contact</label>
                        <input class="form-control {{$errors->has('contactNumber') ? ' is-invalid' : ''}}" name = "contactNumber" value="{{old('contactNumber')}}" required>
                        @if ($errors->has('contactNumber'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('contactNumber') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-form-label">Role</label>
                        <select class="form-control form-control-sm {{$errors->has('role') ? ' is-invalid' : ''}} border" name="role" required>
                            <option value="">Select Specified role For User</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Pharmacy">Pharmacy</option>
                            <option value="patients">patients</option>
                        </select>
                        @if ($errors->has('role'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input class="form-control  {{$errors->has('password') ? ' is-invalid' : ''}}" type="password" name = "password" value="{{old('password')}}" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn medibg text-white">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


































