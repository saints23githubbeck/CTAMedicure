


@extends('admin.layouts.app')

@section('content')


    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <div class="">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="row justify-content-end">

                                <div class="col-8">
                                    <h3 class="alert-primary px-3 py-2" style="color: black; background: #F1F8FE;">INCOMING REQUEST</h3>
                                    <div class="row">



                                        <div class="col-md-7">

                                            <iframe class="border" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7941.121148966844!2d-0.08940577582471977!3d5.631688633669825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf8510c90603f9%3A0xc416b17a60a005f8!2sCharles%20Technology%20Africa%20Limited!5e0!3m2!1sen!2sgh!4v1638022782376!5m2!1sen!2sgh"  width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="card" style="max-width: 540px;">
                                                <div class="row">
                                                    <div class="col-md-4 px-3 py-3">
                                                        <img src="/sujon/profile.jpg" class=" rounded-circle" alt="..." style="width: 80px;">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Lorem ipsum</h5>
                                                            <h6 class="card-text" >3.5
                                                                <span style="color: goldenrod;">
                                                                <i class="fas fa-star bg-golden"> </i>
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card ">
                                                <div class="card-body px-5">

                                                    <h3 class=" fw-bolder text-primary text-center">Pick-up Details</h3>

                                                    <p class="card-text" style="font-weight: bold;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>

                                                </div>
                                            </div>
                                            <div class="card ">
                                                <div class="card-body px-5">
                                                    <h3 class=" fw-bolder text-primary text-center">Drop Details</h3>
                                                    <p class="card-text" style="font-weight: bold;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn text-white px-5 py-1 mt-3 mx-4" style="font-size: 24px; background: #FC2626;" type="button">CANCEL</button>
                                        <button class="btn bg-primary text-white px-5 py-1 mt-3" style="font-size: 24px;" type="button">ACCEPT</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>






@endsection

@section('extra-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">

        $("#datepicker").datepicker( {
            format: "mm / yy",
            startView: "months",
            minViewMode: "months"
        });

    </script>
@endsection