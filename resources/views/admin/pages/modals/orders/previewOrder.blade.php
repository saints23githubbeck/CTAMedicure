
<!-- Modal -->
<div class="modal fade" id="preview-order-{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Order  Details</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <h3 class="text-center">Order Details</h3>
                <img style="width:150px;height:150px" class="img-fluid img-center rounded mb-2" src="{{ asset('uploads/orders/'.$order->image) }}">
               <p class="text-center"><span class="text-bold">Description : </span>{{$order->note}}</p>
                <hr>
                <h3 class="text-center">Confirmed Details</h3>
                <p class="text-center">Amount : <span class="mr--5">{{$order->confirmedOrder->amount}}</span></p>
                <p class="text-center">Contact : <span class="mr--5">{{$order->confirmedOrder->user->contactNumber}}</span></p>
            </div>


            <div class="modal-footer">
                @if($order->confirmedOrder->status ==0)
                <form action="{{route('prescription.accerpt',$order->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Accerpt</button>
                </form>
                <form action="{{route('prescription.reject',$order->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-warning" data-bs-dismiss="modal">Reject</button>
                </form>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                 @else
                <a href="{{route('prescription.checkout',$order)}}"  class="btn btn-outline-success">pay Now</a>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    @endif
            </div>
        </div>
    </div>
</div>


