
<!-- Modal -->
<div class="modal fade" id="details-appo-{{$appointment->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Order  Details</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
               <p class="text-center"><span class="text-dark">Reason <br> </span>{{$appointment->reason}}</p>
                <p class="text-center"> <span class="text-dark">Date : </span>{{$appointment->created_at->format('d-M-Y')}}</p>
                <p class="text-center"> <span class="text-dark">Available Date: </span>{{$appointment->availableDate}}</p>
                <p class="text-center"> <span class="text-dark">Available Time: </span>{{$appointment->availableTime}}</p>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


