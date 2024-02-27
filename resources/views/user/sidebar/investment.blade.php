<!DOCTYPE html>
<html lang="en">

<head>
    <title>Investment</title>
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
                <a class="nav-link" href="/investment">
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
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Investment</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Right side columns -->
                <div class="col-lg-12 col-12">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <div class="row justify-content-between">
                                            <div class="col">
                                                <h2 class="mb-4">My Investments</h2>
                                            </div>
                                            {{-- <div class="col-auto">
                                                <button type="button" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal" data-bs-target="#verticalycentered">Create
                                                    Investment</button>
                                            </div> --}}
                                            <hr>
                                        </div>
                                    </div>
                                        <table class="table table-responsive datatable">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Acc No.</th>
                                                    <th>Amount</th>
                                                    <th>Investment Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($investments as $row)
                                                    <tr>
                                                        <th scope="row">{{ $row->id }}</th>
                                                        <td>{{ number_format($row->amount, 2) }}</td>
                                                        <td>{{ $row->investment_date }}</td>
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
                                                            @endif

                                                        </td>
                                                        {{-- <td>
                                                            <li class="list-inline-item">
                                                                <button class="btn btn-danger btn-sm rounded"
                                                                    type="button" data-toggle="tooltip"
                                                                    data-placement="top" title="Delete"><i
                                                                        class="bi bi-x-lg"></i></button>
                                                            </li>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Website Traffic -->
            </div><!-- End Left side columns -->
        </section>

        {{-- <div class="modal fade" id="verticalycentered" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Investment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('investment.invest') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="amount">Amount:</label>
                                <input id="amount" type="number" placeholder="0.00" min="0"
                                    max="10000000" class="form-control" value="{{ old('amount') }}" required>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="investment_date">Investment Date:</label>
                                <input type="date" name="investment_date" id="investment_date"
                                    class="form-control" value="{{ old('investment_date') }}" required>
                                @error('investment_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create Investment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
