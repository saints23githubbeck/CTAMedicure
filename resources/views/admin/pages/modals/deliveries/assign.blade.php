
<!-- Modal -->
<div class="modal fade" id="assign-delivery-{{$deliver->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Do you want to assign this order to {{$deliver->userName}} </h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form action="{{route('delivery.assign',$deliver)}}" method="POST">
                    @csrf
                    {{--<div class="form-group">--}}
                        {{--<label for="amount" class="col-form-label">Amount</label>--}}
                        {{--<input type="number" class="form-control  {{$errors->has('amount') ? ' is-invalid' : ''}}" name="amount" value="{{old('amount')}}" required>--}}
                        {{--@if ($errors->has('amount'))--}}
                            {{--<span class="invalid-feedback text-danger" role="alert">--}}
                                {{--<strong>{{ $errors->first('amount') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="description" class="col-form-label">Description</label>--}}
                        {{--<textarea class="form-control" id="description" name="description" maxlength="250" cols="30" rows="5" style="resize: none" placeholder="Your Message Should Not Be More Than 250"></textarea>--}}
                        {{--@if ($errors->has('description'))--}}
                            {{--<span class="invalid-feedback text-danger" role="alert">--}}
                                {{--<strong>{{ $errors->first('description') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn medibg text-white">Assign</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


