<?php

return [
    // Page Title and Headers
    'page_title' => 'भूमिकाएं और अनुमतियां',
    'management_title' => 'भूमिकाएं और अनुमतियां प्रबंधन',
    'breadcrumb_home' => 'लैंडरिक',
    'breadcrumb_current' => 'भूमिकाएं और अनुमतियां',

    // Table Headers
    'table_id' => 'आईडी',
    'table_name' => 'भूमिका का नाम',
    'table_guard' => 'गार्ड',
    'table_permissions' => 'अनुमतियां',
    'table_users_count' => 'उपयोगकर्ता',
    'table_created_at' => 'बनाया गया',
    'table_actions' => 'क्रियाएं',

    // Buttons
    'add_new_role' => 'नई भूमिका जोड़ें',
    'add_new_permission' => 'नई अनुमति जोड़ें',
    'save' => 'सहेजें',
    'cancel' => 'रद्द करें',
    'close' => 'बंद करें',
    'edit' => 'संपादित करें',
    'delete' => 'हटाएं',
    'view' => 'देखें',
    'assign_permissions' => 'अनुमतियां असाइन करें',

    // Form Labels
    'role_name' => 'भूमिका का नाम',
    'guard_name' => 'गार्ड का नाम',
    'permissions' => 'अनुमतियां',
    'select_permissions' => 'अनुमतियां चुनें',
    'required' => 'आवश्यक',

    // Modal Titles
    'modal_create_title' => 'नई भूमिका बनाएं',
    'modal_edit_title' => 'भूमिका संपादित करें',
    'modal_delete_title' => 'भूमिका हटाएं',
    'modal_permissions_title' => 'अनुमतियां असाइन करें',

    // Form Help Text
    'role_name_help' => 'भूमिका के लिए एक अनूठा नाम दर्ज करें',
    'guard_name_help' => 'इस भूमिका के लिए गार्ड चुनें',
    'permissions_help' => 'इस भूमिका को असाइन करने के लिए अनुमतियां चुनें',

    // Status Messages
    'role_created' => 'भूमिका सफलतापूर्वक बनाई गई',
    'role_updated' => 'भूमिका सफलतापूर्वक अपडेट की गई',
    'role_deleted' => 'भूमिका सफलतापूर्वक हटाई गई',
    'permissions_assigned' => 'अनुमतियां सफलतापूर्वक असाइन की गईं',

    // Error Messages
    'role_creation_failed' => 'भूमिका बनाने में विफल',
    'role_update_failed' => 'भूमिका अपडेट करने में विफल',
    'role_deletion_failed' => 'भूमिका हटाने में विफल',
    'permission_assignment_failed' => 'अनुमतियां असाइन करने में विफल',
    'role_not_found' => 'भूमिका नहीं मिली',
    'permission_denied' => 'अनुमति अस्वीकृत',

    // Validation Messages
    'name_required' => 'भूमिका का नाम आवश्यक है',
    'name_unique' => 'भूमिका का नाम पहले से मौजूद है',
    'guard_required' => 'गार्ड का नाम आवश्यक है',
    'permissions_required' => 'कम से कम एक अनुमति आवश्यक है',

    // Confirmation Messages
    'confirm_delete' => 'क्या आप वाकई इस भूमिका को हटाना चाहते हैं?',
    'delete_warning' => 'इस क्रिया को पूर्ववत नहीं किया जा सकता। इस भूमिका वाले सभी उपयोगकर्ता अपनी अनुमतियां खो देंगे।',
    'delete_role_name' => 'भूमिका हटाएं: :name',

    // Empty State
    'no_roles_found' => 'कोई भूमिका नहीं मिली',
    'no_permissions_found' => 'कोई अनुमति नहीं मिली',
    'start_adding_roles' => 'अपनी पहली भूमिका बनाकर शुरू करें।',

    // Success Messages
    'success_created' => 'भूमिका सफलतापूर्वक बनाई गई!',
    'success_updated' => 'भूमिका सफलतापूर्वक अपडेट की गई!',
    'success_deleted' => 'भूमिका सफलतापूर्वक हटाई गई!',
    'success_permissions_assigned' => 'अनुमतियां सफलतापूर्वक असाइन की गईं!',

    // Error Messages
    'error_created' => 'भूमिका बनाने में असमर्थ!',
    'error_updated' => 'भूमिका अपडेट करने में असमर्थ!',
    'error_deleted' => 'भूमिका हटाने में असमर्थ!',
    'error_permissions_assigned' => 'अनुमतियां असाइन करने में असमर्थ!',

    // Toast Messages
    'toast_success' => 'सफल',
    'toast_error' => 'त्रुटि',

    // Permission Categories
    'permission_tenant' => 'टेनेंट प्रबंधन',
    'permission_user' => 'उपयोगकर्ता प्रबंधन',
    'permission_role' => 'भूमिका प्रबंधन',
    'permission_permission' => 'अनुमति प्रबंधन',
    'permission_business_activity' => 'व्यावसायिक गतिविधि प्रबंधन',
    'permission_business_activity_requirement' => 'व्यावसायिक गतिविधि आवश्यकताएं',
    'permission_database_credential' => 'डेटाबेस क्रेडेंशियल',
    'permission_setting' => 'सेटिंग्स प्रबंधन',
    'permission_dashboard' => 'डैशबोर्ड एक्सेस',
    'permission_reports' => 'रिपोर्ट्स',
    'permission_system' => 'सिस्टम प्रबंधन',

    // Permission Actions
    'permission_create' => 'बनाएं',
    'permission_read' => 'पढ़ें',
    'permission_update' => 'अपडेट करें',
    'permission_delete' => 'हटाएं',

    // Additional Messages
    'loading' => 'लोड हो रहा है...',
    'please_wait' => 'कृपया प्रतीक्षा करें...',
    'try_again' => 'फिर से कोशिश करें',
    'contact_support' => 'सहायता से संपर्क करें',
    'no_permissions_selected' => 'कोई अनुमति चयनित नहीं',
    'all_permissions_selected' => 'सभी अनुमतियां चयनित',
    'select_all' => 'सभी चुनें',
    'deselect_all' => 'सभी अचयनित करें',
    'filter_permissions' => 'अनुमतियां फिल्टर करें...',
    'search_roles' => 'भूमिकाएं खोजें...',
];
