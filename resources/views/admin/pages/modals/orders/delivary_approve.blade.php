
<!-- Modal -->
<div class="modal fade" id="approve-order-{{$delivary->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Order  Details</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
             
                <form action="{{ route('delivary_approved') }}" method="POST">
                    @csrf
                    
                      <input type="hidden" name="delivary_id" value="{{ $delivary->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn medibg">Approved</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


