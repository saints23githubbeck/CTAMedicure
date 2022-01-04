<div class="modal fade " id="payPlan" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered success-modal-content " role="document">
        <div class="modal-content bg-white">

            <div class="modal-body">
                <div class="success-message flex">
                        <h2 class="text-capitalize text-xl-center ml-xl-5 font-weight-bolder ">Choose Payment plan</h2>
                </div>
                <span class="mt-4">
                <a  href="{{route('pay.mobile',$order->id)}}" > <img src="{{asset('sujon/mtn.png')}}" alt="mtn" class="cart-img-show w-25"></a>
                <a href="{{route('pay',$order->id)}}"  ><img src="{{asset('sujon/visa.png')}}" alt="visa" class="cart-img-show w-25"></a>
                </span>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>
