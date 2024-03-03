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

                </li><!-- End Notification Nav --> --}}

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
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ $user->firstname }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ $user->firstname }}</h6>
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
                <a class="nav-link collapsed" href="/admin/dashboard">
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
                    <li>
                        <a href="/admin/vendoradd">
                            <i class="bi bi-circle"></i><span>Vendor Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendormanage">
                            <i class="bi bi-circle"></i><span>Vendor Manage</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendorlist">
                            <i class="bi bi-circle"></i><span>Vendor List</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-cash-coin"></i><span>Investment Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav2" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    {{-- <li>
                        <a href="/admin/create">
                            <i class="bi bi-circle"></i><span>Create Investment</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="/admin/investments" class="active">
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
                    <li class="breadcrumb-item active">Investment</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title">Investment</div>
                                    <table id="example" class="table display"  width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Acc Name</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($InvestmentRequest as $row)
                                                <tr class="text-center">
                                                    <th scope="row">{{ $row->id }}</th>
                                                    <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                                                    <td>{{ number_format($row->amount, 2) }}</td>
                                                    <td>{{ $row->created_at->format('m-d-Y') }}</td>
                                                    <td>
                                                        @if ($row->status_name == 'Active')
                                                            <span
                                                                class="badge bg-success">{{ $row->status_name }}</span>
                                                        @elseif($row->status_name == 'Inactive')
                                                            <span class="badge bg-danger">{{ $row->status_name }}</span>
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
                                                    <td class="d-flex">
                                                        <a href="{{ route('approve.investemt', ['id' => $row->id]) }}" class="btn btn-primary btn-sm mr-3" title="Approve">
                                                            <i class="bi bi-check2"></i>
                                                        </a>
                                                        <a href="{{ route('cancel.investment', ['id' => $row->id]) }}" class="btn btn-warning btn-sm mr-3"
                                                            title="Cancel"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{-- <button type="button" class="btn btn-success btn-sm mr-2"><i class="bi bi-check2"></i></button>
                                    <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-x"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button> --}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
        {{-- <div class="modal fade" id="investmentapprove" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Approve</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($InvestmentRequest as $invest)
                            <form id="approveInvestForm{{ $invest->id }}"
                                action="{{ route('investment_requests.approve', $invest->id) }}" method="POST">
                                @csrf
                                @method('POST')

                            </form>
                        @endforeach
                    </div>
                    <h1>Are you sure you want to approve this Investment request?</h1>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary"
                            onclick="approveInvestRequest('approveInvestForm{{ $invest->id }}')">Confirm</button>
                    </div>
                    <script>
                        function approveInvestRequest(formId) {
                            document.getElementById(formId).submit();
                        }
                    </script>

                </div>
            </div>
        </div>

        <div class="modal fade" id="investmentcancel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($InvestmentRequest as $data)
                            <form id="cancelInvestForm{{ $data->id }}"
                                action="{{ route('investment_requests.cancel', ['id' => $data->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endforeach
                        <h1>Are you sure you want to Cancel this Investment request?</h1>
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
