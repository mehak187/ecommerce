<!DOCTYPE html>
<html lang="en">
<head>
	@include('/files/links')
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <section class="sign-sec">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-6 pe-5">
                    <img src="{{asset('assets/img/signin.svg')}}" alt="">
                </div>
                <div class="col-6">
                   <h1 class="text-center fw-normal fs-1">
                        Sign Up
                   </h1>
                   <form action="/saveReg" method="POST" enctype="multipart/form-data">
                    @if(session('success'))
                        <p class="py-2 px-3 bg-success text-white my-3 rounded">
                            {{session('success')}} 
                        </p>
                    @endif
                    @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fs-5">Name</label>
                            <input type="name" name="name" class="form-control" id="name" placeholder="Your Name" value="{{ old('name') }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fs-5">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="{{ old('emmail') }}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label fs-5">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="0300124567" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label fs-5">Password</label>
                            <input type="password" name="password" class="form-control" id="pass" >
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="repass" class="form-label fs-5">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="repass" >
                            @error('confirm_password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="profile" class="form-label fs-5">Upload Photo</label>
                            <input type="file" name="photo" class="form-control" id="profile" >
                            @error('photo')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <p>Already have an account <a href="signin">Signin</a></p>
                        <div class="my-4">
                            <button type="submit" class="py-2 m-0 border-0 w-100 rounded-3 bg-success text-light fs-5">
                                Register
                            </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>