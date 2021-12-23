
<!-- Modal -->
<div class="modal fade" id="order" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.prescription') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="col-form-label">Image</label>
                        <input type="file" class="form-control  {{$errors->has('image') ? ' is-invalid' : ''}}" name="image" value="{{old('image')}}" required>
                        @if ($errors->has('image'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-form-label">Quantity</label>
                        <input class="form-control {{$errors->has('quantity') ? ' is-invalid' : ''}}" name="quantity" value="{{old('quantity')}}" required>
                        @if ($errors->has('quantity'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                        @endif
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="delivery_option_id" class="col-form-label">Delivary option</label>--}}
                        {{--<select class="form-control {{$errors->has('delivery_option_id') ? ' is-invalid' : ''}}" name="delivery_option_id" value="{{old('delivery_option_id')}}" required>--}}
                           {{--<option value="">--select delivary --</option>--}}
                            {{--@foreach (App\Models\DeliveryOption::all() as $delivery_option)--}}
                            {{--<option value="delivery">del</option>--}}
                            {{--@endforeach--}}

                        {{--</select>--}}
                            {{--@if ($errors->has('delivery_option_id'))--}}
                            {{--<span class="invalid-feedback text-danger" role="alert">--}}
                                {{--<strong>{{ $errors->first('delivery_option_id') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" maxlength="250" cols="30" rows="5" style="resize: none" placeholder="Your Message Should Not Be More Than 250"></textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn medibg">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


































