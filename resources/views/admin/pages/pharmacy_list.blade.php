@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <section>
    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="header">
                    <h2>Pharmacy</h2>
                </div>
                <div class="col-lg-10 button-5 pt-2">
                    <button type="button" class="btn1 btn-primary">Copy</button>
                    <button type="button" class="btn btn-primary">CSV</button>
                    <button type="button" class="btn btn-primary">Excel</button>
                    <button type="button" class="btn btn-primary">Print</button>
                    <button type="button" class="btn btn-primary">PDF</button>
                </div>
                <div class="col-4">
                    <p class=" ml-auto">Search: <input class="bg-light border-white" type="text"></p>
                </div>
                <div style="font-weight: 700;" class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <th>SL.No</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Image</th>
                                <th>Address</th>
                                <th>Contact Details</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td class="aborder-bottom pt-4">1</td>
                                <td class="aborder-bottom pt-4">Orlando</td>
                                <td class="aborder-bottom pt-4">Lraras@gmail.com</td>
                                <td class="aborder-bottom pt-4 image12"><img class="" src="images/images (1).jfif" alt=""></td>
                                <td class="aborder-bottom pt-4">Settle,USA</td>
                                <td class="aborder-bottom pt-4">059435843759</td>
                                <td class="aborder-bottom pt-4">0</td>
                                <td class="aborder-bottom pt-">
                                    <div class="col align-self-center button1">
                                        <button type="button" class="btn btn-primary btn-sm btn-block">Category List</button>
                                      </div>
                                    <div class="col align-self-center button2">
                                        <button style="width: 130px !important;" type="button" class="btn btn-secondary btn-sm btn-block">Medicine List</button>
                                      </div>
                                      <button type="button" class="btn2xl btn-secondary">  <i class="fas fa-edit fa-lg"></i></button>
                                      <button type="button" class="btn3xl btn-secondary"><i class="far fa-trash-alt fa-lg"></i></button>
                                   </td>
                            </tr>
                            <tr>
                                <td class="aborder-bottom pt-4">1</td>
                                <td class="aborder-bottom pt-4">Orlando</td>
                                <td class="aborder-bottom pt-4">Lraras@gmail.com</td>
                                <td class="aborder-bottom pt-4 image12"><img class="" src="images/images (1).jfif" alt=""></td>
                                <td class="aborder-bottom pt-4">Settle,USA</td>
                                <td class="aborder-bottom pt-4">059435843759</td>
                                <td class="aborder-bottom pt-4">0</td>
                                <td class="aborder-bottom pt-">
                                    <div class="col align-self-center button1">
                                        <button type="button" class="btn btn-primary btn-sm btn-block">Category List</button>
                                      </div>
                                    <div class="col align-self-center button2">
                                        <button style="width: 130px !important;" type="button" class="btn btn-secondary btn-sm btn-block">Medicine List</button>
                                      </div>
                                      <button type="button" class="btn2xl btn-secondary">  <i class="fas fa-edit fa-lg"></i></button>
                                      <button type="button" class="btn3xl btn-secondary"><i class="far fa-trash-alt fa-lg"></i></button>
                                   </td>
                            </tr>
                            <tr>
                                <td class="aborder-bottom pt-4">1</td>
                                <td class="aborder-bottom pt-4">Orlando</td>
                                <td class="aborder-bottom pt-4">Lraras@gmail.com</td>
                                <td class="aborder-bottom pt-4 image12"><img class="" src="images/images (1).jfif" alt=""></td>
                                <td class="aborder-bottom pt-4">Settle,USA</td>
                                <td class="aborder-bottom pt-4">059435843759</td>
                                <td class="aborder-bottom pt-4">0</td>
                                <td class="aborder-bottom pt-">
                                    <div class="col align-self-center button1">
                                        <button type="button" class="btn btn-primary btn-sm btn-block">Category List</button>
                                      </div>
                                    <div class="col align-self-center button2">
                                        <button style="width: 130px !important;" type="button" class="btn btn-secondary btn-sm btn-block">Medicine List</button>
                                      </div>
                                      <button type="button" class="btn2xl btn-secondary">  <i class="fas fa-edit fa-lg"></i></button>
                                      <button type="button" class="btn3xl btn-secondary"><i class="far fa-trash-alt fa-lg"></i></button>
                                   </td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>
                <p style="margin-top: -16px;" >Showing 1 to 3 of 3 entries</p>
                <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active " aria-current="page">
                        <a class="page-link bg" href="#">2</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
</section>


    @include('admin.pages.modals.addUser')
@endsection



