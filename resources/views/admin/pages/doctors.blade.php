@extends('admin.layouts.app')

@section('content')
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
                          
                    </div>
                 
                </div>
                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr class="bg-white">
                                    <th>NO</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Contact number</th>
                                    <th>Created At</th>
                                
                                </tr>
                                @forelse($doctors as $index => $doctor)
                                <tr>
                                    <td>doc{{ $index+1 }}</td>
                                    <td>{{ $doctor->userName }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->contactNumber }}</td>
                                    <td>{{ $doctor->created_at->diffForHumans() }}</td>
                             
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Doctors found.</td>
                                </tr>
                                @endforelse
                               
                                
                            </table>

                            </div>
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection