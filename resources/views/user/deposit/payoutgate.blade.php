<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Gateways</title>
    @include('layout.header')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('user.sidebar.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/wallet">
                    <i class="bi bi-credit-card-fill"></i>
                    <span>Wallet Deposit</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/transaction">
                    <i class="bi bi-send-fill"></i>
                    <span>Transfer fund</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/investment">
                    <i class="bi bi-folder-fill"></i>
                    <span>My Investment</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link" href="/withdrawals">
                    <i class="bi bi-database-fill-down"></i>
                    <span>Withdrawals</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/contactsupport">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Contact Support</span>
                </a>
            </li><!-- End Contact Page Nav -->
            {{-- <li class="nav-heading">Example</li> --}}

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h1>Dashboard</h1>
                </div>
            </div>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Payouts Gateways</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Right side columns -->
                <div class="col-lg-12 col-12" id="deposit">
                    <!-- Website Traffic -->
 
                        <div class="card-body">
                            <h5 class="card-title">Payouts Gateways</h5>
                            <div class="row gy-4">

                                <div class="col-xl-12 col-md-12">
                                    <div class="row">

                                        <div class="col-xxl-3 col-md-6 col-12">
                                            <div class="card border py-2">
                                                <div class="card-body text-center">
                                                    <img src="assets/logo/paypal.jpg"
                                                        class="border border-circle rounded-circle" alt="logo payment"
                                                        width="100px" height="100px" srcset="">
                                                    <div class="my-3">
                                                        <span class="fs-6 text-muted py-5">Payout using Paypal
                                                            payment
                                                            gateway</span>
                                                    </div>
                                                    <a href="{{ route('payout.paypal') }}" class="btn btn-primary">Payout
                                                        Paypal</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-6 col-12">
                                            <div class="card border py-2">
                                                <div class="card-body text-center">
                                                    <img src="assets/logo/gcash.jpg"
                                                        class="border border-circle rounded-circle" alt="logo payment"
                                                        width="100px" height="100px" srcset="">
                                                    <div class="my-3">
                                                        <span class="fs-6 text-muted py-5">Pay using Gcash
                                                            payment
                                                            gateway</span>
                                                    </div>
                                                    <a href="{{ route('maintenance') }}" class="btn btn-primary">Pay with
                                                        Gcash</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-6 col-12">
                                            <div class="card border py-2">
                                                <div class="card-body text-center">
                                                    <img src="assets/logo/maya.jpg"
                                                        class="border border-circle rounded-circle" alt="logo payment"
                                                        width="100px" height="100px" srcset="">
                                                    <div class="my-3">
                                                        <span class="fs-6 text-muted py-5">Pay with Paymaya
                                                            payment
                                                            gateway</span>
                                                    </div>
                                                    <a href="{{ route('maintenance') }}" class="btn btn-primary">Pay with
                                                        Paymaya</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-6 col-12">
                                            <div class="card border py-2">
                                                <div class="card-body text-center">
                                                    <img src="assets/logo/hellomoney.png"
                                                        class="border border-circle rounded-circle" alt="logo payment"
                                                        width="100px" height="100px" srcset="">
                                                    <div class="my-3">
                                                        <span class="fs-6 text-muted py-5">Pay with Hello Money
                                                            payment
                                                            gateway</span>
                                                    </div>
                                                    <a href="{{ route('maintenance') }}" class="btn btn-primary">Pay with HM</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- End Website Traffic -->
            </div>
        </section>

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
