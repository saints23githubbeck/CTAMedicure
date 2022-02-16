
<!-- Modal -->
<div class="modal fade" id="details-Role-{{$constant->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-lg-center" id="staticBackdropLabel">Doctor Details</h5>
                <button type="button" class="btn-close rounded-circle bg-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <p> <strong>Doctor name : </strong> {{ App\Models\User::find($constant->id)->userName }}</p>
       
                <p> <strong>Speciality : </strong> {{$constant->speciality}}</p>
                <p> <strong>Doctor charge : </strong> {{$constant->price}}</p>
                @if(App\Models\Day::where('constant_setting_id',$constant->id)->exists())
                @foreach(App\Models\Day::where('constant_setting_id',$constant->id)->get() as $index => $days)
                <p>Day:<strong>{{ $days->AvailableDate }}</strong> Available-time:<strong>{{ $days->availableTime }}</strong> Closed-time: <strong>{{ $days->closedTime }}</strong> <a href="{{ route('time.delete',$days->id) }}" style="display: inline"><i class="fas fa-trash"></i></a></p>
                @endforeach
               
              @endif

            </div>

        </div>
    </div>
</div>


