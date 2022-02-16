
<!-- Modal -->
<div class="modal fade" id="update-Role-{{$constant->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Update Doctor info</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('constant.update')}}">
                    @csrf
            <div class="form-group">
                <label for="">Doctor name</label><br>
                <input type="hidden" name="id" value={{ $constant->id }}>
               <select class="form-control" name="doctor_id">
                   <option value="">--select doctor---</option>
                  @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id }}" {{ ($doctor->id == $constant->user_id ? 'selected' : '') }}>{{ $doctor->userName }}</option>

                  @endforeach
               </select>
               @error('doctor_id')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
      
            <div class="form-group">
                <label for="">Speciality</label><br>
               <input type="text" name="speciality" value="{{ $constant->speciality }}" class="form-control">
               @error('speciality')
          <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label><br>
               <input type="text" name="price" value="{{ $constant->price }}" class="form-control">
               @error('price')
               <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="my-1">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
                </form>
            </div>




        </div>
    </div>
</div>


