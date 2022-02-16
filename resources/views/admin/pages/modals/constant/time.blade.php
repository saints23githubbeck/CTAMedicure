
<!-- Modal -->
<div class="modal fade" id="timeadd-{{$constant->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add available Time for {{ App\Models\User::find($constant->user_id)->userName }}</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('constant.time.add')}}">
                    @csrf
                    <input type="hidden" name="constant_id" value="{{ $constant->id }}">
            <div class="form-group">
                <label for="">Available day</label><br>
               <select class="form-control" name="day">
                   <option value="">--select day---</option>
                   <option value="saturday">Saturday</option>                
                   <option value="sunday">Sunday</option>                
                   <option value="monday">Monday</option>                
                   <option value="tuesday">Tuesday</option>                
                   <option value="thursday">Thursday</option>                
                   <option value="wednesday">Wednesday</option>                
                   <option value="friday">Friday</option>                
               </select>
               @error('day')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="form-group">
                <label for="">Duration(minutes)</label><br>
               <input type="number" name="duration" class="form-control">
               @error('duration')
          <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>

            <div class="form-group">
                <label for="">Available Time</label><br>
               <input type="time" name="availableTime" class="form-control">
               @error('availableTime')
          <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="form-group">
                <label for="">Closed time</label><br>
               <input type="time" name="closedTime" class="form-control">
               @error('closedTime')
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


