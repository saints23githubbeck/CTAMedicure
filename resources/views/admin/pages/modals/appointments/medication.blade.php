@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">


            <div class="card-body ">
                <form action="{{route('appointment.medication',$appointment)}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="medication" class="col-form-label">Medication</label>
                        <textarea class="form-control" id="medication" name="medication" maxlength="250" cols="30" rows="5" style="resize: none" placeholder="Doctor`s Medication "></textarea>
                        @if ($errors->has('medication'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('medication') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="advice" class="col-form-label">Advice</label>
                        <textarea class="form-control" id="advice" name="advice" maxlength="250" cols="30" rows="5" style="resize: none" placeholder="Doctors Advice"></textarea>
                        @if ($errors->has('advice'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('advice') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <a href="{{url()->previous()}}" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn medibg text-white">submit</button>
                    </div>
                </form>
            </div>


        </div>
            </div>
        </div>
</div>
@endsection