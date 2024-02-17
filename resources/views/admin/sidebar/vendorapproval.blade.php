<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $user->name }} | Dasboard</title>
    @include('layout.header')
</head>

<body>

    @include('admin.layout.navbar')

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Management</li>

            <li class="nav-item">
                <a class="nav-link" data-bs-target="#components-nav1" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-person-fill-gear"></i><span>Vendor Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav1" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin/performance-monitoring">
                            <i class="bi bi-circle"></i><span>Performance & Monitoring</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendor-selection">
                            <i class="bi bi-circle"></i><span>Vendor Selection</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendor-approval" class="active">
                            <i class="bi bi-circle"></i><span>Vendor Approval</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/negatiation-contract">
                            <i class="bi bi-circle"></i><span>Negatiation of Contract</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/invoicing-payment">
                            <i class="bi bi-circle"></i><span>Invoicing and Payment</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-cash-coin"></i><span>Investment Management</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin/investment-management">
                            <i class="bi bi-circle"></i><span>investment Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/investment-management">
                            <i class="bi bi-circle"></i><span>investment Management</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            {{-- <li class="nav-heading">Document</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/payment">
                    <i class="bi bi-credit-card-2-front-fill"></i>
                    <span>Request Contract</span>
                </a>
            </li><!-- End Dashboard Nav --> --}}
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Vendor Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Vendor Approval</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Account Card -->
                        <div class="col-xxl-3 col-md-3 col-6">
                            <div class="card info-card sales-card">
                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li class="dropdown-header text-start">
                                                    <h6>Filter</h6>
                                                </li>

                                                <li><a class="dropdown-item" href="#">Today</a></li>
                                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Account <span>| Today</span></h5>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-people"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $dataCount}}</h6>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div><!-- End Account Card -->

                        <!-- Approve Card -->
                        <div class="col-xxl-3 col-md-3 col-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Approve <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-check"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $approve }} </h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Approve Card -->

                        <!-- Decline Card -->
                        <div class="col-xxl-3 col-md-3 col-6">
                            <div class="card info-card decline-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Decline <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-dash"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $decline }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Decline Card -->

                        <!-- Waiting Card -->
                        <div class="col-xxl-3 col-md-3 col-6">
                            <div class="card info-card warning-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Waiting <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-fill-gear"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $waiting }} </h6>
                                            <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Waiting Card -->

                        <!-- List Vendor Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">List Vendor <span>| Today</span></h5>

                                    <table class="table table-responsive table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Vendor ID</th>
                                                <th scope="col">Firstname</th>
                                                <th scope="col">Lastname</th>
                                                <th scope="col">Company Name</th>
                                                <th scope="col">Company Address</th>
                                                <th scope="col">Company Contact</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Cost</th>
                                                <th scope="col">Spend</th>
                                                <th scope="col">Starting Date</th>
                                                <th scope="col">End Date</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <th scope="row">{{ $row->vendor_id }}</th> 
                                                <td>{{ $row->firstname }}</td>
                                                <td>{{ $row->lastname }}</td>
                                                <td>{{ $row->company_name }}</td>
                                                <td>{{ $row->address }}</td>
                                                <td>{{ $row->contact }}</td>
                                                <td>{{ $row->category }}</td>
                                                <td>{{ number_format($row->cost, 2) }}</td>
                                                <td>{{ number_format($row->spend, 2) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->starting_date)->toDateString() }}</td> <!-- Convert to Carbon instance -->
                                                <td>{{ \Carbon\Carbon::parse($row->end_date)->toDateString() }}</td> <!-- Convert to Carbon instance -->
                                                <td>
                                                    @if($row->status == 'Approve')
                                                        <span class="badge bg-success p-2">{{ $row->status }}</span>
                                                    @elseif($row->status == 'Decline')
                                                        <span class="badge bg-danger p-2">{{ $row->status }}</span>
                                                    @elseif($row->status == 'Waiting')
                                                        <span class="badge bg-warning p-2">{{ $row->status }}</span>
                                                    @else
                                                        <span class="badge bg-secondary p-2">{{ $row->status }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <td><span class="badge bg-secondary">Pending</span></td> --}}
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End List Vendor Sales -->

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
