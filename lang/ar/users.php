<?php

return [
    // Page Title and Headers
    'page_title' => 'المستخدمون',
    'management_title' => 'إدارة المستخدمين',
    'breadcrumb_home' => 'لاندريك',
    'breadcrumb_current' => 'المستخدمون',

    // Table Headers
    'table_id' => 'المعرف',
    'table_name' => 'الاسم',
    'table_email' => 'البريد الإلكتروني',
    'table_roles' => 'الأدوار',
    'table_created_at' => 'تاريخ الإنشاء',
    'table_actions' => 'الإجراءات',

    // Buttons
    'add_new_user' => 'إضافة مستخدم جديد',
    'edit' => 'تعديل',
    'delete' => 'حذف',
    'view' => 'عرض',
    'save' => 'حفظ',
    'cancel' => 'إلغاء',
    'close' => 'إغلاق',
    'create_user' => 'إنشاء مستخدم',
    'update_user' => 'تحديث المستخدم',

    // Modal Titles
    'modal_create_title' => 'إنشاء مستخدم جديد',
    'modal_edit_title' => 'تعديل المستخدم',
    'modal_delete_title' => 'حذف المستخدم',
    'modal_view_title' => 'تفاصيل المستخدم',

    // Form Labels
    'form_name' => 'الاسم الكامل',
    'form_email' => 'عنوان البريد الإلكتروني',
    'form_password' => 'كلمة المرور',
    'form_password_confirmation' => 'تأكيد كلمة المرور',
    'form_roles' => 'تعيين الأدوار',
    'form_select_roles' => 'اختر الأدوار',

    // Form Placeholders
    'placeholder_name' => 'أدخل الاسم الكامل',
    'placeholder_email' => 'أدخل عنوان البريد الإلكتروني',
    'placeholder_password' => 'أدخل كلمة المرور',
    'placeholder_password_confirmation' => 'أكد كلمة المرور',

    // Form Help Text
    'help_password' => 'يجب أن تكون كلمة المرور 8 أحرف على الأقل',
    'help_roles' => 'اختر دوراً واحداً أو أكثر لهذا المستخدم',
    'help_password_optional' => 'اتركه فارغاً للاحتفاظ بكلمة المرور الحالية',

    // Status Messages
    'user_created' => 'تم إنشاء المستخدم بنجاح',
    'user_updated' => 'تم تحديث المستخدم بنجاح',
    'user_deleted' => 'تم حذف المستخدم بنجاح',
    'user_not_found' => 'المستخدم غير موجود',

    // Success Messages
    'success_created' => 'تم إنشاء المستخدم بنجاح!',
    'success_updated' => 'تم تحديث المستخدم بنجاح!',
    'success_deleted' => 'تم حذف المستخدم بنجاح!',
    'success_roles_assigned' => 'تم تعيين الأدوار بنجاح!',

    // Error Messages
    'error_created' => 'غير قادر على إنشاء المستخدم!',
    'error_updated' => 'غير قادر على تحديث المستخدم!',
    'error_deleted' => 'غير قادر على حذف المستخدم!',
    'error_roles_assigned' => 'غير قادر على تعيين الأدوار!',
    'error_cannot_delete_self' => 'لا يمكنك حذف حسابك الخاص!',
    'error_cannot_delete_last_super_admin' => 'لا يمكن حذف آخر مستخدم مشرف!',

    // Toast Messages
    'toast_success' => 'نجح',
    'toast_error' => 'خطأ',

    // Empty State
    'no_users_found' => 'لم يتم العثور على مستخدمين',
    'start_adding_users' => 'ابدأ بإضافة مستخدمك الأول.',
    'add_first_user' => 'إضافة أول مستخدم',

    // Additional Messages
    'loading' => 'جاري التحميل...',
    'please_wait' => 'يرجى الانتظار...',
    'try_again' => 'حاول مرة أخرى',
    'contact_support' => 'اتصل بالدعم',
    'total_users' => 'إجمالي المستخدمين',
    'users_with_roles' => 'المستخدمون مع الأدوار',
    'user_details' => 'تفاصيل المستخدم',
    'user_name' => 'اسم المستخدم',
    'user_email' => 'بريد المستخدم الإلكتروني',
    'assigned_roles' => 'الأدوار المخصصة',
    'no_roles' => 'لا توجد أدوار مخصصة',
    'search_users' => 'البحث في المستخدمين...',
    'filter_by_role' => 'تصفية حسب الدور...',
    'all_roles' => 'جميع الأدوار',
    'user_id' => 'معرف المستخدم',
    'created_at' => 'تاريخ الإنشاء',
    'updated_at' => 'تاريخ التحديث',
    'email_verified' => 'البريد الإلكتروني مؤكد',
    'email_not_verified' => 'البريد الإلكتروني غير مؤكد',
    'last_login' => 'آخر تسجيل دخول',
    'never_logged_in' => 'لم يسجل دخول أبداً',
    'active' => 'نشط',
    'inactive' => 'غير نشط',
    'super_admin' => 'مشرف عام',
    'admin' => 'مشرف',
    'manager' => 'مدير',
    'user' => 'مستخدم',
    'guest' => 'ضيف',
    'confirm_delete' => 'هل أنت متأكد؟',
    'modal_delete_message' => 'أنت على وشك حذف المستخدم:',
    'modal_delete_warning' => 'لا يمكن التراجع عن هذا الإجراء!',
    'user_in_use' => 'المستخدم نشط حالياً',
    'no_password_change' => 'لم يتم تغيير كلمة المرور',
    'password_changed' => 'تم تحديث كلمة المرور',
    'roles_updated' => 'تم تحديث الأدوار بنجاح',
    'profile_updated' => 'تم تحديث الملف الشخصي بنجاح',
];

