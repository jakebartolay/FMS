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

                                    <div class=" pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Forgot Password</h5>
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

                                        <div class="row justify-content-center align-items-center pt-3">

                                            <div class="col-6">
                                                <button class="btn btn-primary w-100" type="submit"
                                                    src="/admin/dashboard">Confirm</button>
                                            </div>

                                        </div>
                                        <div class="col-12 text-center">
                                            <p class="small mb-0">Have account? <a href="/login">Login</a></p>
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

    @include('layout.javascript')

</body>

</html>
