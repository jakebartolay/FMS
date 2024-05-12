<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>
    @include('layout.header')
</head>

<body>

    <main>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div id="login-page">
                    <div class="login">
                        @include('layout.logo2')
                        <h2 class="login-title m-2">Investor Online</h2>
                        <form class="form-login">
                            <label for="email">Account Number</label>
                            <div class="input-email">
                                <i class="fas fa-envelope icon"></i>
                                <input type="email" name="email" placeholder="INV-20240511-123456" required>
                            </div>
                            <label for="password">Password</label>
                            <div class="input-password">
                                <i class="fas fa-lock icon"></i>
                                <input type="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="checkbox">
                                <label for="remember">
                                    <input type="checkbox" name="remember">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit"><i class="fas fa-door-open"></i> Sign in</button>
                        </form>
                        <a href="#"><u>Forgot your password?</u></a>
                    </div>
                    <div class="background d-none d-xxl-block">
                        <h2>Why use Investor Online?</h2>
                        <p>Investor Online gives you quick and easy access to your account information when you want it.</p>
                        <p>Stay in touch with your investment information and account details 24 hours a day, 7 days a week via a secure, internet-based account information service.</p>
                        <p>Investor Online gives you everything you need to know about your account, including your account summary, portfolio valuation, asset allocation, asset performance, transactions details, product disclosure statements and much more.</p>
                        {{-- <p><strong>Did you know...</strong></p>
                        <p>... you can receive your Investor Reports online?</p>
                        <p>Find out how to register for eStatements.</p> --}}
                    </div>                   
                    <div class="background d-none d-xxl-block">
                        <h2>Using Investor Online</h2>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeadingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                                        Forgotten or lost your PIN?
                                    </button>
                                </h2>
                                <div id="faqCollapseOne" class="accordion-collapse collapse" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        If you've forgotten your PIN, simply click the "Forgotten PIN" link. To use this facility, you'll need to answer a few verification questions and ensure we already hold your email address on our system. If not, you'll need to call us first so we can update your email details.
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
    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout.javascript')

</body>

</html>
