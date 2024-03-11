<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaction</title>
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
                    <li class="breadcrumb-item active">Transaction</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <span class="fs-6 fw-bolder">Total Balance</span>
                                <h1 class="text-primary">${{ $formattedBalance }}</h1>
                            </div>
                            <a href="{{ route('transferview') }}" class="btn btn-outline-primary">Send Money</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Transfer History</h5>
                            </div>
                            <table class="table datatable table-responsive">
                                <thead>
                                    <th>ID</th>
                                    <th>Recipient ID</th>
                                    {{-- <th>Email</th> --}}
                                    <th>Amount</th>
                                    <th>Date</th>
                                </thead>
                                <tbody>
                                    @foreach ($transferhistory as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->recipient_id }}</td>
                                            <td>{{ $data->amount }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}</td>
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
