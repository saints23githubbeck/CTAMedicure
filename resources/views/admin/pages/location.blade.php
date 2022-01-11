
    <div class="modal fade " id="location" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog success-modal-content " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close rounded-circle  text-white" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="card-title text-primary text-center my-4">Enter your location</h4>

                    <form action="{{route('location.add',$order)}}" method="POST">
                        @csrf
                        <div class="my-5 mx-5">
                            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <input type="text" name="location" id="location" class="form-control" placeholder="Enter Your Location" value="{{ !$errors->has('location') }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text btn-success btn" data-toggle="tooltip"
                                             title="Click To Find Location Automatically">
                                            <span class="fas fa-location-arrow "></span>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('location'))
                                    <div id="location-error" class="error text-danger pl-3"  style="display: block;">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn text-light  medibg">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






