
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
            {{--{{dd($doctors->first()->profilr->lastName)}}--}}

            <div class="modal-body">
                <form action="{{route('appointment.add')}}" method="POST">
                    @csrf

                    <div class="form-group">
                    <label for="user_id" class="col-form-label">Doctors</label>
                    <select class="form-control {{$errors->has('user_id') ? ' is-invalid' : ''}}" name="user_id" value="{{old('user_id')}}" id="doctor_id" required>
                    <option value="">--select doctor --</option>
                    @foreach (App\Models\Constant_settings::all() as $doctor)
                   
          <option value="{{$doctor->user_id}}">{{App\Models\User::find($doctor->user_id)->userName}}</option>
         
                 
                    @endforeach

                    </select>
                    @if ($errors->has('user_id'))
                    <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $errors->first('user_id') }}</strong>
                    </span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="">Available day</label><br>
                       <select class="form-control" id="day" name="availableDate">
                           <option value="">--select day---</option>
                       </select>
                       @if ($errors->has('availableDate'))
                       <span class="invalid-feedback text-danger" role="alert">
                       <strong>{{ $errors->first('day') }}</strong>
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
                        <label for="availableTime" class="col-form-label">Time</label>
                       <input type="text" class="form-control {{$errors->has('availableTime') ? ' is-invalid' : ''}}" name="availableTime" id="time" value="" required readonly>
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