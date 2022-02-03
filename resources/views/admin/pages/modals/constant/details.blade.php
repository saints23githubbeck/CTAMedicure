
<!-- Modal -->
<div class="modal fade" id="details-Role-{{$constant->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Doctor Details</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <p> <strong>Doctor name : </strong> {{ App\Models\User::find($constant->id)->userName }}</p>
                <p> <strong>Available time : </strong> {{$constant->availableTime}}</p>
                <p> <strong>Speciality : </strong> {{$constant->speciality}}</p>
                <p> <strong>Doctor charge : </strong> {{$constant->price}}</p>
               

            </div>

        </div>
    </div>
</div>


