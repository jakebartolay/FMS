<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wallet</title>
    @include('layout.header')
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        @include('layout.logo')
        <i class="bi bi-list toggle-sidebar-btn"></i>


        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                {{-- <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">0</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 0 new notifications
                            <!-- <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a> -->
                        </li>
                        <!-- <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li> -->

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav --> --}}

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="../assets/img/superadmin.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ $user->firstname }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ $user->firstname }}</h6>
                            <span>{{ $roleName }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/profile">
                                <i class="bi bi-person-fill"></i>
                                <span>My Profile</span>
                            </a>
                        </li><!-- End Contact Page Nav -->

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

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
                <a class="nav-link" href="/wallet">
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
            <div class="row">
                <div class="d-flex justify-content-between">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Wallet Deposit</li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-outline-secondary rounded-pill btn-sm me-2" href="/investment">Investment</a>
                        <a class="btn btn-primary rounded-pill btn-sm" href="#deposit">Deposit</a>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section profile dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Investment Card -->
                        <div class="col-xxl-6 col-md-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Overall statistics</h5>
                                    <div class="row d-flex align-items-center justify-content-center text-center">
                                        <div class="col-6">
                                            <h6 class="text-primary fw-bold">{{ $invest }}</h6>
                                            <span class="text-secondary">Investment</span>
                                            <hr>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-primary fw-bold">0</h6>
                                            <span class="text-secondary">Withdrawal</span>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Investment Card -->

                        <!-- Balance Activity -->
                        <div class="col-xxl-6 col-md-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Balances</h5>
                                    <div class="row g-5 d-flex justify-content-between">
                                        <div class="col-6">
                                            <h6 class="text-success fw-bold">WALLET</h6>
                                            <span class="text-primary">${{ $formattedBalance }}</span>
                                            <hr>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-success fw-bold">EARNING</h6>
                                            <span class="text-primary">$0.00</span>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Balance Activity -->

                        <!-- Right side columns -->
                        <div class="col-lg-12 col-12" id="deposit">
                            <!-- Website Traffic -->
                            <div class="card">
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
                                                                <span class="fs-6 text-muted py-5">Pay using Paypal
                                                                    payment
                                                                    gateway</span>
                                                            </div>
                                                            <a href="/paywithpaypal" class="btn btn-primary">Pay with
                                                                Paypal</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6 col-12">
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
                                                            <a href="#" class="btn btn-primary">Pay with
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
                                                            <a href="#" class="btn btn-primary">Pay with
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
                                                            <a href="#" class="btn btn-primary">Pay with HM</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
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
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($depositrequest as $row)
                                                    <tr>
                                                        <th scope="row">{{ $row->id }}</th>
                                                        <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                                                        <td>{{ number_format($row->amount, 2) }}</td>
                                                        <td>{{ $row->created_at->toDateString() }}</td>
                                                        <td>
                                                            @if ($row->status_name == 'Active')
                                                                <span
                                                                    class="badge bg-success">{{ $row->status_name }}</span>
                                                            @elseif($row->status_name == 'Inactive')
                                                                <span
                                                                    class="badge bg-danger">{{ $row->status_name }}</span>
                                                            @elseif($row->status_name == 'Pending')
                                                                <span
                                                                    class="badge bg-warning text-dark">{{ $row->status_name }}</span>
                                                            @elseif($row->status_name == 'Completed')
                                                                <span
                                                                    class="badge bg-primary">{{ $row->status_name }}</span>
                                                            @elseif($row->status_name == 'Cancelled')
                                                                <span
                                                                    class="badge bg-secondary">{{ $row->status_name }}</span>
                                                            @elseif($row->status_name == 'Suspended')
                                                                <span
                                                                    class="badge bg-info">{{ $row->status_name }}</span>
                                                            @elseif($row->status_name == 'Failed')
                                                                <span
                                                                    class="badge bg-dark">{{ $row->status_name }}</span>
                                                            @elseif($row->status_name == 'Refunded')
                                                                <span
                                                                    class="badge bg-light text-dark">{{ $row->status_name }}</span>
                                                                    @elseif($row->status_name == 'Approve')
                                                                    <span
                                                                        class="badge bg-primary">{{ $row->status_name }}</span>
                                                                @elseif($row->status_name == 'Cancel')
                                                                    <span
                                                                        class="badge bg-warning text-black">{{ $row->status_name }}</span>
                                                                @elseif($row->status_name == 'Delete')
                                                                    <span
                                                                        class="badge bg-danger text-white">{{ $row->status_name }}</span>
                                                                @endif
                                                        </td>
                                                        {{-- <td>
                                                            <button type="button" class="btn btn-warning btn-sm mr-3"
                                                                title="Cancel" data-bs-toggle="modal"
                                                                data-bs-target="#cancel"><i
                                                                    class="bi bi-pencil-square"></i></button>
                                                        </td> --}}
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
            </div>
        </section>

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
