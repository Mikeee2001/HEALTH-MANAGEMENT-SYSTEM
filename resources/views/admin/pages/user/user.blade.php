@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('admin.layouts.navbars.auth.topnav', ['title' => 'Users List'])

@include('admin.pages.user.modal.create-user')
@include('admin.pages.user.modal.view-user-modal')
@include('admin.pages.user.modal.edit-user-modal')


<section class="p-4">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-15">
                <div class="card mb-4" style="padding: 15px;">
                    <div class="card-header pb-0">
                        <h6 class="text-uppercase font-weight-bold">Users List</h6>
                    </div>

                    <div>
                        <button type="button" class="btn btn-success btnAddUser" data-mdb-ripple-init>
                            <i class="fas fa-user fa-lg" style="margin-right: 5px"></i> Add User
                        </button>
                    </div>


                    <div class="card-body px-3 pt-3 pb-3">
                        <div class="table-responsive p-3">
                            <table class="table usersTable align-middle text-center table-striped table-bordered border border-dark" style="padding: 10px;">
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
                                            Created At
                                        </th>

                                        <th scope="col" class="text-uppercase text-secondary text-xs font-weight-bold text-center">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

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
