<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>
    @include('layout.header')
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center pb-4">
                                @include('layout.logo2')
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Investor Online</h5>
                                        <p class="text-center small">Login your account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" action="{{ route('login') }}" novalidate method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="account_number" class="form-label">Account number</label>
                                            <p class="small">Enter the first 8 digits of your account number. <a href="" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">example</a></p>
                                            <div class="input-group has-validation">
                                                <input type="text" name="account_number" class="form-control" id="account_number" placeholder="ex.12345678" required>
                                                <div class="invalid-feedback">Please enter your account number.</div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your Password" required>
                                            <div class="invalid-feedback">Please enter your Password.</div>
                                        </div>
                                    
                                        <div class="col-12">
                                            <button class="btn btn-primary w-25" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <a href="pages-register.html"><u>Forgotten Password?</u></a>
                                        </div>
                                    
                                        <script>
                                            // Get the input elements
                                            var accountNumberInput = document.getElementById('account_number');
                                            var passwordInput = document.getElementById('password');
                                    
                                            // Add event listener for input event for account number field
                                            accountNumberInput.addEventListener('input', function(event) {
                                                // Get the input value
                                                var inputValue = event.target.value;
                                    
                                                // Limit the input to 8 characters
                                                var limitedValue = inputValue.substring(0, 8);
                                    
                                                // Update the input value
                                                event.target.value = limitedValue;
                                            });
                                    
                                            // Add event listener for input event for Password field
                                            passwordInput.addEventListener('input', function(event) {
                                                // Get the input value
                                                var inputValue = event.target.value;
                                    
                                                // Limit the input to 8 characters
                                                var limitedValue = inputValue.substring(0, 8);
                                    
                                                // Update the input value
                                                event.target.value = limitedValue;
                                            });
                                        </script>
                                    </form>
                                    
                                    
                                    
                                    

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center d-none d-xxl-block py-4">
                            <div class="d-flex justify-content-center py-4">
                                
                            </div><!-- End Logo -->
                            <div class="card mb-3">

                                <div class="card-body p-3">

                                    <h2>Why use Investor Online?</h2>
                                    <p class="small">Investor Online gives you quick and easy access to your account information when
                                        you want it.</p>
                                    <p class="small">Stay in touch with your investment information and account details 24 hours a
                                        day, 7 days a week via a secure, internet-based account information service.</p>
                                    <p class="small">Investor Online gives you everything you need to know about your account,
                                        including your account summary, portfolio valuation, asset allocation, asset
                                        performance, transactions details, product disclosure statements and much more.
                                    </p>
                                    <p class="text-end small"><strong>Did you know...</strong></p>
                            <p class="text-end small">... you can receive your Investor Reports online?</p>
                            <p class="text-end small">Find out how to register for eStatements.</p>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center d-none d-xxl-block py-4">
                            <div class="d-flex justify-content-center py-4">
                                
                            </div><!-- End Logo -->
                            <div class="card mb-3">

                                <div class="card-body p-3">

                                    <h2>Using Investor Online</h2>
                                    <div class="accordion" id="faqAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="faqHeadingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                                                    Forgotten Password?
                                                </button>
                                            </h2>
                                            <div id="faqCollapseOne" class="accordion-collapse collapse" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    If you've forgotten your Password, simply click the "Forgotten Password" link. To use this facility, you'll need to answer a few verification questions and ensure we already hold your email address on our system. If not, you'll need to call us first so we can update your email details.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="faqHeadingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                                                    Maintaining safe and secure access
                                                </button>
                                            </h2>
                                            <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    To ensure the ongoing security of your account information, please read our tips.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="faqHeadingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                                                    Browser compatibility
                                                </button>
                                            </h2>
                                            <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    Investor Online is optimised and fully supported to be used with Microsoft Edge. You can also use Chrome, Safari, Firefox and Opera to access the site.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Card Guide</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Adjusted image width and height -->
                    <img src="assets/img/card.png" alt="card photo example" style="max-width: 100%; max-height: 100%;" />
                </div>
            </div>
        </div>
    </div>


</body>

</html>
