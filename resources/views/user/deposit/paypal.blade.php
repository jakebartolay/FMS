<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deposit Paypal</title>
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
                <a class="nav-link collapsed" href="/">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapse" href="/wallet">
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
                    <span>My Investments</span>
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
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Paypal Payment</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row justify-content-center">

                        <!-- Investment Card -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Deposit Using PayPal</h6>
                                    <hr>
                                    <form id="depositForm" method="POST" action="{{ route('payment.paypal') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="amount" class="form-label">Amount to Deposit</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input id="amount" name="amount" type="number" class="form-control" required placeholder="0.00">
                                            </div>
                                            <div class="form-text">Please enter the amount you wish to deposit (maximum $10,000).</div>
                                        </div>                                        
                                        <div class="text-center mb-3">
                                            <button type="button" class="btn btn-outline-primary" onclick="setDepositAmount('10,000.00')">$10,000.00</button>
                                            <button type="button" class="btn btn-outline-primary" onclick="setDepositAmount('25,000.00')">$25,000.00</button>
                                            <button type="button" class="btn btn-outline-primary" onclick="setDepositAmount('50,000.00')">$50,000.00</button>
                                            <button type="button" class="btn btn-outline-primary" onclick="setDepositAmount('75,000.00')">$75,000.00</button>
                                            <button type="button" class="btn btn-outline-primary" onclick="setDepositAmount('100,000.00')">$100,000.00</button>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Deposit</button>
                                        </div>                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <script>
                            function setDepositAmount(amount) {
                                // Remove commas from the amount if present
                                const cleanAmount = amount.replace(/,/g, '');
                                // Parse the clean amount to a float with two decimal places
                                const parsedAmount = parseFloat(cleanAmount).toFixed(2);
                                // Set the parsed amount as the input value
                                document.getElementById('amount').value = parsedAmount;
                            }
                        </script>
                        
                        
                        
                        
                        <!-- End Investment Card -->

                    </div><!-- End Right side columns -->
                </div>

            </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
