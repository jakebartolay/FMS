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
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Account</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                {{-- <th>Actions</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invest as $row)
                                                <tr class="text-center">
                                                    <th scope="row">{{ $row->id }}</th>
                                                    <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                                                    <td>{{ number_format($row->amount, 2) }}</td>
                                                    <td>{{ $row->created_at->format('m-d-y') }}</td>
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
                                                            <span class="badge bg-info">{{ $row->status_name }}</span>
                                                        @elseif($row->status_name == 'Failed')
                                                            <span class="badge bg-dark">{{ $row->status_name }}</span>
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
                                                            data-bs-target="#investmentcancel"><i
                                                                class="bi bi-pencil-square"></i></button>
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
        {{-- 
        <div class="modal fade" id="investmentcancel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($invest as $data)
                        <form id="cancelInvestForm{{ $data->id }}"
                            action="{{ route('investment_requests.cancel', ['id' => $data->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endforeach
                        <h1>Are you sure you want to Cancel this Investment?</h1>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary"
                                onclick="cancelInvestRequest('cancelInvestForm{{ $data->id }}')">Confirm</button>
                        </div>
                    </div>

                    <script>
                        function cancelInvestRequest(formId) {
                            document.getElementById(formId).submit();
                        }
                    </script>

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
