<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transfers</title>
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
                <a class="nav-link collapsed" href="/wallet">
                    <i class="bi bi-credit-card-fill"></i>
                    <span>Wallet Deposit</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link" href="/transaction">
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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h1>Transfer </h1>
                            </div>
                            <form method="POST" action="{{ route('transfer') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="id">Recipient Account ID:</label>
                                    <input id="id" name="id" placeholder="ex.10076888" type="text"
                                        class="form-control" required>
                                        <div class="form-text">Click<a class="badge text-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">here.</a> To see Transfer ID</div>

                                    @error('id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="amount">Amount:</label>
                                    <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input id="amount" name="amount" placeholder="ex.10,000" 
                                    type="text" class="form-control" maxlength="7">
                                    </div>
                                    <div class="form-text">Please enter the amount you wish to transfer (maximum $10,000).</div>
                                    <div class="text-center mb-3">
                                        <button type="button" class="btn btn-outline-primary" onclick="setDepositAmount('10,000.00')">$10,000.00</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="setDepositAmount('25,000.00')">$25,000.00</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="setDepositAmount('50,000.00')">$50,000.00</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="setDepositAmount('75,000.00')">$75,000.00</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="setDepositAmount('100,000.00')">$100,000.00</button>
                                    </div>
                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-outline-primary">Send Cash</button>
                                    <a class="btn btn-warning" href="{{ route('transaction') }}">cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->
        </section>

    </main><!-- End #main -->

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Guide</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                    <span>Step 1:</span>
                    <img src="{{ asset('assets/img/guide/guide1.png') }}" alt="">
                </div>
                <div class="col">
                    <span>Step 2:</span>
                    <img src="{{ asset('assets/img/guide/guide2.jpg') }}" alt="">
                </div>
                <div class="col">
                    <span>Step 3:</span>
                    <img src="{{ asset('assets/img/guide/guide3.png') }}" width="400px" alt="">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')

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
</body>

</html>
