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
                        <a href="/admin/addvendor" class="active">
                            <i class="bi bi-circle"></i><span>Add Vendor</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendorlist">
                            <i class="bi bi-circle"></i><span>Vendor List</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/vendorUpdateUser">
                            <i class="bi bi-circle"></i><span>Update User</span>
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
                    <li class="breadcrumb-item active">Add Vendor</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row justify-content-center">
                <!-- Left side columns -->
                <div class="col-xxl-12 col-12">
                    <!-- Add Vendor -->
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Add Vendor</h5>
                                <hr>
                                <!-- Horizontal Form -->
                                <form>
                                    <div class="row">
                                    <div class="col-xxl-6 col-6">
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label fw-semibold">Name *</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="inputText">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputState" class="col-sm-6 col-form-label fw-semibold">Type *</label>
                                            <div class="col-sm-5">
                                                <select id="inputState" class="form-select">
                                                    <option selected>-Select-</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputState" class="col-sm-6 col-form-label fw-semibold">Status *</label>
                                            <div class="col-sm-5">
                                                <select id="inputState" class="form-select">
                                                    <option value="">-Select-</option>
                                                    <option value="pipeline">Pipeline</option>
                                                    <option value="live">Live</option>
                                                    <option value="archived">Archived</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label fw-semibold">Country of Registration</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="inputText">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label fw-semibold">Company Registration</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="inputText">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label fw-semibold">Stock Symbol</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="inputText">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label fw-semibold">Company Website</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="inputText">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputState" class="col-sm-6 col-form-label fw-semibold">Deals with</label>
                                            <div class="col-sm-5">
                                                <select id="inputState" class="form-select">
                                                    <option selected>-Select-</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-6">
                                        <div class="row mb-3">
                                            <label for="inputState" class="col-sm-6 col-form-label fw-semibold">Internal Representative *</label>
                                            <div class="col-sm-5">
                                                <select id="inputState" class="form-select">
                                                    <option value="">-Select-</option>
                                                    <option value="pipeline">Pipeline</option>
                                                    <option value="live">Live</option>
                                                    <option value="archived">Archived</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="startDate" class="col-sm-6 col-form-label fw-semibold">Relationship Since *</label>
                                            <div class="col-sm-5">
                                                <input id="startDate" class="form-control" type="date" />
                                            </div>
                                        </div>
                                        <h5 class="fw-bolder">Contact Information</h5>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label fw-semibold">Main Contact Person *</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="inputText" placeholder="First Name">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="inputText" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label fw-semibold">Official Email</label>
                                            <div class="col-sm-5">
                                                <input type="email" class="form-control" id="inputEmail" aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label fw-semibold">Secondary Email</label>
                                            <div class="col-sm-5">
                                                <input type="email" class="form-control" id="inputEmail" aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="phone" class="col-sm-6 col-form-label fw-semibold">Mobile Number</label>
                                            <div class="col-sm-5">
                                                <input type="phone" class="form-control" id="phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Create Vendor</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                    </div>
                                </form><!-- End Horizontal Form -->

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
