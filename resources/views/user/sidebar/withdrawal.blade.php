<!DOCTYPE html>
<html lang="en">

<head>
    <title>Withdrawal</title>
    @include('layout.header')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('user.sidebar.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('user.sidebar.sidebarnav')
    <!-- End Sidebar-->

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
                    <li class="breadcrumb-item active">Withdrawal</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <span class="fs-6 fw-bolder">Total Balance</span>
                                <h1 class="text-primary">${{ $formattedBalance }}</h1>
                            </div>
                            <a class="btn btn-outline-primary" href="{{ route('payoutGateways') }}">
                                Withdraw
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Withdrawal History</h5>
                            </div>
                            <table class="table datatable">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    {{-- <th>Email</th> --}}
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>File</th>
                                </thead>
                                <tbody>
                                    @foreach ($payouts as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->firstname }} {{ $data->lastname }}</td>
                                            {{-- <td>{{ $data->email }}</td> --}}
                                            <td>{{ $data->amount }}</td>
                                            <td>{{ $data->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a class="btn btn-outline-primary">view</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->
        </section>

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
