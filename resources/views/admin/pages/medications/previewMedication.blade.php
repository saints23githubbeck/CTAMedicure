<!-- Modal -->
<div class="modal fade" id="previewMedication-{{$appointment->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <h3 class="text-center">Medication Details</h3>

                <p class="text-center"><span
                            class="text-bold">Description : </span>{{$appointment->medication->medication}}</p>
                <hr>
                <p class="text-center"><span class="text-bold">Advice : </span>{{$appointment->medication->advice}}</p>
                <hr>
                <p class="text-center"><span
                            class="text-bold">Advice : </span>{{$appointment->medication->created_at->format('D-d-M-y')}}
                </p>
                <hr>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


