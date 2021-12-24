
<!-- Modal -->
<div class="modal fade" id="details-order-{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Order  Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <img style="width:150px;height:150px" class="img-fluid img-center rounded mb-2" src="{{ asset('uploads/orders/'.$order->image) }}">
               <p class="text-center"><span class="text-bold">Description : </span>{{$order->note}}</p>
                <p class="text-center"> <span class="text-dark">Date Ordered : </span>{{$order->created_at}}</p>
                <hr>
                <h4 class="text-center">Ordered By : <span class="mr--5">{{$order->user->userName}}</span></h4>
                <h4 class="text-center">Contact : <span class="mr--5">{{$order->user->contactNumber}}</span></h4>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


