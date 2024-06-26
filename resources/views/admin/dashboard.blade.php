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

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item">
                    <form id="timeForm me-2">
                        <div>
                            <span id="horas" class="fw-bold">Loading...</span>
                            <br>
                        </div>
                    </form>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">0</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 0 new notifications
                            {{-- <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a> --}}
                        </li>
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li> --}}

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                {{-- <li class="nav-item dropdown">

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
                                <img src="../assets/img/messages-2.jpg" alt="" class="rounded-circle p-5"
                                    style="width: 10px;">
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

                </li><!-- End Messages Nav --> --}}

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="../assets/img/superadmin.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ $user->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ $user->name }}</h6>
                            <span>Administration</span>
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
                <a class="nav-link" href="/admin/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Management</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-person-fill-gear"></i><span>Vendor Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    {{-- <li>
                        <a href="/admin/vendoradd">
                            <i class="bi bi-circle"></i><span>Vendor Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendorview">
                            <i class="bi bi-circle"></i><span>Vendor Manage</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="/admin/vendorlist">
                            <i class="bi bi-circle"></i><span>Vendor List</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-cash-coin"></i><span>Investment Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    {{-- <li>
                        <a href="/admin/create">
                            <i class="bi bi-circle"></i><span>Create Investment</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="/admin/investoraccount">
                            <i class="bi bi-circle"></i><span>Investor Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/investments">
                            <i class="bi bi-circle"></i><span>Investment</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/deposit">
                            <i class="bi bi-circle"></i><span>Deposit</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="pagetitle">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Vendor Management</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->

                        <!-- Vendor Card -->
                        <a href="{{ route('vendorList') }}">
                            <div class="col-xxl-3 col-md-6 col-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Vendor Account</h5>
                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-person-fill-check"></i>
                                            </div>
                                            <div class="ps-3">
                                                <span id="vendorCount" class="text-black pt-1 fw-bold">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>                                               
                        <!-- End Vendor Card -->

                        <script>
                            // Fetch data from the API endpoint
                            fetch('https://fms7-apar.fguardians-fms.com/api/vendor')
                                .then(response => response.json())
                                .then(data => {
                                    // Count the number of vendors
                                    const vendorCount = data.vendor.length;
                                    // Display the count in the designated element
                                    document.getElementById('vendorCount').textContent = vendorCount;
                                })
                                .catch(error => console.error('Error fetching data:', error));
                        </script>
                        


                        <!-- Vendor Card -->
                        {{-- <div class="col-xxl-3 col-md-6 col-6">
                            <div class="card info-card warning-card">
                                <div class="card-body">
                                    <h5 class="card-title">Withdrawal</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-down"></i>
                                        </div>
                                        <div class="ps-3">
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Vendor Card --> --}}

                        <!-- Vendor Card -->
                        {{-- <div class="col-xxl-3 col-md-6 col-12">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Investment </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-lines-fill"></i>
                                        </div>
                                        <div class="ps-3">
 
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Vendor Card --> --}}

                        <!-- Vendor Card -->
                        {{-- <div class="col-xxl-3 col-md-6 col-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Deposits</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-up"></i>
                                        </div>
                                        <div class="ps-3">
                    
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- End Vendor Card --> --}}

                        <div class="pagetitle">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Investment Management</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->

                        <!-- Investment Card -->
       
                        <div class="col-xxl-3 col-md-6 col-6">
                            <a href="{{ route('investorAcc') }}">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Investor Account</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-check"></i>
                                        </div>
                                        <div class="ps-3">
                                            <span id="investorCount"
                                            class="text-black pt-1 fw-bold">Loading...</span>
                                            {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
           
                        <!-- End Investment Card -->

                        <script>
                        // Display loading text initially
                        document.getElementById('investorCount').textContent = 'Loading...';

                        // Fetch data from the API endpoint
                        fetch('http://127.0.0.1:8000/api/investor/users')
                            .then(response => {
                                console.log('Response status:', response.status);
                                return response.json();
                            })
                            .then(data => {
                                console.log('Fetched data:', data);
                                // Extract the "users" object from the response
                                const usersObject = data.users;
                                // Count the number of users
                                const investorCount = Object.keys(usersObject).length;
                                // Display the count
                                document.getElementById('investorCount').textContent = investorCount;
                            })
                            .catch(error => {
                                // Display error message if fetching fails
                                console.error('Error fetching data:', error);
                                document.getElementById('investorCount').textContent = 'Error fetching data';
                            });

                        </script>


                        <!-- Investment Card -->
                       
                        <div class="col-xxl-3 col-md-6 col-6">
                            <a href="">
                            <div class="card info-card warning-card">
                                <div class="card-body">
                                    <h5 class="card-title">Withdrawal</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-down"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>${{ number_format($data, 2, '.', ',') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                   <!-- End Investment Card -->

                        <!-- Investment Card -->
                       
                        <div class="col-xxl-3 col-md-6 col-12">
                            <a href="">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Investment </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-lines-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>${{ number_format($investment, 2, '.', ',') }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                        </div>
                   <!-- End Investment Card -->

                        <!-- Investment Card -->
                       
                        <div class="col-xxl-3 col-md-6 col-12">
                            <a href="">
                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Deposits</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-up"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>${{ number_format($countBalance, 2, '.', ',') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div><!-- End Investment Card -->


                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i>
    </a>

    @include('layout.javascript')
</body>

</html>
