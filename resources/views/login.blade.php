<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>
    @include('layout.header')
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            @include('layout.logo2')
                            <br>
                            <div class="card mb-3">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p style="color:red;">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <div class="card-body shadow-lg">

                                    <div class="pb-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <a class="btn btn-outline-primary btn-sm" href="/"><i
                                                        class="bi bi-arrow-left"></i></a>
                                            </div>
                                            <div class="col-8 col-lg-8">
                                                <h5 class="card-title text-center pb-0 fs-4">Investor Login</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <form class="row g-3 needs-validation" action="{{ route('login') }}" novalidate
                                        method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="example@gmail.com" required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" placeholder="password" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            value="true" id="rememberMe">
                                                        <label class="form-check-label" for="rememberMe">Remember
                                                            me</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-end">
                                                        <a href="/forgot-password">Forgot Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var rememberMeCheckbox = document.getElementById('rememberMe');
                                                var rememberMeValue = localStorage.getItem('rememberMe');

                                                if (rememberMeValue === 'true') {
                                                    rememberMeCheckbox.checked = true;
                                                }
                                            });
                                        </script>
                                        <div class="row justify-content-center align-items-center pt-3">

                                            <div class="col-6">
                                                <button class="btn btn-primary w-100" type="submit"
                                                    src="/admin/dashboard">Login</button>
                                            </div>

                                        </div>
                                        <div class="col-12 text-center">
                                            <p class="small mb-0">Don't have ? <a href="/register">Create an
                                                    account</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <span class="text-muted">-----or-----</span>
                            <div class="text-center pt-3">
                                <a href="{{ url('auth/google') }}">
                                    <img src="{{ url('assets/logo/google.png') }}" class="img-fluid" width="25px"
                                        height="25px" alt="Google Logo">
                                </a>
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
