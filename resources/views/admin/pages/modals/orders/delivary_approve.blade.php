
<!-- Modal -->
<div class="modal fade" id="approve-order-{{$coming->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body ">
                <div class="success-message flex">
                    <p class="item-title">
                        <span class="text-capitalize text-xl-center ml-xl-5 font-weight-bolder text-warning">You Are Approving  this Delivery </span></p>
                </div>
                <form action="{{ route('delivery.approved',$coming) }}" method="POST">
                    @csrf
                    
                      {{--<input type="hidden" name="delivary_id" value="{{ $coming->id }}">--}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn medibg text-white">Approved</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


