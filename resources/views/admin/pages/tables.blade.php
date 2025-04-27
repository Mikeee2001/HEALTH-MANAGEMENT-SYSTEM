@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">


        @include('admin.layouts.footers.auth.footer')
    </div>
@endsection
