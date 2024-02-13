<!DOCTYPE html>
<html lang="en">

<head>

    <title>Register</title>
    @include('layout.header')
    <!-- Favicons -->
    <link href="assets/img/logo2.png" rel="icon">
    <link href="assets/img/logo2.png" rel="apple-touch-icon">
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            @include('layout.logo')
                            <br>

                            <div class="card mb-3">

                                <div class="card-body">

                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <p style="color:red;">{{ $error }}</p>
                                        @endforeach
                                    @endif

                                    @if (Session::has('success'))
                                        <p style="color:green;">{{ Session::get('success') }}</p>
                                    @endif

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Your Name</label>
                                            <input type="text" name="name" class="form-control" id="yourName"
                                                required placeholder="Enter Name">
                                            <div class="invalid-feedback">Please, enter your name!</div>
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

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required placeholder="Password">
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password_confirmation" class="form-label">Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="password_confirmation" required placeholder="Re-enter Password">
                                            <div class="invalid-feedback">Please Re-enter Password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox"
                                                    value="" id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a href="/login">Log in</a>
                                            </p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
