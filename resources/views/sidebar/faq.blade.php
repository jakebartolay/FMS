<!DOCTYPE html>
<html lang="en">

<head>

    <title>Pages / F.A.Q - NiceAdmin Bootstrap Template</title>
    @include('layout.header')

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        
        @include('layout.logo')

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-fill-gear"></i><span>Vendor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/vendor-management">
              <i class="bi bi-circle"></i><span>Vendor Management</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cash-coin"></i><span>Investment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/investment-management">
              <i class="bi bi-circle"></i><span>investment Management</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/payment">
          <i class="bi bi-credit-card-2-front-fill"></i>
          <span>Payments</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/document">
          <i class="bi bi-files"></i>
          <span>Workflow and Approval</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/report">
          <i class="bi bi-file-earmark-bar-graph-fill"></i>
          <span>Reports</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/pages-contact">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link" href="/pages-faq">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Frequently Asked Questions</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Frequently Asked Questions</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section faq">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card basic">
                        <div class="card-body">
                            <h5 class="card-title">Basic Questions</h5>

                            <div>
                                <h6>1. Nisi ut ut exercitationem voluptatem esse sunt rerum?</h6>
                                <p>Saepe perspiciatis ea. Incidunt blanditiis enim mollitia qui voluptates. Id rem nulla
                                    tenetur nihil in unde rerum. Quae consequatur placeat qui cumque earum eius omnis
                                    quos.</p>
                            </div>

                            <div class="pt-2">
                                <h6>2. Reiciendis dolores repudiandae?</h6>
                                <p>Id ipsam non ut. Placeat doloremque deserunt quia tenetur inventore laboriosam
                                    dolores totam odio. Aperiam incidunt et. Totam ut quos sunt atque modi molestiae
                                    dolorem.</p>
                            </div>

                            <div class="pt-2">
                                <h6>3. Qui qui reprehenderit ut est illo numquam voluptatem?</h6>
                                <p>Enim inventore in consequuntur ipsam voluptatem consequatur beatae. Nostrum
                                    consequuntur voluptates et blanditiis.</p>
                            </div>

                        </div>
                    </div>

                    <!-- F.A.Q Group 1 -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Laborum dolorem quam porro</h5>

                            <div class="accordion accordion-flush" id="faq-group-1">

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsOne-1"
                                            type="button" data-bs-toggle="collapse">
                                            Debitis adipisci eius?
                                        </button>
                                    </h2>
                                    <div id="faqsOne-1" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-1">
                                        <div class="accordion-body">
                                            Ut quasi odit odio totam accusamus vero eius. Nostrum asperiores voluptatem
                                            eos nulla ab dolores est asperiores iure. Quo est quis praesentium aut
                                            maiores. Corrupti sed aut expedita fugit vero dolorem. Nemo rerum sapiente.
                                            A quaerat dignissimos.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsOne-2"
                                            type="button" data-bs-toggle="collapse">
                                            Omnis fugiat quis repellendus?
                                        </button>
                                    </h2>
                                    <div id="faqsOne-2" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-1">
                                        <div class="accordion-body">
                                            In minus quia impedit est quas deserunt deserunt et. Nulla non quo dolores
                                            minima fugiat aut saepe aut inventore. Qui nesciunt odio officia beatae
                                            iusto sed voluptatem possimus quas. Officia vitae sit voluptatem nostrum a.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsOne-3"
                                            type="button" data-bs-toggle="collapse">
                                            Et occaecati praesentium aliquam modi incidunt?
                                        </button>
                                    </h2>
                                    <div id="faqsOne-3" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-1">
                                        <div class="accordion-body">
                                            Voluptates magni amet enim perspiciatis atque excepturi itaque est. Sit
                                            beatae animi incidunt eum repellat sequi ea saepe inventore. Id et vel et
                                            et. Nesciunt itaque corrupti quia ducimus. Consequatur maiores voluptatum
                                            fuga quod ut non fuga.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsOne-4"
                                            type="button" data-bs-toggle="collapse">
                                            Quo unde eaque vero dolor quis ipsam?
                                        </button>
                                    </h2>
                                    <div id="faqsOne-4" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-1">
                                        <div class="accordion-body">
                                            Numquam ut reiciendis aliquid. Quia veritatis quasi ipsam sed quo ut
                                            eligendi et non. Doloremque sed voluptatem at in voluptas aliquid dolorum.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsOne-5"
                                            type="button" data-bs-toggle="collapse">
                                            Natus sunt quo atque mollitia accusamus?
                                        </button>
                                    </h2>
                                    <div id="faqsOne-5" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-1">
                                        <div class="accordion-body">
                                            Aut necessitatibus maxime quis dolor et. Nihil laboriosam molestiae qui
                                            molestias placeat corrupti non quo accusamus. Nemo qui quis harum enim sed.
                                            Aliquam molestias pariatur delectus voluptas quidem qui rerum id quisquam.
                                            Perspiciatis voluptatem voluptatem eos. Vel aut minus labore at rerum eos.
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div><!-- End F.A.Q Group 1 -->

                </div>

                <div class="col-lg-6">

                    <!-- F.A.Q Group 2 -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Deserunt ut unde corporis</h5>

                            <div class="accordion accordion-flush" id="faq-group-2">

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1"
                                            type="button" data-bs-toggle="collapse">
                                            Cumque voluptatem recusandae blanditiis?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-1" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            Ut quasi odit odio totam accusamus vero eius. Nostrum asperiores voluptatem
                                            eos nulla ab dolores est asperiores iure. Quo est quis praesentium aut
                                            maiores. Corrupti sed aut expedita fugit vero dolorem. Nemo rerum sapiente.
                                            A quaerat dignissimos.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-2"
                                            type="button" data-bs-toggle="collapse">
                                            Provident beatae eveniet placeat est aperiam repellat adipisci?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-2" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            In minus quia impedit est quas deserunt deserunt et. Nulla non quo dolores
                                            minima fugiat aut saepe aut inventore. Qui nesciunt odio officia beatae
                                            iusto sed voluptatem possimus quas. Officia vitae sit voluptatem nostrum a.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-3"
                                            type="button" data-bs-toggle="collapse">
                                            Minus aliquam modi id reprehenderit nihil?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-3" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            Voluptates magni amet enim perspiciatis atque excepturi itaque est. Sit
                                            beatae animi incidunt eum repellat sequi ea saepe inventore. Id et vel et
                                            et. Nesciunt itaque corrupti quia ducimus. Consequatur maiores voluptatum
                                            fuga quod ut non fuga.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-4"
                                            type="button" data-bs-toggle="collapse">
                                            Quaerat qui est iusto asperiores qui est reiciendis eos et?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-4" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            Numquam ut reiciendis aliquid. Quia veritatis quasi ipsam sed quo ut
                                            eligendi et non. Doloremque sed voluptatem at in voluptas aliquid dolorum.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsTwo-5"
                                            type="button" data-bs-toggle="collapse">
                                            Laboriosam asperiores eum?
                                        </button>
                                    </h2>
                                    <div id="faqsTwo-5" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-2">
                                        <div class="accordion-body">
                                            Aut necessitatibus maxime quis dolor et. Nihil laboriosam molestiae qui
                                            molestias placeat corrupti non quo accusamus. Nemo qui quis harum enim sed.
                                            Aliquam molestias pariatur delectus voluptas quidem qui rerum id quisquam.
                                            Perspiciatis voluptatem voluptatem eos. Vel aut minus labore at rerum eos.
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div><!-- End F.A.Q Group 2 -->

                    <!-- F.A.Q Group 3 -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Dolore occaecati ducimus quam</h5>

                            <div class="accordion accordion-flush" id="faq-group-3">

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsThree-1"
                                            type="button" data-bs-toggle="collapse">
                                            Assumenda doloribus est fugiat sint incidunt animi totam nisi?
                                        </button>
                                    </h2>
                                    <div id="faqsThree-1" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-3">
                                        <div class="accordion-body">
                                            Ut quasi odit odio totam accusamus vero eius. Nostrum asperiores voluptatem
                                            eos nulla ab dolores est asperiores iure. Quo est quis praesentium aut
                                            maiores. Corrupti sed aut expedita fugit vero dolorem. Nemo rerum sapiente.
                                            A quaerat dignissimos.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsThree-2"
                                            type="button" data-bs-toggle="collapse">
                                            Consequatur saepe explicabo odio atque nisi?
                                        </button>
                                    </h2>
                                    <div id="faqsThree-2" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-3">
                                        <div class="accordion-body">
                                            In minus quia impedit est quas deserunt deserunt et. Nulla non quo dolores
                                            minima fugiat aut saepe aut inventore. Qui nesciunt odio officia beatae
                                            iusto sed voluptatem possimus quas. Officia vitae sit voluptatem nostrum a.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsThree-3"
                                            type="button" data-bs-toggle="collapse">
                                            Voluptates vel est fugiat molestiae rem sit eos sint?
                                        </button>
                                    </h2>
                                    <div id="faqsThree-3" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-3">
                                        <div class="accordion-body">
                                            Voluptates magni amet enim perspiciatis atque excepturi itaque est. Sit
                                            beatae animi incidunt eum repellat sequi ea saepe inventore. Id et vel et
                                            et. Nesciunt itaque corrupti quia ducimus. Consequatur maiores voluptatum
                                            fuga quod ut non fuga.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsThree-4"
                                            type="button" data-bs-toggle="collapse">
                                            Ab ipsa cum autem voluptas doloremque velit?
                                        </button>
                                    </h2>
                                    <div id="faqsThree-4" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-3">
                                        <div class="accordion-body">
                                            Numquam ut reiciendis aliquid. Quia veritatis quasi ipsam sed quo ut
                                            eligendi et non. Doloremque sed voluptatem at in voluptas aliquid dolorum.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-target="#faqsThree-5"
                                            type="button" data-bs-toggle="collapse">
                                            Aliquam magni ducimus facilis numquam dolorum harum eveniet iusto?
                                        </button>
                                    </h2>
                                    <div id="faqsThree-5" class="accordion-collapse collapse"
                                        data-bs-parent="#faq-group-3">
                                        <div class="accordion-body">
                                            Aut necessitatibus maxime quis dolor et. Nihil laboriosam molestiae qui
                                            molestias placeat corrupti non quo accusamus. Nemo qui quis harum enim sed.
                                            Aliquam molestias pariatur delectus voluptas quidem qui rerum id quisquam.
                                            Perspiciatis voluptatem voluptatem eos. Vel aut minus labore at rerum eos.
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div><!-- End F.A.Q Group 3 -->

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
