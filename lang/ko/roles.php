<?php

return [
    // Page Title and Headers
    'page_title' => '역할 및 권한',
    'management_title' => '역할 및 권한 관리',
    'breadcrumb_home' => '랜드릭',
    'breadcrumb_current' => '역할 및 권한',

    // Table Headers
    'table_id' => 'ID',
    'table_name' => '역할 이름',
    'table_guard' => '가드',
    'table_permissions' => '권한',
    'table_users_count' => '사용자',
    'table_created_at' => '생성일',
    'table_actions' => '작업',

    // Buttons
    'add_new_role' => '새 역할 추가',
    'add_new_permission' => '새 권한 추가',
    'save' => '저장',
    'cancel' => '취소',
    'close' => '닫기',
    'edit' => '편집',
    'delete' => '삭제',
    'view' => '보기',
    'assign_permissions' => '권한 할당',

    // Form Labels
    'role_name' => '역할 이름',
    'guard_name' => '가드 이름',
    'permissions' => '권한',
    'select_permissions' => '권한 선택',
    'required' => '필수',

    // Modal Titles
    'modal_create_title' => '새 역할 만들기',
    'modal_edit_title' => '역할 편집',
    'modal_delete_title' => '역할 삭제',
    'modal_permissions_title' => '권한 할당',

    // Form Help Text
    'role_name_help' => '역할의 고유한 이름을 입력하세요',
    'guard_name_help' => '이 역할의 가드를 선택하세요',
    'permissions_help' => '이 역할에 할당할 권한을 선택하세요',

    // Status Messages
    'role_created' => '역할이 성공적으로 생성되었습니다',
    'role_updated' => '역할이 성공적으로 업데이트되었습니다',
    'role_deleted' => '역할이 성공적으로 삭제되었습니다',
    'permissions_assigned' => '권한이 성공적으로 할당되었습니다',

    // Error Messages
    'role_creation_failed' => '역할 생성에 실패했습니다',
    'role_update_failed' => '역할 업데이트에 실패했습니다',
    'role_deletion_failed' => '역할 삭제에 실패했습니다',
    'permission_assignment_failed' => '권한 할당에 실패했습니다',
    'role_not_found' => '역할을 찾을 수 없습니다',
    'permission_denied' => '권한이 거부되었습니다',

    // Validation Messages
    'name_required' => '역할 이름이 필요합니다',
    'name_unique' => '역할 이름이 이미 존재합니다',
    'guard_required' => '가드 이름이 필요합니다',
    'permissions_required' => '최소 하나의 권한이 필요합니다',

    // Confirmation Messages
    'confirm_delete' => '이 역할을 삭제하시겠습니까?',
    'delete_warning' => '이 작업은 되돌릴 수 없습니다. 이 역할을 가진 모든 사용자는 권한을 잃게 됩니다.',
    'delete_role_name' => '역할 삭제: :name',

    // Empty State
    'no_roles_found' => '역할을 찾을 수 없습니다',
    'no_permissions_found' => '권한을 찾을 수 없습니다',
    'start_adding_roles' => '첫 번째 역할을 만들어 시작하세요.',

    // Success Messages
    'success_created' => '역할이 성공적으로 생성되었습니다!',
    'success_updated' => '역할이 성공적으로 업데이트되었습니다!',
    'success_deleted' => '역할이 성공적으로 삭제되었습니다!',
    'success_permissions_assigned' => '권한이 성공적으로 할당되었습니다!',

    // Error Messages
    'error_created' => '역할을 생성할 수 없습니다!',
    'error_updated' => '역할을 업데이트할 수 없습니다!',
    'error_deleted' => '역할을 삭제할 수 없습니다!',
    'error_permissions_assigned' => '권한을 할당할 수 없습니다!',

    // Toast Messages
    'toast_success' => '성공',
    'toast_error' => '오류',

    // Permission Categories
    'permission_tenant' => '테넌트 관리',
    'permission_user' => '사용자 관리',
    'permission_role' => '역할 관리',
    'permission_permission' => '권한 관리',
    'permission_business_activity' => '비즈니스 활동 관리',
    'permission_business_activity_requirement' => '비즈니스 활동 요구사항',
    'permission_database_credential' => '데이터베이스 자격 증명',
    'permission_setting' => '설정 관리',
    'permission_dashboard' => '대시보드 액세스',
    'permission_reports' => '보고서',
    'permission_system' => '시스템 관리',

    // Permission Actions
    'permission_create' => '생성',
    'permission_read' => '읽기',
    'permission_update' => '업데이트',
    'permission_delete' => '삭제',

    // Additional Messages
    'loading' => '로딩 중...',
    'please_wait' => '잠시 기다려 주세요...',
    'try_again' => '다시 시도',
    'contact_support' => '지원팀에 문의',
    'no_permissions_selected' => '선택된 권한이 없습니다',
    'all_permissions_selected' => '모든 권한이 선택되었습니다',
    'select_all' => '모두 선택',
    'deselect_all' => '모두 선택 해제',
    'filter_permissions' => '권한 필터링...',
    'search_roles' => '역할 검색...',
];
