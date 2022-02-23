
<!-- Modal -->
<div class="modal fade" id="approved-order-{{$approved->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Delivary Approve  Details</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <img style="width:150px;height:150px" class="img-fluid img-center rounded mb-2" src="{{ asset('uploads/orders/'.$approved->confirmedOrder->order->image) }}">
                <hr>
                <div class="container">
                    <h4 class="text-center">Amount: <span class="mr--5">{{$approved->confirmedOrder->amount}}</span></h4>
                    <h4 class="text-center">Pick From : <span class="mr--5">{{$approved->confirmedOrder->order->user->address->location}}</span></h4>
                    <h4 class="text-center">Pick To : <span class="mr--5">{{$approved->confirmedOrder->user->address->location}}</span></h4>
                    {{--<h4 class="text-center">Confirm By : <span class="mr--5">{{$approved->relation_to_user->contactNumber}}</span></h4>--}}
                    {{--{{$approved->confirmedOrder->delivery}}--}}
                    @if($approved->confirmedOrder->delivery)
                        <p class="text-center">Pharmacy : <span class="mr--5">
                        {{$approved->confirmedOrder->user->contactNumber}}
                    </span>
                        </p>
                        <p class="text-center">Patient : <span class="mr--5">{{$approved->confirmedOrder->order->user->contactNumber}}</span></p>

                    @endif
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


