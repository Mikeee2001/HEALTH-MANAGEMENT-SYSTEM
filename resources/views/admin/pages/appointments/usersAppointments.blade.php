@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('admin.layouts.navbars.auth.topnav', ['title' => 'Users with Appointments'])
{{-- @include('admin.pages.appointments.modal.add-appointment-modal') --}}
@include('admin.pages.appointments.usersAppointments' )

<section class="p-4">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-15">
                <div class="card mb-4 p-2">
                    <div class="card-header pb-0">
                        <h6 class="text-uppercase font-weight-bold">Appointments List</h6>
                    </div>

                    {{-- <div class="mb-2">
                        <button type="button" id="addAppointment" class="btn btn-success btn-xl">
                            <i class="fas fa-user fa-lg"></i> Add Appointment
                        </button>
                    </div> --}}

                    <div class="card-body px-2 pt-2 pb-2">
                        <div class="table-responsive">
                            <table class="table table-sm usersAppointmentsTable text-center table-striped table-bordered border border-dark">
                                <thead class="align-middle text-center"> <!-- ✅ Added 'text-center' -->
                                    <tr class="text-xs text-center"> <!-- ✅ Ensures header alignment -->
                                        <th class="text-center">#</th>
                                        <th class="text-center">Appointment Name</th>
                                        <th class="text-center">Appointment Date</th>
                                        <th class="text-center">Appointmen Time</th>
                                        <th class="text-center">Appointment Type</th>
                                        <th class="text-center">Assign Doctor</th>
                                        <th class="text-center">Appointment Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </thead>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
