<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('tenant_registration.page_title') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* handle variable */
        :root {
            --primary-color: #3164F5;
        }
        .pg-taif {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            vertical-align: middle;
        }
        
        .registration-container {
            min-height: 100vh;
            background: var(--primary-color) !important;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .registration-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 600px;
            width: 100%;
            z-index: 3;
        }

        .step-indicator {
            background: #f8f9fa;
            padding: 30px;
            border-bottom: 1px solid #e9ecef;
        }

        .step-progress {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            position: relative;
        }

        .step-item:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 20px;
            left: 60%;
            width: 80%;
            height: 2px;
            background: #e9ecef;
            z-index: 1;
        }

        .step-item.active:not(:last-child)::after {
            background: var(--primary-color);
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
            background: var(--primary-color);
            color: white;
        }

        .step-item.completed .step-circle {
            background: var(--primary-color);
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
            color: var(--primary-color);
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

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(var(--primary-color), 0.4);
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
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
            border-color: var(--primary-color);
            outline: none;
        }

        .language-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .language-option {
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .language-option:hover {
            border-color: var(--primary-color);
            background: #f8fff9;
        }

        .language-option.selected {
            border-color: var(--primary-color);
            background: #d4edda;
        }

        .business-activity-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .business-activity-option {
            padding: 20px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .business-activity-option:hover {
            border-color: var(--primary-color);
            background: #f8fff9;
        }

        .business-activity-option.selected {
            border-color: var(--primary-color);
            background: #d4edda;
        }

        .step-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .success-message {
            text-align: center;
            padding: 40px;
        }

        .success-icon {
            font-size: 60px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <img src="http://127.0.0.1:8000/assets/images/pg-taif.png" class="pg-taif" alt="">
    <div class="registration-container">
        <div class="registration-card">
            <!-- Step Indicator -->
            <div class="step-indicator">
                <div class="step-progress">
                    <div class="step-item active" data-step="1">
                        <div class="step-circle">1</div>
                        <div class="step-title">{{ __('tenant_registration.step_email') }}</div>
                    </div>
                    <div class="step-item" data-step="2">
                        <div class="step-circle">2</div>
                        <div class="step-title">{{ __('tenant_registration.step_verify_otp') }}</div>
                    </div>
                    <div class="step-item" data-step="3">
                        <div class="step-circle">3</div>
                        <div class="step-title">{{ __('tenant_registration.step_user_info') }}</div>
                    </div>
                </div>
            </div>

            <!-- Step Content -->
            <div class="step-content">
                <!-- Step 1: Email -->
                <div class="step active" id="step-1">
                    <h3 class="mb-4">{{ __('tenant_registration.email_title') }}</h3>
                    <p class="text-muted mb-4">{{ __('tenant_registration.email_description') }}</p>

                    <form id="email-form">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="form-label">{{ __('tenant_registration.email_label') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('tenant_registration.email_placeholder') }}" required>
                        </div>

                        <div class="alert alert-danger" id="email-error" style="display: none;"></div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <span class="loading" id="email-loading">
                                    <i class="fas fa-spinner fa-spin"></i> {{ __('tenant_registration.email_sending') }}
                                </span>
                                <span id="email-text">{{ __('tenant_registration.email_button') }}</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Step 2: OTP Verification -->
                <div class="step" id="step-2">
                    <h3 class="mb-4">{{ __('tenant_registration.otp_title') }}</h3>
                    <p class="text-muted mb-4">{{ __('tenant_registration.otp_description') }}</p>

                    <form id="otp-form">
                        @csrf
                        <div class="otp-inputs">
                            <input type="text" class="otp-input" maxlength="1" data-index="0">
                            <input type="text" class="otp-input" maxlength="1" data-index="1">
                            <input type="text" class="otp-input" maxlength="1" data-index="2">
                            <input type="text" class="otp-input" maxlength="1" data-index="3">
                        </div>

                        <div class="alert alert-danger" id="otp-error" style="display: none;"></div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <span class="loading" id="otp-loading">
                                    <i class="fas fa-spinner fa-spin"></i> {{ __('tenant_registration.otp_verifying') }}
                                </span>
                                <span id="otp-text">{{ __('tenant_registration.otp_button') }}</span>
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-link" id="resend-otp">{{ __('tenant_registration.otp_resend') }}</button>
                        </div>
                    </form>
                </div>

                <!-- Step 3: User Information -->
                <div class="step" id="step-3">
                    <h3 class="mb-4">{{ __('tenant_registration.user_info_title') }}</h3>
                    <p class="text-muted mb-4">{{ __('tenant_registration.user_info_description') }}</p>

                    <form id="user-info-form">
        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">{{ __('tenant_registration.name_label') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('tenant_registration.name_placeholder') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">{{ __('tenant_registration.phone_label') }}</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="{{ __('tenant_registration.phone_placeholder') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __('tenant_registration.business_activity_label') }}</label>
                            <div class="business-activity-grid" id="business-activities">
                                <!-- Business activities will be loaded here -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('tenant_registration.main_language_label') }}</label>
                                    <div class="language-grid" id="main-languages">
                                        <div class="language-option" data-value="en">{{ __('tenant_registration.language_english') }}</div>
                                        <div class="language-option" data-value="ar">{{ __('tenant_registration.language_arabic') }}</div>
                                        <div class="language-option" data-value="fr">{{ __('tenant_registration.language_french') }}</div>
                                        <div class="language-option" data-value="es">{{ __('tenant_registration.language_spanish') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('tenant_registration.sub_language_label') }}</label>
                                    <div class="language-grid" id="sub-languages">
                                        <div class="language-option" data-value="en">{{ __('tenant_registration.language_english') }}</div>
                                        <div class="language-option" data-value="ar">{{ __('tenant_registration.language_arabic') }}</div>
                                        <div class="language-option" data-value="fr">{{ __('tenant_registration.language_french') }}</div>
                                        <div class="language-option" data-value="es">{{ __('tenant_registration.language_spanish') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('tenant_registration.admin_main_language_label') }}</label>
                                    <div class="language-grid" id="admin-main-languages">
                                        <div class="language-option" data-value="en">{{ __('tenant_registration.language_english') }}</div>
                                        <div class="language-option" data-value="ar">{{ __('tenant_registration.language_arabic') }}</div>
                                        <div class="language-option" data-value="fr">{{ __('tenant_registration.language_french') }}</div>
                                        <div class="language-option" data-value="es">{{ __('tenant_registration.language_spanish') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('tenant_registration.admin_sub_language_label') }}</label>
                                    <div class="language-grid" id="admin-sub-languages">
                                        <div class="language-option" data-value="en">{{ __('tenant_registration.language_english') }}</div>
                                        <div class="language-option" data-value="ar">{{ __('tenant_registration.language_arabic') }}</div>
                                        <div class="language-option" data-value="fr">{{ __('tenant_registration.language_french') }}</div>
                                        <div class="language-option" data-value="es">{{ __('tenant_registration.language_spanish') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-danger" id="user-info-error" style="display: none;"></div>

                        <div class="step-navigation">
                            <button type="button" class="btn btn-secondary" id="prev-step-3">{{ __('tenant_registration.previous') }}</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="loading" id="user-info-loading">
                                    <i class="fas fa-spinner fa-spin"></i> {{ __('tenant_registration.completing') }}
                                </span>
                                <span id="user-info-text">{{ __('tenant_registration.complete_registration') }}</span>
                            </button>
                        </div>
    </form>
                </div>

                <!-- Success Step -->
                <div class="step" id="step-success">
                    <div class="success-message">
                        <div class="success-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3 class="mb-3">{{ __('tenant_registration.success_title') }}</h3>
                        <p class="text-muted mb-4">{{ __('tenant_registration.success_description') }}</p>
                        <a href="#" id="login-link" class="btn btn-primary">{{ __('tenant_registration.go_to_login') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        class TenantRegistration {
            constructor() {
                this.currentStep = 1;
                this.email = '';
                this.otpCode = '';
                this.username = '';
                this.businessActivities = @json($businessActivities ?? []);
                this.init();
            }

            init() {
                this.bindEvents();
                this.renderBusinessActivities();
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

                // User info form submission
                document.getElementById('user-info-form').addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.submitUserInfo();
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

                // Language selection
                document.querySelectorAll('.language-option').forEach(option => {
                    option.addEventListener('click', () => {
                        const container = option.closest('.language-grid');
                        container.querySelectorAll('.language-option').forEach(opt => opt.classList.remove('selected'));
                        option.classList.add('selected');
                    });
                });

                // Business activity selection
                document.getElementById('business-activities').addEventListener('click', (e) => {
                    if (e.target.classList.contains('business-activity-option')) {
                        document.querySelectorAll('.business-activity-option').forEach(opt => opt.classList.remove('selected'));
                        e.target.classList.add('selected');
                    }
                });

                // Resend OTP
                document.getElementById('resend-otp').addEventListener('click', () => {
                    this.resendOTP();
                });

                // Previous step button
                document.getElementById('prev-step-3').addEventListener('click', () => {
                    this.goToStep(2);
                });
            }


            renderBusinessActivities() {
                const container = document.getElementById('business-activities');
                container.innerHTML = this.businessActivities.map(activity => `
                    <div class="business-activity-option" data-id="${activity.id}">
                        <h6>${activity.name}</h6>
                        <small class="text-muted">${activity.description || ''}</small>
                    </div>
                `).join('');
            }

            async submitEmail() {
                const email = document.getElementById('email').value;
                const submitBtn = document.querySelector('#email-form button[type="submit"]');
                const loading = document.getElementById('email-loading');
                const text = document.getElementById('email-text');
                const errorDiv = document.getElementById('email-error');

                this.showLoading(submitBtn, loading, text);

                try {
                    const response = await fetch('{{ route('tenant.register.check-mail') }}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
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
                    this.showError(errorDiv, error.message);
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
                    this.showError(errorDiv, '{{ __('tenant_registration.otp_invalid') }}');
                    return;
                }

                this.showLoading(submitBtn, loading, text);

                try {
                    const response = await fetch('{{ route('tenant.register.check-otp') }}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
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
                        this.otpCode = otpCode;
                        this.goToStep(3);
                        this.hideError(errorDiv);
                    } else {
                        this.showError(errorDiv, data.message);
                    }
                } catch (error) {
                    this.showError(errorDiv, error.message);
                } finally {
                    this.hideLoading(submitBtn, loading, text);
                }
            }

            async submitUserInfo() {
                const formData = {
                    name: document.getElementById('name').value,
                    email: this.email,
                    phone: document.getElementById('phone').value,
                    otp_code: this.otpCode,
                    business_activity_id: document.querySelector('.business-activity-option.selected')?.dataset.id,
                    main_language: document.querySelector('#main-languages .language-option.selected')?.dataset.value,
                    sub_language: document.querySelector('#sub-languages .language-option.selected')?.dataset.value,
                    admin_main_language: document.querySelector('#admin-main-languages .language-option.selected')?.dataset.value,
                    admin_sub_language: document.querySelector('#admin-sub-languages .language-option.selected')?.dataset.value
                };

                const submitBtn = document.querySelector('#user-info-form button[type="submit"]');
                const loading = document.getElementById('user-info-loading');
                const text = document.getElementById('user-info-text');
                const errorDiv = document.getElementById('user-info-error');

                // Validate required fields
                if (!formData.business_activity_id || !formData.main_language || !formData.sub_language ||
                    !formData.admin_main_language || !formData.admin_sub_language) {
                    this.showError(errorDiv, '{{ __('tenant_registration.select_all_required') }}');
                    return;
                }

                this.showLoading(submitBtn, loading, text);

                try {
                    const response = await fetch('{{ route('tenant.register.get-user-info') }}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify(formData)
                    });

                    const data = await response.json();

                    if (data.status) {
                        this.username = data.username;
                        this.goToStep('success');
                        this.hideError(errorDiv);
                    } else {
                        this.showError(errorDiv, data.message);
                    }
                } catch (error) {
                    this.showError(errorDiv, error.message);
                } finally {
                    this.hideLoading(submitBtn, loading, text);
                }
            }

            async resendOTP() {
                const resendBtn = document.getElementById('resend-otp');
                resendBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> {{ __('tenant_registration.otp_resending') }}';
                resendBtn.disabled = true;

                try {
                    const response = await fetch('{{ route('tenant.register.check-mail') }}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
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
                    resendBtn.innerHTML = '{{ __('tenant_registration.otp_resend') }}';
                    resendBtn.disabled = false;
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

                // Update login link if going to success step
                if (step === 'success' && this.username) {
                    const loginLink = document.getElementById('login-link');
                    loginLink.href = `/${this.username}/dashboard/login`;
                }

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

        // Initialize the registration process
        document.addEventListener('DOMContentLoaded', () => {
            new TenantRegistration();
        });
    </script>
</body>

</html>
