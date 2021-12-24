
@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="container">
        
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">View prescription</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('add.prescription') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col form-group">
                                    <label for="title" class="col-form-label">Image</label><br>
                                    <img style="width:300px;height:300px;" src="{{ asset('uploads/orders/'.$data->image) }}">
                                </div>
                           <div class="col">
                            <div class="form-group">
                                <label for="quantity" class="col-form-label">Quantity</label>
                                <input class="form-control {{$errors->has('quantity') ? ' is-invalid' : ''}}" name="quantity" value="{{ $data->quantity }}"  readonly>
                                @if ($errors->has('quantity'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="delivery_option_id" class="col-form-label">Delivary option</label>
                                <select class="form-control {{$errors->has('delivery_option_id') ? ' is-invalid' : ''}}" name="delivery_option_id" value="{{old('delivery_option_id')}}" readonly>
                                   <option value="">--select delivary --</option>
                                    @foreach (App\Models\DeliveryOption::all() as $delivery_option)
                                    <option value="{{ $delivery_option->id }}" {{  $delivery_option->id === $data->delivery_option_id ? 'selected' : '' }}>{{ $delivery_option->option }}</option>
                                    @endforeach
                                  
                                </select>
                                    @if ($errors->has('delivery_option_id'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('delivery_option_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                           </div>
                            </div>
                        


                           
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" maxlength="250" cols="30" rows="5" style="resize: none" placeholder="Your Message Should Not Be More Than 250" readonly></textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('prescription') }}" class="btn btn-warning">Back</a>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection