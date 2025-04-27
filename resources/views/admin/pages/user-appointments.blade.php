
@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('admin.layouts.navbars.auth.topnav', ['title' => 'Appointments'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


</head>


    <div class="container-fluid py-4">
        <div class="row">
    <div class="col-15">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>User with appointments</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    #</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Fullname</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Appointment name</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Appointment Status</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                    Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tablebody">
                            {{-- @foreach ($users as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $item->firstname }}</td>
                                <td class="text-center">{{ $item->lastname }}</td>
                                <td>
                                    @if ($item->appointments) <!-- Check if appointments is not null -->
                                        @foreach ($item->appointments as $app)
                                            {{ $app->appointment_name }}<br>
                                        @endforeach
                                    @else
                                        No appointments
                                    @endif
                                </td>
                                <td>
                                    @if ($item->appointments) <!-- Check if appointments is not null -->
                                        @foreach ($item->appointments as $app)
                                            {{ $app->appointment_status['status'] }}<br> <!-- Access the status -->
                                        @endforeach
                                    @else
                                        No status available
                                    @endif
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
     @include('admin.layouts.footers.auth.footer')
@endsection
