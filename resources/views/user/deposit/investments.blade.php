<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dasboard</title>
    @include('layout.header')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('user.sidebar.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/wallet">
                    <i class="bi bi-credit-card-fill"></i>
                    <span>Wallet Deposit</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/transaction">
                    <i class="bi bi-send-fill"></i>
                    <span>Transfer fund</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/investment">
                    <i class="bi bi-folder-fill"></i>
                    <span>My Investment</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/withdrawals">
                    <i class="bi bi-database-fill-down"></i>
                    <span>Withdrawals</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/contactsupport">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Contact Support</span>
                </a>
            </li><!-- End Contact Page Nav -->
            {{-- <li class="nav-heading">Example</li> --}}

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h1>Dashboard</h1>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-between">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-outline-secondary rounded-pill btn-sm me-2" href="#invest">Investment</a>
                        <a class="btn btn-primary rounded-pill btn-sm" href="/wallet">Deposit</a>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row justify-content-center">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">


                    </div><!-- End Right side columns -->
                </div>
                <!-- Right side columns -->
                <div class="col-lg-6 col-12 " id="invest">
                    <!-- Website Traffic -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Investment</h5>
                            <div class="row g-4">

                                <div class="col-xl-12 col-md-12">
                                    <div class="row">

                                        <div class="col-xxl-12 col-md-12 col-12">
                                            <div class="  py-3">
                                                <div class="card-body text-center">
                                                    <img src="assets/img/companylogo/coca-cola-logo.png"
                                                        class="border border-circle rounded-circle" alt="logo payment"
                                                        width="100px" height="100px" srcset="">
                                                    <div class="my-3">
                                                        <span class="fs-6 text-muted py-5">Coca Cola</span>
                                                    </div>
                                                    @if ($errors->any())
                                                    <div id="error-messages">
                                                        @foreach ($errors->all() as $error)
                                                            <p style="color:red;">{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                    <script>
                                                        setTimeout(function() {
                                                            var errorMessages = document.getElementById('error-messages');
                                                            errorMessages.parentNode.removeChild(errorMessages);
                                                        }, 5000); // 12 seconds
                                                    </script>
                                                @endif
                                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#cocola">Invest</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- End Website Traffic -->
                {{-- <div class="col-lg-12">
                    <div class="row">

                        <!-- Investment Card -->
                        <div class="col-xxl-12 col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Log History</h5>
                                    <span class="break"></span>
                                    <div class="container-fluid">
                                        <table class="table table-striped datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Actions</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- @foreach ($activityLog as $data)
                                                    <tr>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->description }}</td>
                                                    <td>{{ $data->date_time }}</td>
                                                </tr>
                                                @endforeach -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Investment Card -->
                    </div><!-- End Right side columns -->
                </div> --}}
            </div><!-- End Left side columns -->
            </div>
        </section>
        <div class="modal fade" id="cocola" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Coca Cola Investment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('InvestmentRequest.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="amount">Amount:</label>
                                <input id="amount" name="amount" placeholder="ex.100,000"
                                       class="form-control" required maxlength="6">
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        
                            <div class="form-group mb-3">
                                <label for="investment_date">Investment Date:</label>
                                <input type="date" name="investment_date" id="investment_date"
                                       class="form-control" required>
                                @error('investment_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        
                            <div class="form-group mb-3">
                                <label for="revenue_percentage">Revenue Percentage:</label>
                                <input type="text" id="revenue_percentage" class="form-control" disabled>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </form>
                        
                        <script>
                            document.getElementById('amount').addEventListener('input', function() {
                                var amount = parseFloat(this.value);
                                if (!isNaN(amount)) {
                                    var revenuePercentage = (amount * 8) / 100; // Assuming revenue is 8% of the investment amount
                                    document.getElementById('revenue_percentage').value = revenuePercentage.toFixed(2);
                                } else {
                                    document.getElementById('revenue_percentage').value = '';
                                }
                            });
                        </script>                        
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
