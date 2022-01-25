
<!-- Modal -->
<div class="modal fade" id="details-pres-{{$coming->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Delivary  Details</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                {{--<img style="width:150px;height:150px" class="img-fluid img-center rounded mb-2" src="{{ asset('uploads/orders/'.$coming->relation_to_order->image) }}">--}}
               <p class="text-center"><span class="text-bold">Pick From : </span>{{$coming->confirmedOrder->user->address->location.' -- '.$coming->confirmedOrder->user->contactNumber}}</p>
               <p class="text-center"><span class="text-bold"> To : </span>{{$coming->confirmedOrder->order->user->address->location.'--  '.$coming->confirmedOrder->order->user->contactNumber}}</p>
               <p class="text-center"><span class="text-bold">Amount : </span>{{$coming->confirmedOrder->amount}}</p>
               <p class="text-center"><span class="text-bold">Status : </span>{{$coming->confirmedOrder->pay_by}}</p>
                <p class="text-center"> <span class="text-dark">Date Ordered : </span>{{$coming->created_at->format('d-M-Y')}}</p>
                <hr>
                {{--<h4 class="text-center">Ordered By : <span class="mr--5">{{$coming->relation_to_user->userName}}</span></h4>--}}
                {{--<h4 class="text-center">Contact : <span class="mr--5">{{$coming->relation_to_user->contactNumber}}</span></h4>--}}
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


