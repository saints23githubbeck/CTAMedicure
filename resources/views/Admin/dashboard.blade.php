@extends('admin.layouts.master')
@section('content')



<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 7000);
</script>
@endsection
