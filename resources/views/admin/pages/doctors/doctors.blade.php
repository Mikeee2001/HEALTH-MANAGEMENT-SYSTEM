@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('admin.layouts.navbars.auth.topnav', ['title' => 'Doctors List'])

@include('admin.pages.doctors.modal.addDoctor-modal')
@include('admin.pages.doctors.modal.updateDoctor-modal')
@include('admin.pages.doctors.modal.view-modal')
<section class="p-4"> <!-- Added padding to the section -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-15">
                <div class="card mb-4" style="padding: 15px;"> <!-- Added inline padding -->
                    <div class="card-header pb-0">
                        <h6 class="text-uppercase font-weight-bold">Doctors List</h6>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success btnAddDoctor" data-mdb-ripple-init>
                            <i class="fas fa-user-md fa-xl" style="margin-right: 5px"></i> Add Doctor
                        </button>
                    </div>


                    <div class="card-body px-3 pt-3 pb-3"> <!-- Adjusted padding -->
                        <div class="table-responsive p-3"> <!-- Padding for the table container -->
                            <table class="table doctorsTable align-middle table-striped text-center table-bordered" style="padding: 10px;"> <!-- Added padding and borders -->
                                <thead class="align-middle">
                                    <tr>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            #
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            Doctor Image
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            Firstname
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            Lastname
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            Specialty
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            Qualification
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- The rows will be dynamically appended using JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
