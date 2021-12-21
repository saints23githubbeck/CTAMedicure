<h4 class="shadow-dodger-blue mt-2 shadow-lg">
    @if (session('status'))
        <div class="alert alert-success bg-violet-blue alert-dismissible fade show flash-message text-white text-xl-center" id ="flash-message" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</h4>
