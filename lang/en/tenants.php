<?php

return [
    // Page Title and Headers
    'page_title' => 'Tenants',
    'management_title' => 'Tenants Management',
    'breadcrumb_home' => 'Landrick',
    'breadcrumb_current' => 'Tenants',

    // Table Headers
    'table_id' => 'ID',
    'table_name' => 'Name',
    'table_username' => 'Username',
    'table_email' => 'Email',
    'table_phone' => 'Phone',
    'table_is_active' => 'Is Active',
    'table_created_at' => 'Created At',
    'table_actions' => 'Actions',

    // Status Labels
    'status_active' => 'Active',
    'status_inactive' => 'Inactive',

    // Buttons
    'add_new_tenant' => 'Add New Tenant',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'save' => 'Save',
    'cancel' => 'Cancel',
    'close' => 'Close',
    'create_tenant' => 'Create Tenant',
    'update_tenant' => 'Update Tenant',
    'delete_tenant' => 'Delete Tenant',

    // Form Labels
    'form_tenant_name' => 'Tenant Name',
    'form_username' => 'Username',
    'form_email' => 'Email',
    'form_phone' => 'Phone',
    'form_password' => 'Password',
    'form_required' => 'Required',

    // Modal Titles
    'modal_create_title' => 'Create New Tenant',
    'modal_edit_title' => 'Edit Tenant',
    'modal_delete_title' => 'Delete Tenant',

    // Modal Messages
    'modal_delete_message' => 'Are you sure?',
    'modal_delete_description' => 'You are about to delete tenant:',
    'modal_delete_warning' => 'This action cannot be undone!',

    // Empty State
    'empty_title' => 'No Tenants Found',
    'empty_message' => 'No tenants found. Create your first tenant!',

    // Success Messages
    'success_created' => 'Tenant created successfully!',
    'success_updated' => 'Tenant updated successfully!',
    'success_deleted' => 'Tenant deleted successfully!',
    'success_toggled' => 'Tenant status updated successfully!',
    'success_activated' => 'Tenant activated successfully!',

    // Error Messages
    'error_created' => 'Failed to create tenant!',
    'error_updated' => 'Failed to update tenant!',
    'error_deleted' => 'Failed to delete tenant!',
    'error_toggled' => 'Failed to update tenant status!',
    'error_network' => 'Network error occurred',
    'error_no_database_credential' => 'There is no active database credential found',
    'error_username_exists' => 'Username already exists',

    // Toast Messages
    'toast_success' => 'Success',
    'toast_error' => 'Error',

    // Placeholders
    'placeholder_tenant_name' => 'Enter tenant name',
    'placeholder_username' => 'Enter username',
    'placeholder_email' => 'Enter email address',
    'placeholder_phone' => 'Enter phone number',
    'placeholder_password' => 'Enter password',

    // Tooltips
    'tooltip_edit' => 'Edit tenant',
    'tooltip_delete' => 'Delete tenant',
    'tooltip_toggle' => 'Toggle active status',

    // Confirmation Messages
    'confirm_delete' => 'Are you sure?',
    'confirm_delete_description' => 'This action cannot be undone.',

    // Additional Messages
    'password_leave_blank' => 'Leave blank if you don\'t want to change the password',
    'password_min_length' => 'Password must be at least 6 characters long.',
];
