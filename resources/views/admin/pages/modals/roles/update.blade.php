
<!-- Modal -->
<div class="modal fade" id="update-Role-{{$role->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Update Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('role.update',$role)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <select class="form-control form-control-sm {{$errors->has('name') ? ' is-invalid' : ''}} border" name="name" required>
                            <option value="{{$role->name}}">{{$role->name}}</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Pharmacy">Pharmacy</option>
                            <option value="patients">patients</option>
                        </select>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" maxlength="250" cols="30" rows="5" style="resize: none" placeholder="Your Message Should Not Be More Than 250">{{$role->description}}</textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
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


