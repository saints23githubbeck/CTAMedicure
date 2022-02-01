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
                            <h5 style="font-size: 25px !important;" class="font-weight-bold">Delivery boys</h3>
                  
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
                                @forelse($deliverys as $index => $delivery)
                                <tr>
                                    <td>dlb{{ $index+1 }}</td>
                                    <td>{{ $delivery->userName }}</td>
                                    <td>{{ $delivery->email }}</td>
                                    <td>{{ $delivery->contactNumber }}</td>
                                    <td>{{ $delivery->created_at->diffForHumans() }}</td>
                             
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Delivery boys found.</td>
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