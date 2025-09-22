<!doctype html>
<html lang="en" dir="ltr">

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
</head>

<body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400;">

    <!-- Hero Start -->
    <div style="margin-top: 50px;">
        <table cellpadding="0" cellspacing="0"
            style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
            <thead>
                <tr
                    style="
                    background-color: #2f55d4;
                    padding: 3px 0;
                    border: none;
                    line-height: 68px;
                    text-align: center;
                    color: #fff;
                    font-size: 24px;
                    letter-spacing: 1px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    ">
                    <th scope="col" style="display:flex"><img src="{{ asset('assets/images/logo-light.png') }}" height="48" style="margin: 10px 0px;" alt=""></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
                        Welcome to {{ env('APP_NAME') }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 15px 24px 15px; color: #8492a6;">
                        Thanks for creating an {{ env('APP_NAME') }} account. To continue, please confirm your email address by using the following OTP code :
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;margin: 10px 0px;display:block">
                        {{ $otpCode }}
                    </td>
                </tr>


                <tr>
                    <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> {{ env('APP_NAME') }}.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Hero End -->
</body>

</html>
