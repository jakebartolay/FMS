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
                <a class="nav-link" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
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
                        <a href="/admin/vendor-selection" class="active">
                            <i class="bi bi-circle"></i><span>Vendor Selection</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendor-approval">
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
                    <i class="bi bi-cash-coin"></i><span>Investment Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
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
                    <li class="breadcrumb-item active">Vendor Selection</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">List Vendor <span>| Today</span></h5>
                                    <table class="table table-responsive table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Firstname</th>
                                                <th scope="col">Lastname</th>
                                                <th scope="col">Company Name</th>
                                                <th scope="col">Company Address</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td> 
                                                <td>{{ $row->firstname }}</td>
                                                <td>{{ $row->lastname }}</td>
                                                <td>{{ $row->company_name }}</td>
                                                <td>{{ $row->company_address }}</td>
                                                <td><span class="badge bg-secondary">{{ $row->status }}</span></td>
                                            </tr>
                                            @endforeach
                                            {{-- <td><span class="badge bg-secondary">Pending</span></td> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->

                <!-- Reports -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Vendor Selection <span>| Create</span></h5>
                        </div>
                    </div>
                </div><!-- End Reports -->
            </div>
        </section>

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
