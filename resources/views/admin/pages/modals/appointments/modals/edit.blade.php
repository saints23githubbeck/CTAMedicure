<!-- Modal -->
<div class="modal fade" id="update-appo-{{$appointment->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Consultancy</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('appointment.update',$appointment)}}" method="POST">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="user_id" class="col-form-label">Doctors</label>
                        <select class="form-control {{$errors->has('user_id') ? ' is-invalid' : ''}}" name="user_id"
                                value="{{$appointment->consultancyConfirm->user_id}}"
                                required>
                            <option value="{{$appointment->consultancyConfirm->user_id}}">{{$appointment->consultancyConfirm->user->profile->firstName.' '.$appointment->consultancyConfirm->user->profile->lastName}}</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->profile->firstName.' '.$doctor->profile->lastName}}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('user_id'))
                            <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $errors->first('user_id') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="reason" class="col-form-label">Reason Of Consultancy</label>
                        <textarea class="form-control {{$errors->has('reason') ? ' is-invalid' : ''}}" name="reason"
                                  value="{{old('reason')}}" maxlength="250" cols="30" rows="5" style="resize: none"
                                  placeholder="Your Message Should Not Be More Than 250">{{$appointment->reason}}</textarea>
                        @if ($errors->has('reason'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('reason') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="availableDate" class="col-form-label">Date</label>
                        <input type="date" class="form-control {{$errors->has('availableDate') ? ' is-invalid' : ''}}"
                               name="availableDate" value="{{$appointment->availableDate}}" required>
                        @if ($errors->has('availableDate'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('availableDate') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="availableTime" class="col-form-label">Time</label>
                        <input type="time" class="form-control {{$errors->has('availableTime') ? ' is-invalid' : ''}}"
                               name="availableTime" value="{{$appointment->availableTime}}" required>
                        @if ($errors->has('availableTime'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('availableTime') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn medibg text-white">Upate</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .css({
                        'background': 'url(' + e.target.result + ') center center no-repeat',
                        'background-size': 'cover'
                    });
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>