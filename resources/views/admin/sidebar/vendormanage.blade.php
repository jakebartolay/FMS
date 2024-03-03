<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vendor Manage</title>
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
                <a class="nav-link" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-fill-gear"></i><span>Vendor Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav1" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin/vendoradd">
                            <i class="bi bi-circle"></i><span>Vendor Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendormanage" class="active">
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
                    <li class="breadcrumb-item active">Vendor View</li>
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
                                <h5 class="card-title">Vendor Manage</h5>
                                <table id="example" class="table display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ date('m-d-Y', strtotime($row->join_date)) }}</td>
                                            <td>
                                                @if ($row->role_name == 'Vendor' || $row->role_name == 'Client')
                                                    <a class="btn btn-primary" href="{{ route('edit.vendor', ['id' => $row->id]) }}">Edit</a>
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
        {{-- <div class="modal fade" id="update" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Update Vendor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($vendorUser as $data)
                        @if ($data->id == auth()->user()->id)
                                <form method="POST" action="{{ route('edit.vendor', ['id' => $data->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <!-- Form fields for editing vendor user details -->
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="name" class="fw-bold">Name:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="name" name="name"
                                                value="{{ $data->name }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="email" class="fw-bold">Email:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="email" id="email" name="email"
                                                value="{{ $data->email }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="join_date" class="fw-bold">Date:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" name="date" id="date"
                                                value="{{ $data->join_date }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="role" class="fw-bold">Role</label>
                                        </div>
                                        <div class="col-auto">
                                            <select name="role_name" id="role" required class="form-control"
                                                style="border: 1px solid;">
                                                <option value="">Select Role</option>
                                                <option value="Vendor"
                                                    {{ $data->role_name == 'Vendor' ? 'selected' : '' }}>Vendor
                                                </option>
                                                <option value="Client"
                                                    {{ $data->role_name == 'Client' ? 'selected' : '' }}>Client
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Submit button inside the form -->
                                    <div class="modal-footer">
                                        <a href="{{ route('vendorManage') }}"
                                            class="btn btn-outline-primary">Cancel</a>
                                        <button type="submit" class="btn btn-outline-primary">Update</button>
                                    </div>
                                </form>
                            @else
                                <p>User ID: {{ auth()->user()->id }} | Vendor ID: {{ $data->id }}</p>
                            @endif
                        @endforeach
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