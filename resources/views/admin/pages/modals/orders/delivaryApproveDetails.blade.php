
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
                <img style="width:150px;height:150px" class="img-fluid img-center rounded mb-2" src="{{ asset('uploads/orders/'.$approved->order->image) }}">
                <hr>
                <h4 class="text-center">Amount: <span class="mr--5">{{$approved->amount}}</span></h4>
                <h4 class="text-center">Description : <span class="mr--5">{{$approved->note}}</span></h4>
                <h4 class="text-center">Confirm By : <span class="mr--5">{{$approved->relation_to_user->contactNumber}}</span></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


