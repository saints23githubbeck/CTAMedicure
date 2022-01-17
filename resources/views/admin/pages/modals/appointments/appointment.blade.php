
{{--<form action="{{ route('appoinmentPost') }}" method="post">--}}
    {{--@csrf--}}

<div class="modal fade" id="appointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{route('appointment.add')}}" method="POST">
                    @csrf

                    <div class="form-group">
                    <label for="user_id" class="col-form-label">Doctors</label>
                    <select class="form-control {{$errors->has('user_id') ? ' is-invalid' : ''}}" name="user_id" value="{{old('user_id')}}" required>
                    <option value="">--select doctor --</option>
                   <option value="1">charles</option>
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
                        <textarea  class="form-control {{$errors->has('reason') ? ' is-invalid' : ''}}"  name="reason" value="{{old('reason')}}"maxlength="250" cols="30" rows="5" style="resize: none" placeholder="Your Message Should Not Be More Than 250"></textarea>
                        @if ($errors->has('reason'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('reason') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="availableDate" class="col-form-label">Date</label>
                        <input type="date" class="form-control {{$errors->has('availableDate') ? ' is-invalid' : ''}}" name="availableDate" value="{{old('availableDate')}}" required>
                        @if ($errors->has('availableDate'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('availableDate') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="availableTime" class="col-form-label">Time</label>
                       <input type="time" class="form-control {{$errors->has('availableTime') ? ' is-invalid' : ''}}" name="availableTime" value="{{old('availableTime')}}" required>
                        @if ($errors->has('availableTime'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('availableTime') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn medibg text-white">submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>