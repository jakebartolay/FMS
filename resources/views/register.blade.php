<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    @include('layout.header')
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-12 d-flex flex-column align-items-center justify-content-center">

                            @include('layout.logo2')
                            <br>

                            <div class="card mb-3 shadow-lg">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <p style="color:red;">{{ $error }}</p>
                                        @endforeach
                                    @endif
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="col-6">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" name="firstname" class="form-control" id="firstname"
                                                required placeholder="First Name">
                                            <div class="invalid-feedback">Please, enter your Firstname!</div>
                                        </div>

                                        <div class="col-6">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" name="lastname" class="form-control" id="lastname"
                                                required placeholder="Last Name">
                                            <div class="invalid-feedback">Please, enter your Lastname!</div>
                                        </div>


                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" class="form-control"
                                                    id="yourEmail" required placeholder="example@gmail.com">
                                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required placeholder="Password">
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-6">
                                            <label for="password_confirmation" class="form-label">Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="password_confirmation" required placeholder="Re-enter Password">
                                            <div class="invalid-feedback">Please Re-enter Password!</div>
                                        </div>

                                        <div class="row pt-3 justify-content-center align-items-center">
                                        <div class="col-6 ">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>                                       
                                        </div>
                                        <div class="text-center col-12">
                                            <p class="small mb-0">Already have an account? <a href="/login">Log in</a>
                                            </p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <span class="text-muted">-----or-----</span>
                            <div class="text-center pt-3">
                                <img src="{{ url('assets/logo/google.png') }}" class="img-fluid" width="25px" height="25px" alt="Google Logo">
                                <a href="{{ url('auth/google') }}">Login using Google</a>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

            @include('layout.javascript')

</body>

</html>
