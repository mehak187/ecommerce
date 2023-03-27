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
            <div class="row align-items-center py-4">
                <div class="col-6 pe-5">
                    <img src="{{asset('assets/img/signin.svg')}}" alt="">
                </div>
                <div class="col-6">
                   <h1 class="text-center fw-normal fs-1">
                        Sign In
                   </h1>
                   <form action="/saveLogin" method="POST" enctype="multipart/form-data">
                        @if(session('error'))
                        <p class="py-2 px-3 bg-danger text-white my-3 rounded">
                            {{session('error')}} 
                        </p>
                         @endif   
                         @if(session('emailError'))
                         <p class="py-2 px-3 bg-danger text-white my-3 rounded">
                             {{session('emailError')}} 
                         </p>
                          @endif  
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fs-5" value="{{ old('email') }}">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                            @error('email')
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
                        <p class="">Dont have an account <a href="signup">Signup</a></p>
                        <div class="my-4">
                            <button type="submit" class="py-2 m-0 border-0 w-100 bg-success text-light rounded-3 fs-5">
                                Login 
                            </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>