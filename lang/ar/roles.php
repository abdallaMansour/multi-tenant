<?php

return [
    // Page Title and Headers
    'page_title' => 'الأدوار والصلاحيات',
    'management_title' => 'إدارة الأدوار والصلاحيات',
    'breadcrumb_home' => 'لاندريك',
    'breadcrumb_current' => 'الأدوار والصلاحيات',

    // Table Headers
    'table_id' => 'المعرف',
    'table_name' => 'اسم الدور',
    'table_guard' => 'الحارس',
    'table_permissions' => 'الصلاحيات',
    'table_users_count' => 'المستخدمون',
    'table_created_at' => 'تاريخ الإنشاء',
    'table_actions' => 'الإجراءات',

    // Buttons
    'add_new_role' => 'إضافة دور جديد',
    'add_new_permission' => 'إضافة صلاحية جديدة',
    'save' => 'حفظ',
    'cancel' => 'إلغاء',
    'close' => 'إغلاق',
    'edit' => 'تعديل',
    'delete' => 'حذف',
    'view' => 'عرض',
    'assign_permissions' => 'تعيين الصلاحيات',

    // Form Labels
    'role_name' => 'اسم الدور',
    'guard_name' => 'اسم الحارس',
    'permissions' => 'الصلاحيات',
    'select_permissions' => 'اختر الصلاحيات',
    'required' => 'مطلوب',

    // Modal Titles
    'modal_create_title' => 'إنشاء دور جديد',
    'modal_edit_title' => 'تعديل الدور',
    'modal_delete_title' => 'حذف الدور',
    'modal_permissions_title' => 'تعيين الصلاحيات',

    // Form Help Text
    'role_name_help' => 'أدخل اسماً فريداً للدور',
    'guard_name_help' => 'اختر الحارس لهذا الدور',
    'permissions_help' => 'اختر الصلاحيات لتعيينها لهذا الدور',

    // Status Messages
    'role_created' => 'تم إنشاء الدور بنجاح',
    'role_updated' => 'تم تحديث الدور بنجاح',
    'role_deleted' => 'تم حذف الدور بنجاح',
    'permissions_assigned' => 'تم تعيين الصلاحيات بنجاح',

    // Error Messages
    'role_creation_failed' => 'فشل في إنشاء الدور',
    'role_update_failed' => 'فشل في تحديث الدور',
    'role_deletion_failed' => 'فشل في حذف الدور',
    'permission_assignment_failed' => 'فشل في تعيين الصلاحيات',
    'role_not_found' => 'الدور غير موجود',
    'permission_denied' => 'الصلاحية مرفوضة',

    // Validation Messages
    'name_required' => 'اسم الدور مطلوب',
    'name_unique' => 'اسم الدور موجود بالفعل',
    'guard_required' => 'اسم الحارس مطلوب',
    'permissions_required' => 'صلاحية واحدة على الأقل مطلوبة',

    // Confirmation Messages
    'confirm_delete' => 'هل أنت متأكد من حذف هذا الدور؟',
    'delete_warning' => 'لا يمكن التراجع عن هذا الإجراء. جميع المستخدمين الذين لديهم هذا الدور سيفقدون صلاحياتهم.',
    'delete_role_name' => 'حذف الدور: :name',

    // Empty State
    'no_roles_found' => 'لم يتم العثور على أدوار',
    'no_permissions_found' => 'لم يتم العثور على صلاحيات',
    'start_adding_roles' => 'ابدأ بإنشاء دورك الأول.',

    // Success Messages
    'success_created' => 'تم إنشاء الدور بنجاح!',
    'success_updated' => 'تم تحديث الدور بنجاح!',
    'success_deleted' => 'تم حذف الدور بنجاح!',
    'success_permissions_assigned' => 'تم تعيين الصلاحيات بنجاح!',

    // Error Messages
    'error_created' => 'غير قادر على إنشاء الدور!',
    'error_updated' => 'غير قادر على تحديث الدور!',
    'error_deleted' => 'غير قادر على حذف الدور!',
    'error_permissions_assigned' => 'غير قادر على تعيين الصلاحيات!',

    // Toast Messages
    'toast_success' => 'نجح',
    'toast_error' => 'خطأ',

    // Permission Categories
    'permission_tenant' => 'إدارة المستأجرين',
    'permission_user' => 'إدارة المستخدمين',
    'permission_role' => 'إدارة الأدوار',
    'permission_permission' => 'إدارة الصلاحيات',
    'permission_business_activity' => 'إدارة الأنشطة التجارية',
    'permission_business_activity_requirement' => 'متطلبات الأنشطة التجارية',
    'permission_database_credential' => 'بيانات اعتماد قاعدة البيانات',
    'permission_setting' => 'إدارة الإعدادات',
    'permission_dashboard' => 'الوصول للوحة التحكم',
    'permission_reports' => 'التقارير',
    'permission_system' => 'إدارة النظام',

    // Permission Actions
    'permission_create' => 'إنشاء',
    'permission_read' => 'قراءة',
    'permission_update' => 'تحديث',
    'permission_delete' => 'حذف',

    // Additional Messages
    'loading' => 'جاري التحميل...',
    'please_wait' => 'يرجى الانتظار...',
    'try_again' => 'حاول مرة أخرى',
    'contact_support' => 'اتصل بالدعم',
    'no_permissions_selected' => 'لم يتم اختيار صلاحيات',
    'all_permissions_selected' => 'تم اختيار جميع الصلاحيات',
    'select_all' => 'اختر الكل',
    'deselect_all' => 'إلغاء اختيار الكل',
    'filter_permissions' => 'تصفية الصلاحيات...',
    'search_roles' => 'البحث في الأدوار...',
];
