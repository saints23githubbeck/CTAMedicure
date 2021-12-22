
<!-- Modal -->
<div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="col-form-label">UserName</label>
                        <input class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" name = "title" value="{{old('title')}}" required>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Email</label>
                        <input class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" name = "email" value="{{old('title')}}" required>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Contact</label>
                        <input class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" name = "title" value="{{old('title')}}" required>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="priority" class="col-form-label">Role</label>
                        <select class="form-control {{$errors->has('priority') ? ' is-invalid' : ''}}" name = "priority" value="{{old('priority')}}" required>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                        @if ($errors->has('priority'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('priority') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Password</label>
                        <input class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" name = "title" value="{{old('title')}}" required>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
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


































