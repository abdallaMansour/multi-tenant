<?php

return [
    // Page Title and Headers
    'page_title' => 'ভূমিকা ও অনুমতি',
    'management_title' => 'ভূমিকা ও অনুমতি ব্যবস্থাপনা',
    'breadcrumb_home' => 'ল্যান্ডরিক',
    'breadcrumb_current' => 'ভূমিকা ও অনুমতি',

    // Table Headers
    'table_id' => 'আইডি',
    'table_name' => 'ভূমিকার নাম',
    'table_guard' => 'গার্ড',
    'table_permissions' => 'অনুমতি',
    'table_users_count' => 'ব্যবহারকারী',
    'table_created_at' => 'তৈরি হয়েছে',
    'table_actions' => 'ক্রিয়া',

    // Buttons
    'add_new_role' => 'নতুন ভূমিকা যোগ করুন',
    'add_new_permission' => 'নতুন অনুমতি যোগ করুন',
    'save' => 'সংরক্ষণ',
    'cancel' => 'বাতিল',
    'close' => 'বন্ধ',
    'edit' => 'সম্পাদনা',
    'delete' => 'মুছে ফেলুন',
    'view' => 'দেখুন',
    'assign_permissions' => 'অনুমতি নির্ধারণ করুন',

    // Form Labels
    'role_name' => 'ভূমিকার নাম',
    'guard_name' => 'গার্ডের নাম',
    'permissions' => 'অনুমতি',
    'select_permissions' => 'অনুমতি নির্বাচন করুন',
    'required' => 'প্রয়োজনীয়',

    // Modal Titles
    'modal_create_title' => 'নতুন ভূমিকা তৈরি করুন',
    'modal_edit_title' => 'ভূমিকা সম্পাদনা করুন',
    'modal_delete_title' => 'ভূমিকা মুছে ফেলুন',
    'modal_permissions_title' => 'অনুমতি নির্ধারণ করুন',

    // Form Help Text
    'role_name_help' => 'ভূমিকার জন্য একটি অনন্য নাম লিখুন',
    'guard_name_help' => 'এই ভূমিকার জন্য গার্ড নির্বাচন করুন',
    'permissions_help' => 'এই ভূমিকায় নির্ধারণের জন্য অনুমতি নির্বাচন করুন',

    // Status Messages
    'role_created' => 'ভূমিকা সফলভাবে তৈরি হয়েছে',
    'role_updated' => 'ভূমিকা সফলভাবে আপডেট হয়েছে',
    'role_deleted' => 'ভূমিকা সফলভাবে মুছে ফেলা হয়েছে',
    'permissions_assigned' => 'অনুমতি সফলভাবে নির্ধারণ করা হয়েছে',

    // Error Messages
    'role_creation_failed' => 'ভূমিকা তৈরি করতে ব্যর্থ',
    'role_update_failed' => 'ভূমিকা আপডেট করতে ব্যর্থ',
    'role_deletion_failed' => 'ভূমিকা মুছে ফেলতে ব্যর্থ',
    'permission_assignment_failed' => 'অনুমতি নির্ধারণ করতে ব্যর্থ',
    'role_not_found' => 'ভূমিকা পাওয়া যায়নি',
    'permission_denied' => 'অনুমতি অস্বীকার করা হয়েছে',

    // Validation Messages
    'name_required' => 'ভূমিকার নাম প্রয়োজন',
    'name_unique' => 'ভূমিকার নাম ইতিমধ্যে বিদ্যমান',
    'guard_required' => 'গার্ডের নাম প্রয়োজন',
    'permissions_required' => 'কমপক্ষে একটি অনুমতি প্রয়োজন',

    // Confirmation Messages
    'confirm_delete' => 'আপনি কি এই ভূমিকা মুছে ফেলতে নিশ্চিত?',
    'delete_warning' => 'এই ক্রিয়াটি পূর্বাবস্থায় ফেরানো যাবে না। এই ভূমিকাযুক্ত সকল ব্যবহারকারী তাদের অনুমতি হারাবেন।',
    'delete_role_name' => 'ভূমিকা মুছে ফেলুন: :name',

    // Empty State
    'no_roles_found' => 'কোনো ভূমিকা পাওয়া যায়নি',
    'no_permissions_found' => 'কোনো অনুমতি পাওয়া যায়নি',
    'start_adding_roles' => 'আপনার প্রথম ভূমিকা তৈরি করে শুরু করুন।',

    // Success Messages
    'success_created' => 'ভূমিকা সফলভাবে তৈরি হয়েছে!',
    'success_updated' => 'ভূমিকা সফলভাবে আপডেট হয়েছে!',
    'success_deleted' => 'ভূমিকা সফলভাবে মুছে ফেলা হয়েছে!',
    'success_permissions_assigned' => 'অনুমতি সফলভাবে নির্ধারণ করা হয়েছে!',

    // Error Messages
    'error_created' => 'ভূমিকা তৈরি করতে অক্ষম!',
    'error_updated' => 'ভূমিকা আপডেট করতে অক্ষম!',
    'error_deleted' => 'ভূমিকা মুছে ফেলতে অক্ষম!',
    'error_permissions_assigned' => 'অনুমতি নির্ধারণ করতে অক্ষম!',

    // Toast Messages
    'toast_success' => 'সফল',
    'toast_error' => 'ত্রুটি',

    // Permission Categories
    'permission_tenant' => 'টেন্যান্ট ব্যবস্থাপনা',
    'permission_user' => 'ব্যবহারকারী ব্যবস্থাপনা',
    'permission_role' => 'ভূমিকা ব্যবস্থাপনা',
    'permission_permission' => 'অনুমতি ব্যবস্থাপনা',
    'permission_business_activity' => 'ব্যবসায়িক কার্যক্রম ব্যবস্থাপনা',
    'permission_business_activity_requirement' => 'ব্যবসায়িক কার্যক্রমের প্রয়োজনীয়তা',
    'permission_database_credential' => 'ডেটাবেস পরিচয়পত্র',
    'permission_setting' => 'সেটিংস ব্যবস্থাপনা',
    'permission_dashboard' => 'ড্যাশবোর্ড অ্যাক্সেস',
    'permission_reports' => 'রিপোর্ট',
    'permission_system' => 'সিস্টেম ব্যবস্থাপনা',

    // Permission Actions
    'permission_create' => 'তৈরি করুন',
    'permission_read' => 'পড়ুন',
    'permission_update' => 'আপডেট করুন',
    'permission_delete' => 'মুছে ফেলুন',

    // Additional Messages
    'loading' => 'লোড হচ্ছে...',
    'please_wait' => 'দয়া করে অপেক্ষা করুন...',
    'try_again' => 'আবার চেষ্টা করুন',
    'contact_support' => 'সাপোর্টে যোগাযোগ করুন',
    'no_permissions_selected' => 'কোনো অনুমতি নির্বাচিত নয়',
    'all_permissions_selected' => 'সকল অনুমতি নির্বাচিত',
    'select_all' => 'সব নির্বাচন করুন',
    'deselect_all' => 'সব নির্বাচন বাতিল করুন',
    'filter_permissions' => 'অনুমতি ফিল্টার করুন...',
    'search_roles' => 'ভূমিকা অনুসন্ধান করুন...',
];
