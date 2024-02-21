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

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="../assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="../assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="../assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="../assets/img/superadmin.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ $user->name }}</h6>
                            <span>Investor</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/">
                                <i class="bi bi-gear"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/admin/pages-faq">
                                <i class="bi bi-question-circle"></i>
                                <span>Deposit</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/admin/pages-faq">
                                <i class="bi bi-question-circle"></i>
                                <span>Transper Fund</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/admin/pages-faq">
                                <i class="bi bi-question-circle"></i>
                                <span>My Investment</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/admin/pages-faq">
                                <i class="bi bi-question-circle"></i>
                                <span>Withdrawal</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/admin/pages-faq">
                                <i class="bi bi-question-circle"></i>
                                <span>Contract Support</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

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
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/pages-contact">
                    <i class="bi bi-envelope"></i>
                    <span>My Profile</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/pages-contact">
                    <i class="bi bi-envelope"></i>
                    <span>wallet</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/pages-contact">
                    <i class="bi bi-envelope"></i>
                    <span>Transfer fund</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/pages-contact">
                    <i class="bi bi-envelope"></i>
                    <span>My Investment</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/pages-contact">
                    <i class="bi bi-envelope"></i>
                    <span>Withdrawals</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/pages-contact">
                    <i class="bi bi-envelope"></i>
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
                        <span class="btn btn-outline-secondary rounded-pill btn-sm me-2">Investment</span>
                        <span class="btn btn-primary rounded-pill btn-sm">Deposit</span>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
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
                                            <h6 class="text-primary fw-bold">0</h6>
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
                                            <span class="text-primary">$0.00</span>
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
                        <div class="col-7">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Investment Statistics</h5>

                                    <!-- Line Chart -->
                                    <div id="lineChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(document.querySelector("#lineChart"), {
                                                series: [{
                                                    name: "Desktops",
                                                    // data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
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
                                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                                                }
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>
                            </div>
                        </div><!-- End Reports -->

                        <!-- Right side columns -->
                        <div class="col-5">

                            <!-- Website Traffic -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Withdrawal Stats</h5>
                                    <h5 class="mx-2 fw-bold text-primary">$ 0</h5>
                                    <!-- Line Chart -->
                                    <div id="lineChart2"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(document.querySelector("#lineChart2"), {
                                                series: [{
                                                    name: "Desktops",
                                                    // data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
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
                                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
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
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Investment Card -->
                        <div class="col-xxl-12 col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Available Packages</h5>
                                    <a href="">
                                        <div class="alert alert-primary d-flex align-items-center shadow-lg"
                                            role="alert">
                                            <i class="bi bi-exclamation-circle-fill"> </i>
                                            <div>
                                                <span> Please, click here to update your profile before you can
                                                    invest.</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- End Investment Card -->

                    </div><!-- End Right side columns -->
                </div>

                <div class="col-lg-12">
                    <div class="row">

                        <!-- Investment Card -->
                        <div class="col-xxl-12 col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Log History</h5>
                                    <span class="break"></span>
                                    <div class="text-center">
                                        <table class="table table-striped dataTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Description</th>
                                                    <th>Date Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($activityLog as $key => $data)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->description }}</td>
                                                    <td>{{ $data->date_time }}</td>
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
