<!doctype html>
<html lang="en" dir="rtl">

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
    </style>
</head>

<body>
    <img src="{{ asset('assets/images/pg-taif.png') }}" class="pg-taif" alt="">
    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card form-signin p-4 rounded shadow z-3">
                        <form action="{{ route('tenant.login') }}" method="post">
                            @csrf
                            <a href="index.html"><img src="{{ asset('assets/images/logo-dark.png') }}"
                                    class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                            <h5 class="mb-3 text-center">قم بتسجيل الدخول</h5>

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"
                                    placeholder="name@example.com">
                                <label for="floatingInput">البريد الإلكتروني</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                                    placeholder="Password">
                                <label for="floatingPassword">كلمة المرور</label>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">تسجيل الدخول</button>

                            <p class="mb-0 text-muted mt-3 text-center">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> طيف.
                            </p>
                        </form>
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

</body>

</html>
