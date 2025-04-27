@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Billing'])
    <div class="container-fluid py-4">
        <div class="row">
         
        @include('admin.layouts.footers.auth.footer')
    </div>
@endsection
