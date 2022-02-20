<div class="modal fade " id="reject-order-{{$order->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog success-modal-content " role="document">
        <div class="modal-content ">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="success-message flex">
                    <p class="item-title"><i class="fas fa-exclamation-triangle rounded-circle p-3 text-white" style="background-color: red"></i>
                        <span class="text-capitalize text-xl-center ml-xl-5 font-weight-bolder ">Are Sure You want to Reject This Order ?</span></p>
                </div>
            </div>
            <div class="modal-footer">
                <form  action="{{route('prescription.reject',$order)}}" method="post">
                    @csrf
                    <button type="submit" class="btn text-light  medibg">Reject</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
