@extends('admin_portal.partials.master')

@section('page-content-wrapper-inner')
    @include('admin_portal.dashboard.show')
@endsection

@section("footer")
    @include('admin_portal.partials.footer_section')
@endsection
