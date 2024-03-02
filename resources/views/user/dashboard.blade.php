<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dasboard</title>
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
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            @if ($user->firstname)
                                {{ $user->firstname }}
                            @elseif($user->lastname)
                                {{ $user->lastname }}
                            @else
                                {{ $user->email }}
                            @endif
                        </span>

                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>
                                @if ($user->firstname)
                                    {{ $user->firstname }}
                                @elseif($user->lastname)
                                    {{ $user->lastname }}
                                @else
                                    {{ $user->email }}
                                @endif
                            </h6>
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
                <a class="nav-link" href="/">
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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-outline-secondary rounded-pill btn-sm me-2" href="#invest">Investment</a>
                        <a class="btn btn-primary rounded-pill btn-sm" href="/wallet">Deposit</a>
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
                                            <h6 class="text-primary fw-bold">{{ $payouts }}</h6>
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

                        <!-- Reports -->
                        <div class="col-lg-7 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Investment Statistics</h5>

                                    <!-- Line Chart -->
                                    <div id="lineChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(document.querySelector("#lineChart"), {
                                                series: [{
                                                    // name: "Investment",
                                                    // data: [10, 41, 35, 51, 49, 62, 69, 91, 148]

                                                    name: "Investment",
                                                    data: {!! $chartData !!}
                                                }],
                                                chart: {
                                                    height: 350,
                                                    type: 'line',
                                                    zoom: {
                                                        enabled: false
                                                    }
                                                },
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                stroke: {
                                                    curve: 'straight'
                                                },
                                                grid: {
                                                    row: {
                                                        colors: ['#f3f3f3',
                                                            'transparent'
                                                        ], // takes an array which will be repeated on columns
                                                        opacity: 0.5
                                                    },
                                                },
                                                xaxis: {
                                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                                        'Jul', 'Aug', 'Sep'
                                                    ],
                                                }
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>
                            </div>
                        </div><!-- End Reports -->

                        <!-- Right side columns -->
                        <div class="col-lg-5 col-12">

                            <!-- Website Traffic -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Withdrawal Stats</h5>
                                    <h5 class="mx-2 fw-bold text-primary">${{ $payoutcount }}</h5>
                                    <!-- Line Chart -->
                                    <div id="lineChart2"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(document.querySelector("#lineChart2"), {
                                                series: [{
                                                    name: "Withdrawals",
                                                    // data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                                                    data: {!! $payout !!}
                                                }],
                                                chart: {
                                                    height: 350,
                                                    type: 'line',
                                                    zoom: {
                                                        enabled: false
                                                    }
                                                },
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                stroke: {
                                                    curve: 'straight'
                                                },
                                                grid: {
                                                    row: {
                                                        colors: ['#f3f3f3',
                                                            'transparent'
                                                        ], // takes an array which will be repeated on columns
                                                        opacity: 0.5
                                                    },
                                                },
                                                xaxis: {
                                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                                        'Jul', 'Aug', 'Sep'
                                                    ],
                                                }
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>


                            </div>
                        </div><!-- End Website Traffic -->

                    </div><!-- End Right side columns -->
                </div>
                <!-- Right side columns -->
                <div class="col-lg-12 col-12" id="invest">
                    <!-- Website Traffic -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Investment</h5>
                            <div class="row g-4">

                                <div class="col-xl-12 col-md-12">
                                    <div class="row">

                                        <div class="col-xxl-3 col-md-6 col-12">
                                            <div class="card border py-3">
                                                <div class="card-body text-center">
                                                    <img src="assets/img/companylogo/coca-cola-logo.png"
                                                        class="border border-circle rounded-circle" alt="logo payment"
                                                        width="100px" height="100px" srcset="">
                                                    <div class="my-3">
                                                        <span class="fs-6 text-muted py-5">Coca Cola</span>
                                                    </div>
                                                    <a href="/invest" class="btn btn-primary">Invest</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-6 col-12">
                                            <div class="card border py-3">
                                                <div class="card-body text-center">
                                                    <img src="assets/img/companylogo/mcdonalds-logo.png"
                                                        class="border border-circle rounded-circle" alt="logo payment"
                                                        width="100px" height="100px" srcset="">
                                                    <div class="my-3">
                                                        <span class="fs-6 text-muted py-5">McDonals</span>
                                                    </div>
                                                    <a href="#" class="btn btn-primary">Invest</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-6  col-12">
                                            <div class="card border py-3">
                                                <div class="card-body text-center">
                                                    <img src="assets/img/companylogo/samsung-logo.png"
                                                        class="border border-circle rounded-circle" alt="logo payment"
                                                        width="100px" height="100px" srcset="">
                                                    <div class="my-3">
                                                        <span class="fs-6 text-muted py-5">Samsung</span>
                                                    </div>
                                                    <a href="#" class="btn btn-primary">Invest</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-6 col-12">
                                            <div class="card border py-3">
                                                <div class="card-body text-center">
                                                    <img src="assets/img/companylogo/toyota-logo.png"
                                                        class="border border-circle rounded-circle" alt="logo payment"
                                                        width="100px" height="100px" srcset="">
                                                    <div class=" my-3">
                                                        <span class="fs-6 text-muted py-5">Toyota</span>
                                                    </div>
                                                    <a href="#" class="btn btn-primary">Invest</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- End Website Traffic -->
                {{-- <div class="col-lg-12">
                    <div class="row">

                        <!-- Investment Card -->
                        <div class="col-xxl-12 col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Log History</h5>
                                    <span class="break"></span>
                                    <div class="container-fluid">
                                        <table class="table table-striped datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Actions</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- @foreach ($activityLog as $data)
                                                    <tr>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->description }}</td>
                                                    <td>{{ $data->date_time }}</td>
                                                </tr>
                                                @endforeach -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Investment Card -->
                    </div><!-- End Right side columns -->
                </div> --}}
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
