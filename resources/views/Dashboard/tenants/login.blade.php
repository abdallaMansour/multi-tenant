<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Taif - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Taif - Dashboard" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Taif" />
    <meta name="email" content="support@taif.com" />
    <meta name="website" content="https://taif.ae" />
    <meta name="Version" content="v1.0.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <!-- Css -->
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" class="theme-opt" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Style Css-->
    <link href="{{ asset('assets/css/style.min.css') }}" class="theme-opt" rel="stylesheet" type="text/css" />
    <style>
        .bg-circle-gradiant,
        .bg-overlay-white {
            background: #3164F5 !important;
            background-color: #3164F5 !important;
        }

        .pg-taif {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .avatar.avatar-small {
            height: auto;
            width: 103px;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
            margin: auto
        }

        .step-indicator {
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .step-progress {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .step-item:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 20px;
            left: 100%;
            width: 20px;
            height: 2px;
            background: #e9ecef;
            z-index: 1;
        }

        .step-item.active:not(:last-child)::after {
            background: #3164F5;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .step-item.active .step-circle {
            background: #3164F5;
            color: white;
        }

        .step-item.completed .step-circle {
            background: #3164F5;
            color: white;
        }

        .step-item.completed .step-circle::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .step-title {
            margin-top: 10px;
            font-size: 12px;
            font-weight: 600;
            color: #6c757d;
            text-align: center;
        }

        .step-item.active .step-title {
            color: #3164F5;
        }

        .step-content {
            padding: 40px;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .form-floating {
            margin-bottom: 20px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #3164F5;
            box-shadow: 0 0 0 0.2rem rgba(49, 100, 245, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3164F5 0%, #1e40af 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(49, 100, 245, 0.4);
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .loading {
            display: none;
        }

        .loading.show {
            display: inline-block;
        }

        .otp-inputs {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin: 20px 0;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border: 2px solid #e9ecef;
            border-radius: 10px;
        }

        .otp-input:focus {
            border-color: #3164F5;
            outline: none;
        }

        .resend-link {
            text-align: center;
            margin-top: 15px;
        }

        .resend-link a {
            color: #3164F5;
            text-decoration: none;
            font-size: 14px;
        }

        .resend-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <img src="{{ asset('assets/images/pg-taif.png') }}" class="pg-taif" alt="">
    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container" style="z-index: 3">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <!-- Step Indicator -->
                        <div class="step-indicator">
                            <div class="step-progress">
                                <div class="step-item active" data-step="1">
                                    <div class="step-circle">1</div>
                                    <div class="step-title">Email</div>
                                </div>
                                <div class="step-item" data-step="2">
                                    <div class="step-circle">2</div>
                                    <div class="step-title">Verify OTP</div>
                                </div>
                            </div>
                        </div>

                        <!-- Step Content -->
                        <div class="step-content">
                            <!-- Step 1: Email -->
                            <div class="step active" id="step-1">
                                <div class="text-center mb-4">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" class="avatar avatar-small mb-4 d-block mx-auto" alt="">
                                    <h5 class="mb-3">قم بتسجيل الدخول</h5>
                                    <p class="text-muted">أدخل بريدك الإلكتروني لإرسال رمز التحقق</p>
                                </div>

                                <form id="email-form">
                                    @csrf
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                        <label for="email">البريد الإلكتروني</label>
                                    </div>

                                    <div class="alert alert-danger" id="email-error" style="display: none;"></div>

                                    <button class="btn btn-primary w-100" type="submit">
                                        <span class="loading" id="email-loading">
                                            <i class="fas fa-spinner fa-spin"></i> جاري الإرسال...
                                        </span>
                                        <span id="email-text">إرسال رمز التحقق</span>
                                    </button>
                                </form>
                            </div>

                            <!-- Step 2: OTP Verification -->
                            <div class="step" id="step-2">
                                <div class="text-center mb-4">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" class="avatar avatar-small mb-4 d-block mx-auto" alt="">
                                    <h5 class="mb-3">تحقق من البريد الإلكتروني</h5>
                                    <p class="text-muted">أدخل الرمز المكون من 4 أرقام المرسل إلى بريدك الإلكتروني</p>
                                </div>

                                <form id="otp-form">
                                    @csrf
                                    <div class="otp-inputs">
                                        <input type="text" class="otp-input" maxlength="1" data-index="0">
                                        <input type="text" class="otp-input" maxlength="1" data-index="1">
                                        <input type="text" class="otp-input" maxlength="1" data-index="2">
                                        <input type="text" class="otp-input" maxlength="1" data-index="3">
                                    </div>

                                    <div class="alert alert-danger" id="otp-error" style="display: none;"></div>

                                    <button class="btn btn-primary w-100" type="submit">
                                        <span class="loading" id="otp-loading">
                                            <i class="fas fa-spinner fa-spin"></i> جاري التحقق...
                                        </span>
                                        <span id="otp-text">تسجيل الدخول</span>
                                    </button>

                                    <div class="resend-link">
                                        <a href="#" id="resend-otp">إعادة إرسال الرمز</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="text-center p-3">
                            <p class="mb-0 text-muted">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> طيف.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- javascript -->
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <!-- Main Js -->
    <script src="{{ asset('assets/js/plugins.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        class TenantLogin {
            constructor() {
                this.currentStep = 1;
                this.email = '';
                this.otpCode = '';
                this.init();
            }

            init() {
                this.bindEvents();
            }

            bindEvents() {
                // Email form submission
                document.getElementById('email-form').addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.submitEmail();
                });

                // OTP form submission
                document.getElementById('otp-form').addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.submitOTP();
                });

                // OTP input handling
                document.querySelectorAll('.otp-input').forEach((input, index) => {
                    input.addEventListener('input', (e) => {
                        if (e.target.value.length === 1) {
                            const nextInput = e.target.nextElementSibling;
                            if (nextInput) {
                                nextInput.focus();
                            }
                        }
                    });

                    input.addEventListener('keydown', (e) => {
                        if (e.key === 'Backspace' && e.target.value === '') {
                            const prevInput = e.target.previousElementSibling;
                            if (prevInput) {
                                prevInput.focus();
                            }
                        }
                    });
                });

                // Resend OTP
                document.getElementById('resend-otp').addEventListener('click', (e) => {
                    e.preventDefault();
                    this.resendOTP();
                });
            }

            async submitEmail() {
                const email = document.getElementById('email').value;
                const submitBtn = document.querySelector('#email-form button[type="submit"]');
                const loading = document.getElementById('email-loading');
                const text = document.getElementById('email-text');
                const errorDiv = document.getElementById('email-error');

                this.showLoading(submitBtn, loading, text);

                try {
                    const response = await fetch('{{ route('tenant.send-otp') }}', {
                        method: 'POST',
                        headers: {
                            'accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify({
                            email
                        })
                    });

                    const data = await response.json();

                    if (data.status) {
                        this.email = email;
                        this.goToStep(2);
                        this.hideError(errorDiv);
                    } else {
                        this.showError(errorDiv, data.message);
                    }
                } catch (error) {
                    this.showError(errorDiv, 'حدث خطأ. يرجى المحاولة مرة أخرى.');
                } finally {
                    this.hideLoading(submitBtn, loading, text);
                }
            }

            async submitOTP() {
                const otpInputs = document.querySelectorAll('.otp-input');
                const otpCode = Array.from(otpInputs).map(input => input.value).join('');
                const submitBtn = document.querySelector('#otp-form button[type="submit"]');
                const loading = document.getElementById('otp-loading');
                const text = document.getElementById('otp-text');
                const errorDiv = document.getElementById('otp-error');

                if (otpCode.length !== 4) {
                    this.showError(errorDiv, 'يرجى إدخال رمز صحيح مكون من 4 أرقام.');
                    return;
                }

                this.showLoading(submitBtn, loading, text);

                try {
                    const response = await fetch('{{ route('tenant.login-otp') }}', {
                        method: 'POST',
                        headers: {
                            'accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify({
                            email: this.email,
                            otp_code: otpCode
                        })
                    });

                    const data = await response.json();

                    if (data.status) {
                        // Redirect to dashboard
                        window.location.href = data.redirect_url || '{{ route('tenant.dashboard') }}';
                    } else {
                        this.showError(errorDiv, data.message);
                    }
                } catch (error) {
                    this.showError(errorDiv, 'حدث خطأ. يرجى المحاولة مرة أخرى.');
                } finally {
                    this.hideLoading(submitBtn, loading, text);
                }
            }

            async resendOTP() {
                const resendBtn = document.getElementById('resend-otp');
                resendBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الإرسال...';
                resendBtn.style.pointerEvents = 'none';

                try {
                    const response = await fetch('{{ route('tenant.send-otp') }}', {
                        method: 'POST',
                        headers: {
                            'accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify({
                            email: this.email
                        })
                    });

                    const data = await response.json();

                    if (data.status) {
                        // Clear OTP inputs
                        document.querySelectorAll('.otp-input').forEach(input => input.value = '');
                        document.getElementById('otp-error').style.display = 'none';
                    }
                } catch (error) {
                    console.error('Error resending OTP:', error);
                } finally {
                    resendBtn.innerHTML = 'إعادة إرسال الرمز';
                    resendBtn.style.pointerEvents = 'auto';
                }
            }

            goToStep(step) {
                // Hide all steps
                document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));

                // Show target step
                document.getElementById(`step-${step}`).classList.add('active');

                // Update step indicators
                document.querySelectorAll('.step-item').forEach((item, index) => {
                    item.classList.remove('active', 'completed');
                    if (index + 1 < step) {
                        item.classList.add('completed');
                    } else if (index + 1 === step) {
                        item.classList.add('active');
                    }
                });

                this.currentStep = step;
            }

            showLoading(button, loading, text) {
                button.disabled = true;
                loading.classList.add('show');
                text.style.display = 'none';
            }

            hideLoading(button, loading, text) {
                button.disabled = false;
                loading.classList.remove('show');
                text.style.display = 'inline';
            }

            showError(errorDiv, message) {
                errorDiv.textContent = message;
                errorDiv.style.display = 'block';
            }

            hideError(errorDiv) {
                errorDiv.style.display = 'none';
            }
        }

        // Initialize the login process
        document.addEventListener('DOMContentLoaded', () => {
            new TenantLogin();
        });
    </script>

</body>

</html>
