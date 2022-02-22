









<!-- Modal -->
<div class="modal fade" id="edit-pres-{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Order  Details</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="modal-body">
                    <form action="{{ route('update.prescription',$order)}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="col-md-8 offset-md-4 mt-3 mb-2" style="height: 120px; width: 120px">
                            <div id="blah" class=" mx-auto" style="background: url('{{ asset('uploads/orders/'.$order->image) }}') center center no-repeat;
                                    background-size: cover;height: 120px; width: 120px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-form-label">Image</label>
                            <input type="" id="selectedFile" name="image" onchange="readURL(this);" style="display: none;"/>
                            <input type="file" class="btn medibg offset-md-2" id="update-btn"  name="image" value="Update Image"
                                   onclick="document.getElementById('selectedFile').click();"/>
                            @if ($errors->has('image'))
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-form-label">Quantity</label>
                            <input class="form-control {{$errors->has('quantity') ? ' is-invalid' : ''}}" name="quantity" value="{{$order->quantity}}" required>
                            @if ($errors->has('quantity'))
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description</label>
                            <textarea class="form-control" id="note" name="note"   maxlength="250" cols="30" rows="5" style="resize: none" placeholder="Your Message Should Not Be More Than 250">{{$order->note}}</textarea>
                            @if ($errors->has('note'))
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('note') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn medibg text-white">Update</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>





















    {{--<!-- Modal -->--}}
{{--<div class="modal fade" id="details-pres1-{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-dialog-centered">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>--}}
                {{--<button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
           {{----}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .css({'background': 'url('+e.target.result+') center center no-repeat','background-size':'cover'});
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>