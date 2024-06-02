<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wallet</title>
    @include('layout.header')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('user.sidebar.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('user.sidebar.sidebarnav')
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h1>Dashboard</h1>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-between">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Wallet Deposit</li>
                        </ol>
                    </nav>
                    {{-- <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-outline-secondary rounded-pill btn-sm me-2" href="dashboard">Investment</a>
                        <a class="btn btn-primary rounded-pill btn-sm" href="#deposit">Deposit</a>
                    </div> --}}
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section profile dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        {{-- <!-- Balance Activity -->
                        <div class="col-xxl-3 col-12">
                            
                                <div class="card-body">
                                    <h5 class="card-title">Wallet</h5>
                                    <div class="row g-5 d-flex justify-content-between">
                                        <div class="col-7">
                                            <div class="card border pt-4">
                                            <div class="card-body">
                                            <h6 class="text-success fw-bold">Balance</h6>
                                            <span class="text-primary">${{ $formattedBalance }}</span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                          
                        </div><!-- Balance Activity --> --}}

                        <!-- Right side columns -->
                        <div class="col-lg-12 col-12" id="deposit">
                            <!-- Website Traffic -->

                            <div class="card-body">
                                <h5 class="card-title">Deposit into your wallet</h5>
                                <div class="row gy-4">

                                    <div class="col-xl-12 col-md-12">
                                        <div class="row">

                                            <div class="col-xxl-3 col-md-6 col-12">
                                                <div class="card border py-2">
                                                    <div class="card-body text-center">
                                                        <img src="assets/logo/paypal.jpg"
                                                            class="border border-circle rounded-circle"
                                                            alt="logo payment" width="100px" height="100px"
                                                            srcset="">
                                                        <div class="my-3">
                                                            <span class="fs-6 text-muted py-5">Deposit Using Paypal</span>
                                                        </div>
                                                        <a href="{{ route('paypal') }}" class="btn btn-primary">Deposit</a>
                                                    </div>
                                                </div>
                                            </div>

                                           {{-- <div class="col-xxl-3 col-md-6 col-12">
                                                <div class="card border py-2">
                                                    <div class="card-body text-center">
                                                        <img src="assets/logo/gcash.jpg"
                                                            class="border border-circle rounded-circle"
                                                            alt="logo payment" width="100px" height="100px"
                                                            srcset="">
                                                        <div class="my-3">
                                                            <span class="fs-6 text-muted py-5">Pay using Gcash
                                                                payment
                                                                gateway</span>
                                                        </div>
                                                        <a href="/maintenance" class="btn btn-primary">Pay with
                                                            Gcash</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3 col-md-6 col-12">
                                                <div class="card border py-2">
                                                    <div class="card-body text-center">
                                                        <img src="assets/logo/maya.jpg"
                                                            class="border border-circle rounded-circle"
                                                            alt="logo payment" width="100px" height="100px"
                                                            srcset="">
                                                        <div class="my-3">
                                                            <span class="fs-6 text-muted py-5">Pay with Paymaya
                                                                payment
                                                                gateway</span>
                                                        </div>
                                                        <a href="/maintenance" class="btn btn-primary">Pay with
                                                            Paymaya</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3 col-md-6 col-12">
                                                <div class="card border py-2">
                                                    <div class="card-body text-center">
                                                        <img src="assets/logo/hellomoney.png"
                                                            class="border border-circle rounded-circle"
                                                            alt="logo payment" width="100px" height="100px"
                                                            srcset="">
                                                        <div class="my-3">
                                                            <span class="fs-6 text-muted py-5">Pay with Hello Money
                                                                payment
                                                                gateway</span>
                                                        </div>
                                                        <a href="/maintenance" class="btn btn-primary">Pay with HM</a>
                                                    </div>
                                                </div>
                                            </div> --}}
 
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Website Traffic -->

                    </div><!-- End Right side columns -->
                </div>
                {{-- <div class="col-lg-12">
                    <div class="row">

                        <!-- Investment Card -->
                        <div class="col-xxl-12 col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Available Packages</h5>
                                    <div class="row">
                                        <div class="col-xxl-12 col-md-12 col-12">
                                            <a href="">
                                                <div class="alert alert-primary d-flex align-items-center shadow-lg"
                                                    role="alert">
                                                    <i class="bi bi-exclamation-circle-fill me-3"> </i>
                                                    <div>
                                                        <span href="/profile"> Please, click here to update your profile before you can
                                                            invest.</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div><!-- End Investment Card -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Investment Card -->

                    </div><!-- End Right side columns -->
                </div> --}}

                <div class="col-lg-12">
                    <div class="row">

                        <!-- Investment Card -->
                        <div class="col-xxl-12 col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Deposit Status</h5>
                                    <span class="break"></span>
                                    <div class="container-fluid">
                                        <table class="table datatable" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Acc Name</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transactions as $row)
                                                    <tr>
                                                        <th scope="row">{{ $row->user_id }}</th>
                                                        <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                                                        <td>${{ number_format($row->amount, 2) }}</td>
                                                        <td><span class="badge bg-success">{{ $row->type }}</span></td>
                                                        <td>{{ \Carbon\Carbon::parse($row->created_at)->format('F j, Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Investment Card -->
                    </div><!-- End Right side columns -->
                </div>
            </div><!-- End Left side columns -->
        </section>

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
