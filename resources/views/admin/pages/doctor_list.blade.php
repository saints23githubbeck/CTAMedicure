@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <section>
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-11 m-auto">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header bg-white pt-3">
                            <i class="fas fa-user-md fa-2x"></i>
                            <div class="col-lg-10 text">
                                <h5 style="font-size: 25px !important;" class="font-weight-bold">Doctors</h3>
                            <h6 class="font-weight-normal">List of Doctors</h5>
                                <div class="button">
                                    <button style="height: 43px!important; font-size: 15px!important;" type="button" class="btn-primary p-1 text-white">Show/hide</button>
                                    <button type="button" class="btn-success p-1">Copy</button>
                                    <button type="button" class="btn-danger p-1">Export</button>
                                    <button type="button" class="btn-info p-1">Reset</button>
                                    <button type="button" class="btn-secondary p-1">Reload</button>
                                    <button type="button" class="btn-warning p-1">Print</button>

                                    
                            </div>
                            
                             
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-4">
                                <p>Show
                                    <select class="bg-light rounded-0 border-white" name="" id="">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">3</option>
                                        <option value="">3</option>
                                        <option value="">3</option>
                                        <option value="">3</option>
                                        <option value="">3</option>
                                        <option value="">3</option>
                                        <option value="">3</option>
                                        <option class="m-auto" selected value="">10</option>
                                    </select>
                                        entries</p>
                            </div>
                            <div class="col-4">
                                <p class="search-box ml-auto">Search: <input class="bg-light border-white" type="text"></p>
                            </div>
                          </div>    
                    </div>
                    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr class="bg-white">
                                        <th>NO</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><img class=" img-fluid img-thumbnail"  src="images/doctor-character-background_1270-84.jpg" alt=""></td>
                                        <td>Dr.Nayek</td>
                                        <td>Neurologist</td>
                                        <td>drnayek@gmail.com</td>
                                        <td>1 month ago</td>
                                        <td><i class="far fa-eye"></i>
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-alt"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><img class=" img-fluid img-thumbnail"  src="images/images (1).jfif" alt=""></td>
                                        <td>Dr.Nayek</td>
                                        <td>Neurologist</td>
                                        <td>drnayek@gmail.com</td>
                                        <td>1 month ago</td>
                                        <td><i class="far fa-eye"></i>
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-alt"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><img class=" img-fluid img-thumbnail"  src="images/young-doctor-vector-illustration-65642392.jpg" alt=""></td>
                                        <td>Dr.Nayek</td>
                                        <td>Neurologist</td>
                                        <td>drnayek@gmail.com</td>
                                        <td>1 month ago</td>
                                        <td><i class="far fa-eye"></i>
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-alt"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><img class=" img-fluid img-thumbnail" src="images/doctor-character-background_1270-84.jpg" alt=""></td>
                                        <td>Dr.Nayek</td>
                                        <td>Neurologist</td>
                                        <td>drnayek@gmail.com</td>
                                        <td>1 month ago</td>
                                        <td><i class="far fa-eye"></i>
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-alt"></i>
                                        </td>
                                    </tr>
                                    <td>5</td>
                                    <td><img class=" img-fluid img-thumbnail"  src="images/doctor-character-background_1270-84.jpg" alt=""></td>
                                    <td>Dr.Nayek</td>
                                    <td>Neurologist</td>
                                    <td>drnayek@gmail.com</td>
                                    <td>1 month ago</td>
                                    <td><i class="far fa-eye"></i>
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-alt"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><img class=" img-fluid img-thumbnail"  src="images/images (1).jfif" alt=""></td>
                                    <td>Dr.Nayek</td>
                                    <td>Neurologist</td>
                                    <td>drnayek@gmail.com</td>
                                    <td>1 month ago</td>
                                    <td><i class="far fa-eye"></i>
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-alt"></i>
                                    </td>
                                </tr>
                                </table>

                                </div>
                                <p class="mt-5">Showing 1 to 6 of 8 entries</p>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                      <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                      </li>
                                    </ul>
                                  </nav>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.pages.modals.addUser')
@endsection



