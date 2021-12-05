
<div class="modal fade" id="addUser-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="priority" class="col-form-label">Priority</label>
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
                        <label for="title" class="col-form-label">Title</label>
                        <input class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" name = "title" value="{{old('title')}}" required>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="title" name ="description" maxlength="250" cols="30" rows="5" style="resize: none" placeholder="Your Message Should Not Be More Than 250"></textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>





















