<div class="modal fade " id="locationModel" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog success-modal-content " role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="btn-close rounded-circle  text-white" data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="card-title text-primary text-center my-4">Select your location side</h4>

                {{--<form action="{{route('change.location')}}" method="POST">--}}

                <div class="card-body">
                    @if(App\Models\Admin_address::where('id',1)->exists())
                        <form action="{{route('location.add',$order)}}" method="POST">
                            @csrf
                            <div class="my-5 mx-5">
                                <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                    <div class="input-group">
                                        {{-- <input type="text" name="location" id="location" class="form-control" placeholder="Enter Your Location" value="{{ !$errors->has('location') }}" required> --}}
                                        <input type="text" name="location" id="location" class="form-control"
                                               placeholder="Enter Your Location"
                                               value="{{ App\Models\Admin_address::find(1)->first()->location }}"
                                               required autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text btn-success btn" data-toggle="tooltip"
                                                 title="Click To Find Location Automatically">
                                                <span class="fas fa-location-arrow "></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('location'))
                                        <div id="location-error" class="error text-danger pl-3" style="display: block;">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn text-light  medibg">change</button>
                            </div>
                        </form>
                    @else
                        <form action="{{route('admin.location.add')}}" method="POST">
                            @csrf
                            <div class="my-5 mx-5">
                                <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                    <div class="input-group">
                                        {{-- <input type="text" name="location" id="location" class="form-control" placeholder="Enter Your Location" value="{{ !$errors->has('location') }}" required> --}}
                                        <input type="text" name="location" id="location" class="form-control"
                                               placeholder="Enter Your Location" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text btn-success btn" data-toggle="tooltip"
                                                 title="Click To Find Location Automatically">
                                                <span class="fas fa-location-arrow "></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('location'))
                                        <div id="location-error" class="error text-danger pl-3" style="display: block;">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn text-light  medibg">Add</button>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>



@section('footer_script')
    <script>
        $(document).ready(function () {
            var path = "{{ url('/location_typehead') }}";
            $('#location').typeahead({
                source: function (query, process) {
                    return $.get(path, {query: query}, function (data) {
                        return process(data);
                    });
                }
            });

        });

    </script>
    <script>
        $(document).ready(function () {
            var path = "{{ url('/location_typehead') }}";
            $('#location').typeahead({
                source: function (query, process) {
                    return $.get(path, {query: query}, function (data) {
                        return process(data);
                    });
                }
            });

        });


@endsection


