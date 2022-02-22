<div class="modal fade " id="searchY" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered success-modal-content " role="document">
        <div class="modal-content bg-white">

            <div class="modal-body">
                <div class="success-message flex">
                        <h2 class="text-capitalize text-xl-center ml-xl-5 font-weight-bolder ">Choose Payment plan</h2>
                </div>
                <span class="mt-4">
                 <div class="col-md-3 mb-2 mr-sm-2 ">
                                    <select name="year" style="border-radius: 120px 0 0 120px" id="" class="form-control">
                                        <option value=""><--Select Year--></option>
                                        @foreach($years as $year)
                                            <option value="{{$year->year}}" class="btn btn-primary">{{$year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>                </span>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>
