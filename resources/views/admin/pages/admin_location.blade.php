@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title text-primary text-center my-4">Enter admin location</h4>

                    </div>
                    <div class="card-body">

                            <form action="{{route('admin.location.add')}}" method="POST">
                                @csrf
                                <div class="my-5 mx-5">
                                    <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                        <div class="input-group">
                                            {{-- <input type="text" name="location" id="location" class="form-control" placeholder="Enter Your Location" value="{{ !$errors->has('location') }}" required> --}}
                                            <input type="text" name="location" id="location" class="form-control"
                                                   placeholder="Enter Your Location" required autocomplete="off">
                                            <div class="input-group-append">
                                                <div class="input-group-text btn-success btn" data-toggle="tooltip"
                                                     title="Click To Find Location Automatically">
                                                    <span class="fas fa-location-arrow "></span>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('location'))
                                            <div id="location-error" class="error text-danger pl-3"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn text-light  medibg">Add</button>
                                </div>
                            </form>


                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('footer_script')
            <script>
                $(document).ready(function () {
                    var path = "{{ url('/location_typehead') }}";
                    $('#location').typeahead({
                        source: function (query, process) {
                            return $.get(path, {name: query}, function (data) {
                                return process(data);
                            });
                        }
                    });

                });

            </script>


@endsection