
<!-- Modal -->
<div class="modal fade" id="previewApp-{{$appointment->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <h3 class="text-center">Appointments Details</h3>

               <p class="text-center"><span class="text-bold">Reason : </span>{{$appointment->consultancy->reason}}</p>
                <hr>
                <h3 class="text-center">Confirmed Details</h3>
                <p class="text-center">Availability Date $ Date <span class="text-danger">{{\Carbon\Carbon::parse($appointment->consultancy->availableDate)->format('D-d-M-y').' '.$appointment->consultancy->availableTime}}</span></p>
                <p class="text-center">Patients : <span class="">{{$appointment->consultancy->user->profile->firstName.'  '.$appointment->consultancy->user->profile->lastName}}</span></p>
                <p class="text-center">Contact : <span class="">{{$appointment->consultancy->user->contactNumber}}</span></p>
                <p class="text-center">Contact : <span class="">{{$appointment->consultancy->user->address->location ?? 'Anonymous'}}</span></p>
                <p class="text-center">Req Date : <span class="">{{$appointment->created_at->format('D-d-M-y')}}</span></p>
            </div>


            <div class="modal-footer">
                @if($appointment->consultancy->status == 1)
                <form action="{{route('appointment.complete',$appointment)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Mark Complete</button>
                </form>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    @else
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    @endif
            </div>
        </div>
    </div>
</div>


