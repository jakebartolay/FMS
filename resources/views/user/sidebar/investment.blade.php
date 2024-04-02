<!DOCTYPE html>
<html lang="en">

<head>
    <title>Investment</title>
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
                    <li class="breadcrumb-item active">Investment</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Right side columns -->
                <div class="col-lg-12 col-12">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <div class="row justify-content-between">
                                            <div class="col">
                                                <h2 class="mb-4">My Investments</h2>
                                            </div>
                                            {{-- <div class="col-auto">
                                                <button type="button" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal" data-bs-target="#verticalycentered">Create
                                                    Investment</button>
                                            </div> --}}
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Account</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invest as $row)
                                                <tr class="text-center">
                                                    <th scope="row">{{ $row->id }}</th>
                                                    <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                                                    <td>{{ number_format($row->amount, 2) }}</td>
                                                    <td>{{ $row->created_at->format('m-d-y') }}</td>
                                                    <td>
                                                        @if ($row->status == 'Active')
                                                            <span
                                                                class="badge bg-success">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Inactive')
                                                            <span
                                                                class="badge bg-danger">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Pending')
                                                            <span
                                                                class="badge bg-warning text-dark">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Completed')
                                                            <span
                                                                class="badge bg-primary">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Cancelled')
                                                            <span
                                                                class="badge bg-secondary">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Suspended')
                                                            <span class="badge bg-info">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Failed')
                                                            <span class="badge bg-dark">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Refunded')
                                                            <span
                                                                class="badge bg-light text-dark">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Approve')
                                                            <span
                                                                class="badge bg-primary">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Cancel')
                                                            <span
                                                                class="badge bg-warning text-black">{{ $row->status }}</span>
                                                        @elseif($row->status == 'Delete')
                                                            <span
                                                                class="badge bg-danger text-white">{{ $row->status }}</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm mr-3"
                                                            title="Cancel" data-bs-toggle="modal"
                                                            data-bs-target="#investmentcancel"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                    </td> 
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Website Traffic -->
            </div><!-- End Left side columns -->
        </section>
        {{-- 
        <div class="modal fade" id="investmentcancel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($invest as $data)
                        <form id="cancelInvestForm{{ $data->id }}"
                            action="{{ route('investment_requests.cancel', ['id' => $data->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endforeach
                        <h1>Are you sure you want to Cancel this Investment?</h1>
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
