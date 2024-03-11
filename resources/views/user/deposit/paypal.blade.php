<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deposit Paypal</title>
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
                <a class="nav-link collapse" href="/wallet">
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
                    <span>My Investments</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/withdrawals">
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
                    <li class="breadcrumb-item active">Paypal Payment</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row justify-content-center">

                        <!-- Investment Card -->
                        <div class="col-xxl-6 col-md-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Deposit Using Paypal</h6>
                                    <hr>
                                    <div class="row d-flex align-items-center justify-content-center ">
                                        <div class="col-8">
                                            <form method="POST" action="{{ route('deposit') }}">
                                            @csrf
                                            <div>
                                                <label for="amount">Amount to Deposit</label>
                                                <input id="amount" name="amount" placeholder="ex.10,000"
                                                    type="text" class="form-control" required maxlength="6">
                                            </div>
                                            <div class="text-center pt-2">
                                                <button type="submit" class="btn btn-primary">Deposit</button>
                                            </div>
                                            </form>
                                        </div>
                                        <div class="col-4">
                                            <img src="assets/logo/paypal.jpg" width="100px" height="100px"
                                                alt="paypal" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Investment Card -->

                    </div><!-- End Right side columns -->
                </div>

            </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
