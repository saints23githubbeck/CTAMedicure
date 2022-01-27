<div class="modal fade " id="deliveryRej-{{$coming->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered " role="document">
        <div class="modal-content ">
            <div class="modal-content">
            <div class="modal-body">
                <div class="success-message flex">
                    <p class="item-title">
                        <span class="text-capitalize text-xl-center ml-xl-5 font-weight-bolder text-warning">Are Sure You want to Reject this Delivery ?</span></p>
                </div>
            </div>
            <div class="modal-footer">
                <form  action="{{route('delivery.assign.reject',$coming)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn text-white  medibg">Delete</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
