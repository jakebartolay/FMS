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
                        <a href="/admin/vendorlist" class="active">
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
                    <li class="breadcrumb-item active">Vendor List</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="container-fluid">
                <div class="row">
                    {{-- <!-- List Vendor Sales --> --}}
                    <div class="col-xxl-12 col-12">
                        <div class="card">
                            <div class="card-body"> 
                                <h5 class="card-title">Vendor List</h5>
                                <table id="example" class="table table-bordered" style="width: 100%">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th >Vendor</th>
                                            <th>Person</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Category</th>
                                            <th>Contract Start</th>
                                            <th>Contract End</th>
                                            <th>Payment Term</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->vendor_id }}</td>
                                                <td>{{ $row->vendor_name }}</td>
                                                <td>{{ $row->contact_person }}</td>
                                                <td>{{ $row->phone_number }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->address }}</td>
                                                <td>{{ $row->category }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->contract_start)->format('F d, Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($row->contract_end)->format('F d, Y') }}
                                                </td>
                                                <td>{{ $row->payment_terms }}</td>
                                                <td>
                                                    @if ($row->status == 'Approve')
                                                        <span class="badge bg-success">{{ $row->status }}</span>
                                                    @elseif($row->status == 'Decline')
                                                        <span class="badge bg-danger">{{ $row->status }}</span>
                                                    @elseif($row->status == 'Waiting')
                                                        <span class="badge bg-warning">{{ $row->status }}</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{ $row->status }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End List Vendor Sales --> 
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
