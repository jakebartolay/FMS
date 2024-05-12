<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Profile</title>
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
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section profile">
            <div class="row">
                <div class="col-xl-5">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ $user->profile_path_picture }}" alt="Profile" class="rounded-circle">
                            <h2>{{ $user->firstname }} {{ $user->lastname }}</h2>
                            <h3>{{ $roleName }}</h3>
                            <!-- <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div> -->
                        </div>
                    </div>

                </div>

                <div class="col-xl-7">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p style="color:red;">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-settings">Settings</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Status</div>
                                        <div class="col-lg-9 col-md-8">
                                            @php
                                                $status = strtolower($user->status);
                                                $badgeClass = '';
                                                switch ($status) {
                                                    case 'active':
                                                        $badgeClass = 'badge bg-success';
                                                        break;
                                                    case 'inactive':
                                                        $badgeClass = 'badge bg-secondary';
                                                        break;
                                                    case 'suspended':
                                                        $badgeClass = 'badge bg-danger';
                                                        break;
                                                    case 'closed':
                                                        $badgeClass = 'badge bg-dark';
                                                        break;
                                                    default:
                                                        $badgeClass = 'badge bg-warning';
                                                        break;
                                                }
                                            @endphp
                                            <span class="{{ $badgeClass }}">{{ ucfirst($user->status) }}</span>
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Account Transfer ID</div>
                                        <div class="col-lg-9 col-md-8">
                                            {{-- @if ($account) --}}
                                            {{ $accountId }}
                                            {{-- @else
                                                N/A
                                            @endif --}}
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->firstname }} {{ $user->lastname }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Birthday:</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->birthdate }}</div>
                                    </div>


                                    {{-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">No Data Found</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">No Data Found</div>
                  </div>--}}

                  {{-- <div class="row">
                    <div class="col-lg-3 col-md-4 label"><a href="">Verify Account</a></div>
                  </div>  --}}

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Profile Edit Form -->
                                    <form class="row g-3 needs-validation" action="{{ route('update-profile') }}"
                                        method="POST" novalidate>
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="{{ $user->profile_path_picture }}" class="rounded-circle" alt="Profile">
                                                <div class="pt-2 mx-4">
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                        title="Upload new profile image"><i
                                                            class="bi bi-upload"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        title="Remove my profile image"><i
                                                            class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="valid12"
                                                class="col-md-4 col-lg-3 col-form-label">Firstname</label>
                                            <div class="col-md-8 col-lg-9 position-relative">
                                                <input name="firstname" type="text" class="form-control"
                                                    id="valid12" value="{{ $user->firstname }}" placeholder="Firstname" required oninput="capitalizeFirstLetter(this)">
                                                <div class="invalid-feedback">
                                                    Please Enter Firstname
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="valid13" class="col-md-4 col-lg-3 col-form-label">Last
                                                Name</label>
                                            <div class="col-md-8 col-lg-9 position-relative">
                                                <input name="lastname" type="text" class="form-control"
                                                    id="valid13" value="{{ $user->lastname }}" placeholder="Lastname" required oninput="capitalizeFirstLetter(this)">
                                                <div class="invalid-feedback">
                                                    Please Enter Lastname
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="valid14"
                                                class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9 position-relative">
                                                <input name="email" type="email" placeholder="example@gmail.com" class="form-control"
                                                    id="valid14" value="{{ $user->email }}"required>
                                                <div class="invalid-feedback">
                                                    Please Enter Email
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="valid14"
                                                class="col-md-4 col-lg-3 col-form-label">Birthday</label>
                                            <div class="col-md-8 col-lg-9 position-relative">
                                                <input name="birthdate" type="date" class="form-control"
                                                    id="valid14" value="{{ $user->birthdate }}"required>
                                                <div class="invalid-feedback">
                                                    Enter Your birthday
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="No Data Found" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="No Data Found" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="No Data Found" required>
                      </div>
                    </div> --}}

                                        <!-- <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                      </div>
                    </div> -->

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">
                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade"
                                                        checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts"
                                                        checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="securityNotify" checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade" id="profile-change-password">
                                    <h5 class="card-title">Password</h5>
                                    <!-- Change Password Form -->
                                    <form class="needs-validation" action="{{ route('update-password') }}"
                                        method="POST" novalidate>
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="valid1" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" type="password" class="form-control"
                                                id="valid1" @if($user->password !== '12345dummy') required @endif placeholder="Current password">
                                                <div class="invalid-feedback">
                                                    Please Enter your current password.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="valid2" class="col-md-4 col-lg-3 col-form-label">New
                                                password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password" type="password" class="form-control"
                                                    id="valid2" required placeholder="New Password">
                                                <div class="invalid-feedback">
                                                    Please enter new password.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="valid3" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password_confirmation" type="password"
                                                    class="form-control" id="valid3" required placeholder="Confirm new password">
                                                <div class="invalid-feedback">
                                                    Please re-enter new password.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


    @include('layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')
</body>

</html>
