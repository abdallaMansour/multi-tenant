<?php

return [
    // Page Title and Headers
    'page_title' => 'ロールと権限',
    'management_title' => 'ロールと権限管理',
    'breadcrumb_home' => 'ランドリック',
    'breadcrumb_current' => 'ロールと権限',

    // Table Headers
    'table_id' => 'ID',
    'table_name' => 'ロール名',
    'table_guard' => 'ガード',
    'table_permissions' => '権限',
    'table_users_count' => 'ユーザー',
    'table_created_at' => '作成日',
    'table_actions' => 'アクション',

    // Buttons
    'add_new_role' => '新しいロールを追加',
    'add_new_permission' => '新しい権限を追加',
    'save' => '保存',
    'cancel' => 'キャンセル',
    'close' => '閉じる',
    'edit' => '編集',
    'delete' => '削除',
    'view' => '表示',
    'assign_permissions' => '権限を割り当て',

    // Form Labels
    'role_name' => 'ロール名',
    'guard_name' => 'ガード名',
    'permissions' => '権限',
    'select_permissions' => '権限を選択',
    'required' => '必須',

    // Modal Titles
    'modal_create_title' => '新しいロールを作成',
    'modal_edit_title' => 'ロールを編集',
    'modal_delete_title' => 'ロールを削除',
    'modal_permissions_title' => '権限を割り当て',

    // Form Help Text
    'role_name_help' => 'ロールの一意の名前を入力してください',
    'guard_name_help' => 'このロールのガードを選択してください',
    'permissions_help' => 'このロールに割り当てる権限を選択してください',

    // Status Messages
    'role_created' => 'ロールが正常に作成されました',
    'role_updated' => 'ロールが正常に更新されました',
    'role_deleted' => 'ロールが正常に削除されました',
    'permissions_assigned' => '権限が正常に割り当てられました',

    // Error Messages
    'role_creation_failed' => 'ロールの作成に失敗しました',
    'role_update_failed' => 'ロールの更新に失敗しました',
    'role_deletion_failed' => 'ロールの削除に失敗しました',
    'permission_assignment_failed' => '権限の割り当てに失敗しました',
    'role_not_found' => 'ロールが見つかりません',
    'permission_denied' => '権限が拒否されました',

    // Validation Messages
    'name_required' => 'ロール名が必要です',
    'name_unique' => 'ロール名は既に存在します',
    'guard_required' => 'ガード名が必要です',
    'permissions_required' => '少なくとも1つの権限が必要です',

    // Confirmation Messages
    'confirm_delete' => 'このロールを削除してもよろしいですか？',
    'delete_warning' => 'この操作は元に戻せません。このロールを持つすべてのユーザーは権限を失います。',
    'delete_role_name' => 'ロールを削除: :name',

    // Empty State
    'no_roles_found' => 'ロールが見つかりません',
    'no_permissions_found' => '権限が見つかりません',
    'start_adding_roles' => '最初のロールを作成して開始してください。',

    // Success Messages
    'success_created' => 'ロールが正常に作成されました！',
    'success_updated' => 'ロールが正常に更新されました！',
    'success_deleted' => 'ロールが正常に削除されました！',
    'success_permissions_assigned' => '権限が正常に割り当てられました！',

    // Error Messages
    'error_created' => 'ロールを作成できません！',
    'error_updated' => 'ロールを更新できません！',
    'error_deleted' => 'ロールを削除できません！',
    'error_permissions_assigned' => '権限を割り当てられません！',

    // Toast Messages
    'toast_success' => '成功',
    'toast_error' => 'エラー',

    // Permission Categories
    'permission_tenant' => 'テナント管理',
    'permission_user' => 'ユーザー管理',
    'permission_role' => 'ロール管理',
    'permission_permission' => '権限管理',
    'permission_business_activity' => 'ビジネス活動管理',
    'permission_business_activity_requirement' => 'ビジネス活動要件',
    'permission_database_credential' => 'データベース認証情報',
    'permission_setting' => '設定管理',
    'permission_dashboard' => 'ダッシュボードアクセス',
    'permission_reports' => 'レポート',
    'permission_system' => 'システム管理',

    // Permission Actions
    'permission_create' => '作成',
    'permission_read' => '読み取り',
    'permission_update' => '更新',
    'permission_delete' => '削除',

    // Additional Messages
    'loading' => '読み込み中...',
    'please_wait' => 'お待ちください...',
    'try_again' => '再試行',
    'contact_support' => 'サポートに連絡',
    'no_permissions_selected' => '権限が選択されていません',
    'all_permissions_selected' => 'すべての権限が選択されています',
    'select_all' => 'すべて選択',
    'deselect_all' => 'すべて解除',
    'filter_permissions' => '権限をフィルター...',
    'search_roles' => 'ロールを検索...',
];
