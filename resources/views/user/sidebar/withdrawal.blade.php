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
                            <table class="table datatable" style="width: 100%">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    {{-- <th>Email</th> --}}
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($payouts as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <?php
                                            $firstname = $data->firstname;
                                            $lastname = $data->lastname;
                                            
                                            // Get the first character of the first name
                                            $firstCharFirstName = substr($firstname, 0, 1);
                                            
                                            // Replace all characters of the first name except the first character with '*'
                                            $asteriskFirstName = $firstCharFirstName . str_repeat('*', strlen($firstname) - 1);
                                            
                                            // Get the first character of the last name
                                            $firstCharLastName = substr($lastname, 0, 1);
                                            
                                            // Replace all characters of the last name except the first character with '*'
                                            $asteriskLastName = $firstCharLastName . str_repeat('*', strlen($lastname) - 1);
                                            ?>
                                            
                                            <td>{{ $asteriskFirstName }} {{ $asteriskLastName }}</td>      
                                            {{-- {{-- <td>{{ $data->email }}</td>  --}}
                                            <td>${{ $data->amount }}</td>
                                            <td>{{ $data->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('payouts.pdf', ['id' => $data->id]) }}" class="btn btn-outline-primary" target="_blank">Print Reciept</a>
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
