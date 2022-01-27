
<!-- Modal -->
<div class="modal fade" id="details-Role-{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">{{$user->userName}} Details</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <p> <strong>Name : </strong> {{$user->userName}}</p>
                <p> <strong>Email : </strong> {{$user->email}}</p>
                <p> <strong>Contact Number : </strong> {{$user->contactNumber}}</p>
                <p> <strong>Role : </strong> {{$user->role->name ?? 'no'}}</p>

            </div>

        </div>
    </div>
</div>


