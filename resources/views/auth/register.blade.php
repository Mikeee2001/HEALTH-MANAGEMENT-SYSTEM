@extends('admin.layouts.app')

@section('content')
@include('admin.layouts.navbars.guest.navbar')



<main class="main-content mt-0">
    <div class="page-header align-items-center min-vh-100"
         style="background-image: url('https://wallpaperaccess.com/full/9802659.jpg'); background-size: cover; background-position: center; position: relative;">
        <span class="mask bg-gradient-dark opacity-6"
              style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></span>
        <div class="container d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-4 col-lg-5 col-md-7">
                <div class="card z-index-1">
                    <div class="card-header text-center pt-4">
                        <h5>Register Form</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register.perform') }}">
                            @csrf

                            <!-- Username -->
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username"
                                       aria-label="Name" value="{{ old('username') }}" required>
                                @error('username') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- First Name -->
                            <div class="mb-3">
                                <input type="text" name="firstname" class="form-control" placeholder="Enter firstname"
                                       aria-label="Firstname" value="{{ old('firstname') }}" required>
                                @error('firstname') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="mb-3">
                                <input type="text" name="lastname" class="form-control" placeholder="Enter lastname"
                                       aria-label="Lastname" value="{{ old('lastname') }}" required>
                                @error('lastname') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                       aria-label="Email" value="{{ old('email') }}" required>
                                @error('email') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                       aria-label="Password" required>
                                @error('password') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"
                                       aria-label="Password" required>
                                @error('password_confirmation') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Register Button -->
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                            </div>

                            <!-- Already Registered? -->
                            <p class="text-sm mt-3 mb-0">Already have an account?
                                <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign in</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('admin.layouts.footers.guest.footer')

@endsection
