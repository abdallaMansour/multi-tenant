<?php

return [
    // Page Title
    'page_title' => 'تسجيل المستأجر',

    // Step Titles
    'step_email' => 'البريد الإلكتروني',
    'step_verify_otp' => 'التحقق من رمز OTP',
    'step_user_info' => 'معلومات المستخدم',

    // Step 1: Email
    'email_title' => 'أدخل عنوان بريدك الإلكتروني',
    'email_description' => 'سنرسل لك رمز التحقق لتأكيد بريدك الإلكتروني.',
    'email_label' => 'عنوان البريد الإلكتروني',
    'email_placeholder' => 'أدخل عنوان بريدك الإلكتروني',
    'email_sending' => 'جاري الإرسال...',
    'email_button' => 'إرسال رمز التحقق',

    // Step 2: OTP Verification
    'otp_title' => 'تحقق من بريدك الإلكتروني',
    'otp_description' => 'أدخل الرمز المكون من 4 أرقام المرسل إلى عنوان بريدك الإلكتروني.',
    'otp_verifying' => 'جاري التحقق...',
    'otp_button' => 'تحقق من الرمز',
    'otp_resend' => 'إعادة إرسال الرمز',
    'otp_resending' => 'جاري إعادة الإرسال...',
    'otp_invalid' => 'يرجى إدخال رمز صحيح مكون من 4 أرقام.',

    // Step 3: User Information
    'user_info_title' => 'أكمل ملفك الشخصي',
    'user_info_description' => 'يرجى تقديم معلوماتك لإكمال التسجيل.',
    'name_label' => 'الاسم الكامل',
    'name_placeholder' => 'أدخل اسمك الكامل',
    'phone_label' => 'رقم الهاتف',
    'phone_placeholder' => 'أدخل رقم هاتفك',
    'business_activity_label' => 'النشاط التجاري',
    'main_language_label' => 'اللغة الرئيسية للموقع',
    'sub_language_label' => 'اللغة الفرعية للموقع',
    'admin_main_language_label' => 'اللغة الرئيسية لوحة الإدارة',
    'admin_sub_language_label' => 'اللغة الفرعية لوحة الإدارة',
    'completing' => 'جاري الإكمال...',
    'complete_registration' => 'إكمال التسجيل',
    'previous' => 'السابق',
    'select_all_required' => 'يرجى اختيار جميع الخيارات المطلوبة.',

    // Success Step
    'success_title' => 'تم التسجيل بنجاح!',
    'success_description' => 'تم إنشاء حساب المستأجر بنجاح. يمكنك الآن الوصول إلى لوحة التحكم.',
    'go_to_login' => 'الذهاب لتسجيل الدخول',

    // Language Options
    'language_english' => 'الإنجليزية',
    'language_arabic' => 'العربية',
    'language_french' => 'الفرنسية',
    'language_spanish' => 'الإسبانية',
    'language_bengali' => 'البنغالية',
    'language_hindi' => 'الهندية',
    'language_japanese' => 'اليابانية',
    'language_korean' => 'الكورية',
    'language_malayalam' => 'المالايالامية',
    'language_portuguese' => 'البرتغالية',
    'language_chinese' => 'الصينية',

    // Controller Messages
    'mail_sent' => 'تم إرسال البريد',
    'invalid_otp' => 'رمز OTP غير صحيح',
    'otp_expired' => 'انتهت صلاحية رمز OTP',
    'email_verified' => 'تم التحقق من البريد الإلكتروني بنجاح',
    'no_database_credential' => 'لم يتم العثور على بيانات اعتماد قاعدة بيانات نشطة',
    'invalid_otp_expired' => 'رمز OTP غير صحيح أو منتهي الصلاحية',
    'username_exists' => 'اسم المستخدم موجود بالفعل',
    'registration_completed' => 'تم إكمال التسجيل بنجاح',

    // Error Messages
    'error_occurred' => 'حدث خطأ',
    'network_error' => 'حدث خطأ في الشبكة',
    'validation_error' => 'خطأ في التحقق',
    'server_error' => 'حدث خطأ في الخادم',

    // Form Validation
    'email_required' => 'عنوان البريد الإلكتروني مطلوب',
    'email_invalid' => 'يرجى إدخال عنوان بريد إلكتروني صحيح',
    'name_required' => 'الاسم الكامل مطلوب',
    'phone_required' => 'رقم الهاتف مطلوب',
    'business_activity_required' => 'النشاط التجاري مطلوب',
    'main_language_required' => 'اللغة الرئيسية مطلوبة',
    'sub_language_required' => 'اللغة الفرعية مطلوبة',
    'admin_main_language_required' => 'اللغة الرئيسية لوحة الإدارة مطلوبة',
    'admin_sub_language_required' => 'اللغة الفرعية لوحة الإدارة مطلوبة',

    // Additional Messages
    'loading' => 'جاري التحميل...',
    'please_wait' => 'يرجى الانتظار...',
    'try_again' => 'حاول مرة أخرى',
    'contact_support' => 'اتصل بالدعم',
];
