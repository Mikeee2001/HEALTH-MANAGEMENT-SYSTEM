@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('admin.layouts.navbars.auth.topnav', ['title' => 'Users List'])



<section class="p-4"> <!-- Added padding to the section -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-15">
                <div class="card mb-4" style="padding: 15px;"> <!-- Added inline padding -->
                    <div class="card-header pb-0">
                        <h6 class="text-uppercase font-weight-bold">Users List</h6>
                    </div>

                    <div>
                        <button type="button" class="btn btn-success " data-mdb-ripple-init>
                            <i class="fas fa-user-md" style="margin-right: 5px"></i> Add User
                        </button>
                    </div>


                    <div class="card-body px-3 pt-3 pb-3"> <!-- Adjusted padding -->
                        <div class="table-responsive p-3"> <!-- Padding for the table container -->
                            <table class="table  table-bordered" style="padding: 10px;"> <!-- Added padding and borders -->
                                <thead class="align-middle">
                                    <tr>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            #
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            Username
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            User Firstname
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            User Lastname
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            User Email
                                        </th>
                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center tableBody">
                                    {{-- @foreach ($users as $item)
                                    <tr>
                                        <td>{{$loop->iteration }}</td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->firstname}}</td>
                                        <td>{{$item->lastname}}</td>
                                        <td>{{$item->email}}</td>
                                    </tr>
                                    @endforeach --}}
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
