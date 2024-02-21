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
                        <a href="/admin/vendorlist">
                            <i class="bi bi-circle"></i><span>Vendor List</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/addvendor">
                            <i class="bi bi-circle"></i><span>Add Vendor</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendorUpdateUser" class="active">
                            <i class="bi bi-circle"></i><span>Update User</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendorUpdateUser">
                            <i class="bi bi-circle"></i><span>Add Project</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendorUpdateUser">
                            <i class="bi bi-circle"></i><span>Add License</span>
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
                    <li class="breadcrumb-item active">Update User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row justify-content-center">
                <!-- Left side columns -->
                    <div class="col-xxl-6 col-12">
                        <!-- Add Vendor -->
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Update Vendor</h5>
                                    <!-- Multi Columns Form -->
                                    <form class="row g-3 justify-content-center">
                                            <div class="col-md-6 col-6">
                                                <label for="firstname" class="form-label">Firstname</label>
                                                <input type="text" class="form-control" id="firstname" placeholder="ex.Juan">
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <label for="lastname" class="form-label">Lastname</label>
                                                <input type="text" class="form-control" id="lastname" placeholder="ex.Dela Cruz">
                                            </div>
                                            <div class="break"></div>
                                            <div class="col-md-6 col-6">
                                                <label for="lastname" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="lastname" placeholder="ex.JuanDelaCruz">
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="**********">
                                            </div>
                                            <div class="break"></div>
                                            <div class="col-md-6 col-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="phone" placeholder="Phone">
                                            </div>
                                            <div class="break"></div>
                                            <div class="col-md-2 text-center">
                                                <label for="inputState" class="form-label">Role</label>
                                                <select id="inputState" class="form-select">
                                                    <option selected>User</option>
                                                    <option>Admin</option>
                                                    <option>Manager</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label for="status" class="form-label">Status</label>
                                                <select id="status" class="form-select">
                                                    <option selected>Active</option>
                                                    <option>Not Active</option>
                                                    <option>?????</option>
                                                </select>
                                            </div>
                                            <div class="break"></div>
                                            <div class="break"></div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Update Vendor</button>
                                                <button type="reset" class="btn btn-warning">Cancel</button>
                                            </div>
                                    </form><!-- End Multi Columns Form -->
                                    </div>
                                </div>
                            </div>
                        <!-- Add Vendor -->
                        </div>
                    </div>
                <!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
