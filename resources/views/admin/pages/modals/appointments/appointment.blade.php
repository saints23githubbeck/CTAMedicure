<form action="{{ route('appoinmentPost') }}" method="post">
    @csrf
    <div class="modal  fade" id="appointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header custom_header">
                    <div class="container">
                        <h5 class="modal-title" id="staticBackdropLabel" style="color:#4301ab;font-weight: bold;">Please fill in the required information.</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
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
                                <input type="date" class="three @error('date') is-invalid @enderror" name="date" id="date">
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
                                <textarea name="comment" id="comment" class="four custom_height @error('comment') is-invalid @enderror" placeholder="Lorem ipsum dolor sit amet consectetur?"></textarea>
                                @error('comment')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="offset-4 col-4">
                                <input type="submit" name="submit_change" value="continue" class="btn_submit">
                            </div>
                        </div>
                        <!--four end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
