@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                 <h2 class="text-center m-5">Appoinment Edit</h2>
                 @if (session('update_message'))
                 <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>{{ session('update_message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                 @endif
                <form action="{{ route('appoinmentUpdate') }}" method="post">
                    @csrf
                    <div class="container">
                        <input type="hidden" value="{{ $apoinmentEdit->id }}" name="appoinment_id" id="appoinment_id">
                        <div class="row margin">
                            <div class="col-4 right">
                                Who is the cosultation for
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="consulation" id="consulation0" value="For Me" checked>
                                            <label class="form-check-label" for="consulation0">
                                                For Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="consulation" id="consulation1" value="Focused">
                                            <label class="form-check-label" for="consulation1">
                                                Focused
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--three start-->
                        <div class="row margin">
                            <div class="col-4 right">
                                Doctor
                            </div>
                            <div class="col-8">
                                <select class="three" name="doctor_name" id="doctor_name">
                                    <option disabled>select a doctor</option>
                                    <option>Han Richardson</option>
                                </select>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="col-4 right">
                                Date
                            </div>
                            <div class="col-8">
                                <input type="date" value="{{ $apoinmentEdit->date }}" class="three @error('date') is-invalid @enderror" name="date" id="date">
                                @error('date')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="col-4 right">
                                Purpose of visit/<br>comments
                            </div>
                            <div class="col-8">
                                <textarea name="comment" id="comment" class="four custom_height @error('comment') is-invalid @enderror" placeholder="Lorem ipsum dolor sit amet consectetur?">{{ $apoinmentEdit->comment }}</textarea>
                                @error('comment')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="offset-4 col-4">
                                <input type="submit" name="submit_change" value="Update" class="btn_submit">
                            </div>
                        </div>
                        <!--four end-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
