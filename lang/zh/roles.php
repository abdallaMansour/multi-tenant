<?php

return [
    // Page Title and Headers
    'page_title' => '角色和权限',
    'management_title' => '角色和权限管理',
    'breadcrumb_home' => '兰德瑞克',
    'breadcrumb_current' => '角色和权限',

    // Table Headers
    'table_id' => 'ID',
    'table_name' => '角色名称',
    'table_guard' => '守卫',
    'table_permissions' => '权限',
    'table_users_count' => '用户',
    'table_created_at' => '创建时间',
    'table_actions' => '操作',

    // Buttons
    'add_new_role' => '添加新角色',
    'add_new_permission' => '添加新权限',
    'save' => '保存',
    'cancel' => '取消',
    'close' => '关闭',
    'edit' => '编辑',
    'delete' => '删除',
    'view' => '查看',
    'assign_permissions' => '分配权限',

    // Form Labels
    'role_name' => '角色名称',
    'guard_name' => '守卫名称',
    'permissions' => '权限',
    'select_permissions' => '选择权限',
    'required' => '必需',

    // Modal Titles
    'modal_create_title' => '创建新角色',
    'modal_edit_title' => '编辑角色',
    'modal_delete_title' => '删除角色',
    'modal_permissions_title' => '分配权限',

    // Form Help Text
    'role_name_help' => '输入角色的唯一名称',
    'guard_name_help' => '为此角色选择守卫',
    'permissions_help' => '选择要分配给此角色的权限',

    // Status Messages
    'role_created' => '角色创建成功',
    'role_updated' => '角色更新成功',
    'role_deleted' => '角色删除成功',
    'permissions_assigned' => '权限分配成功',

    // Error Messages
    'role_creation_failed' => '角色创建失败',
    'role_update_failed' => '角色更新失败',
    'role_deletion_failed' => '角色删除失败',
    'permission_assignment_failed' => '权限分配失败',
    'role_not_found' => '角色未找到',
    'permission_denied' => '权限被拒绝',

    // Validation Messages
    'name_required' => '角色名称是必需的',
    'name_unique' => '角色名称已存在',
    'guard_required' => '守卫名称是必需的',
    'permissions_required' => '至少需要一个权限',

    // Confirmation Messages
    'confirm_delete' => '您确定要删除此角色吗？',
    'delete_warning' => '此操作无法撤销。拥有此角色的所有用户将失去其权限。',
    'delete_role_name' => '删除角色：:name',

    // Empty State
    'no_roles_found' => '未找到角色',
    'no_permissions_found' => '未找到权限',
    'start_adding_roles' => '开始创建您的第一个角色。',

    // Success Messages
    'success_created' => '角色创建成功！',
    'success_updated' => '角色更新成功！',
    'success_deleted' => '角色删除成功！',
    'success_permissions_assigned' => '权限分配成功！',

    // Error Messages
    'error_created' => '无法创建角色！',
    'error_updated' => '无法更新角色！',
    'error_deleted' => '无法删除角色！',
    'error_permissions_assigned' => '无法分配权限！',

    // Toast Messages
    'toast_success' => '成功',
    'toast_error' => '错误',

    // Permission Categories
    'permission_tenant' => '租户管理',
    'permission_user' => '用户管理',
    'permission_role' => '角色管理',
    'permission_permission' => '权限管理',
    'permission_business_activity' => '商业活动管理',
    'permission_business_activity_requirement' => '商业活动要求',
    'permission_database_credential' => '数据库凭据',
    'permission_setting' => '设置管理',
    'permission_dashboard' => '仪表板访问',
    'permission_reports' => '报告',
    'permission_system' => '系统管理',

    // Permission Actions
    'permission_create' => '创建',
    'permission_read' => '读取',
    'permission_update' => '更新',
    'permission_delete' => '删除',

    // Additional Messages
    'loading' => '加载中...',
    'please_wait' => '请稍候...',
    'try_again' => '重试',
    'contact_support' => '联系支持',
    'no_permissions_selected' => '未选择权限',
    'all_permissions_selected' => '已选择所有权限',
    'select_all' => '全选',
    'deselect_all' => '取消全选',
    'filter_permissions' => '过滤权限...',
    'search_roles' => '搜索角色...',
];
