<?php

return [
    // Page Title and Headers
    'page_title' => 'Roles & Permissions',
    'management_title' => 'Roles & Permissions Management',
    'breadcrumb_home' => 'Landrick',
    'breadcrumb_current' => 'Roles & Permissions',

    // Table Headers
    'table_id' => 'ID',
    'table_name' => 'Role Name',
    'table_guard' => 'Guard',
    'table_permissions' => 'Permissions',
    'table_users_count' => 'Users',
    'table_created_at' => 'Created At',
    'table_actions' => 'Actions',

    // Buttons
    'add_new_role' => 'Add New Role',
    'add_new_permission' => 'Add New Permission',
    'save' => 'Save',
    'cancel' => 'Cancel',
    'close' => 'Close',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'view' => 'View',
    'assign_permissions' => 'Assign Permissions',

    // Form Labels
    'role_name' => 'Role Name',
    'guard_name' => 'Guard Name',
    'permissions' => 'Permissions',
    'select_permissions' => 'Select Permissions',
    'required' => 'Required',

    // Modal Titles
    'modal_create_title' => 'Create New Role',
    'modal_edit_title' => 'Edit Role',
    'modal_delete_title' => 'Delete Role',
    'modal_permissions_title' => 'Assign Permissions',

    // Form Help Text
    'role_name_help' => 'Enter a unique name for the role',
    'guard_name_help' => 'Select the guard for this role',
    'permissions_help' => 'Select the permissions to assign to this role',

    // Status Messages
    'role_created' => 'Role created successfully',
    'role_updated' => 'Role updated successfully',
    'role_deleted' => 'Role deleted successfully',
    'permissions_assigned' => 'Permissions assigned successfully',

    // Error Messages
    'role_creation_failed' => 'Failed to create role',
    'role_update_failed' => 'Failed to update role',
    'role_deletion_failed' => 'Failed to delete role',
    'permission_assignment_failed' => 'Failed to assign permissions',
    'role_not_found' => 'Role not found',
    'permission_denied' => 'Permission denied',

    // Validation Messages
    'name_required' => 'Role name is required',
    'name_unique' => 'Role name already exists',
    'guard_required' => 'Guard name is required',
    'permissions_required' => 'At least one permission is required',

    // Confirmation Messages
    'confirm_delete' => 'Are you sure you want to delete this role?',
    'delete_warning' => 'This action cannot be undone. All users with this role will lose their permissions.',
    'delete_role_name' => 'Delete Role: :name',

    // Empty State
    'no_roles_found' => 'No roles found',
    'no_permissions_found' => 'No permissions found',
    'start_adding_roles' => 'Start by creating your first role.',

    // Success Messages
    'success_created' => 'Role created successfully!',
    'success_updated' => 'Role updated successfully!',
    'success_deleted' => 'Role deleted successfully!',
    'success_permissions_assigned' => 'Permissions assigned successfully!',

    // Error Messages
    'error_created' => 'Unable to create role!',
    'error_updated' => 'Unable to update role!',
    'error_deleted' => 'Unable to delete role!',
    'error_permissions_assigned' => 'Unable to assign permissions!',

    // Toast Messages
    'toast_success' => 'Success',
    'toast_error' => 'Error',

    // Permission Categories
    'permission_tenant' => 'Tenant Management',
    'permission_user' => 'User Management',
    'permission_role' => 'Role Management',
    'permission_permission' => 'Permission Management',
    'permission_business_activity' => 'Business Activity Management',
    'permission_business_activity_requirement' => 'Business Activity Requirements',
    'permission_database_credential' => 'Database Credentials',
    'permission_setting' => 'Settings Management',
    'permission_dashboard' => 'Dashboard Access',
    'permission_reports' => 'Reports',
    'permission_system' => 'System Management',

    // Permission Actions
    'permission_create' => 'Create',
    'permission_read' => 'Read',
    'permission_update' => 'Update',
    'permission_delete' => 'Delete',

    // Additional Messages
    'loading' => 'Loading...',
    'please_wait' => 'Please wait...',
    'try_again' => 'Try again',
    'contact_support' => 'Contact support',
    'no_permissions_selected' => 'No permissions selected',
    'all_permissions_selected' => 'All permissions selected',
    'select_all' => 'Select All',
    'deselect_all' => 'Deselect All',
    'filter_permissions' => 'Filter permissions...',
    'search_roles' => 'Search roles...',
    'role_in_use' => 'Role is currently assigned to users',
];
