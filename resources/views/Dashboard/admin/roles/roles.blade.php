@include('dashboard_layouts.style')

<div class="page-wrapper toggled">
    <!-- sidebar-wrapper -->
    @include('dashboard_layouts.sidebar')
    <!-- sidebar-wrapper  -->

    <!-- Start Page Content -->
    <main class="page-content bg-light">
        <!-- Top Header -->
        @include('dashboard_layouts.header')
        <!-- Top Header -->

        <div class="container-fluid">
            <div class="layout-specing">
                <div class="d-md-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('roles.page_title') }}</h5>

                    <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                        <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">{{ __('roles.breadcrumb_home') }}</a></li>
                            <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ __('roles.breadcrumb_current') }}</li>
                        </ul>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card border-0 rounded shadow">
                            <div class="card-header bg-transparent border-bottom p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ __('roles.management_title') }}</h5>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRoleModal">
                                        <i class="ti ti-plus me-1"></i> {{ __('roles.add_new_role') }}
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-0">{{ __('roles.table_id') }}</th>
                                                <th class="border-0">{{ __('roles.table_name') }}</th>
                                                <th class="border-0">{{ __('roles.table_guard') }}</th>
                                                <th class="border-0">{{ __('roles.table_permissions') }}</th>
                                                <th class="border-0">{{ __('roles.table_users_count') }}</th>
                                                <th class="border-0">{{ __('roles.table_created_at') }}</th>
                                                <th class="border-0 text-center">{{ __('roles.table_actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($roles as $role)
                                                <tr>
                                                    <td class="border-0">{{ $role->id }}</td>
                                                    <td class="border-0">
                                                        <div class="d-flex align-items-center">
                                                            <span class="fw-medium">{{ $role->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="border-0">
                                                        <span class="badge bg-soft-info text-info">{{ $role->guard_name }}</span>
                                                    </td>
                                                    <td class="border-0">
                                                        <span class="badge bg-soft-success text-success">{{ $role->permissions->count() }} {{ __('roles.permissions') }}</span>
                                                    </td>
                                                    <td class="border-0">
                                                        <span class="badge bg-soft-warning text-warning">{{ $role->users->count() }} {{ __('roles.table_users_count') }}</span>
                                                    </td>
                                                    <td class="border-0">{{ $role->created_at->format('M d, Y') }}</td>
                                                    <td class="border-0 text-center">
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-soft-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editRoleModal"
                                                                data-role-id="{{ $role->id }}"
                                                                data-role-name="{{ $role->name }}"
                                                                data-role-guard="{{ $role->guard_name }}"
                                                                data-role-permissions="{{ $role->permissions->pluck('id')->toJson() }}">
                                                                <i class="ti ti-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-soft-info"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#permissionsModal"
                                                                data-role-id="{{ $role->id }}"
                                                                data-role-name="{{ $role->name }}"
                                                                data-role-permissions="{{ $role->permissions->pluck('id')->toJson() }}">
                                                                <i class="ti ti-key"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-soft-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteRoleModal"
                                                                data-role-id="{{ $role->id }}"
                                                                data-role-name="{{ $role->name }}">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center py-4">
                                                        <div class="text-muted">
                                                            <i class="ti ti-database-off fs-1 d-block mb-2"></i>
                                                            {{ __('roles.no_roles_found') }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->

        <!-- Footer Start -->
        @include('dashboard_layouts.footer')
        <!-- End -->
    </main>
    <!--End page-content" -->
</div>
<!-- page-wrapper -->

<!-- Offcanvas Start -->
@include('dashboard_layouts.themes')
<!-- Offcanvas End -->

<!-- Create Role Modal -->
<div class="modal fade" id="createRoleModal" tabindex="-1" aria-labelledby="createRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRoleModalLabel">{{ __('roles.modal_create_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('roles.close') }}"></button>
            </div>
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">{{ __('roles.role_name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            <small class="text-muted">{{ __('roles.role_name_help') }}</small>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="guard_name" class="form-label">{{ __('roles.guard_name') }} <span class="text-danger">*</span></label>
                            <select class="form-control @error('guard_name') is-invalid @enderror" id="guard_name" name="guard_name" required>
                                <option value="web" {{ old('guard_name') == 'web' ? 'selected' : '' }}>Web</option>
                                <option value="api" {{ old('guard_name') == 'api' ? 'selected' : '' }}>API</option>
                            </select>
                            <small class="text-muted">{{ __('roles.guard_name_help') }}</small>
                            @error('guard_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{ __('roles.permissions') }}</label>
                            <div class="permissions-container" id="createPermissionsContainer">
                                <!-- Permissions will be loaded here -->
                            </div>
                            <small class="text-muted">{{ __('roles.permissions_help') }}</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('roles.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('roles.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Role Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoleModalLabel">{{ __('roles.modal_edit_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('roles.close') }}"></button>
            </div>
            <form id="editRoleForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_name" class="form-label">{{ __('roles.role_name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_guard_name" class="form-label">{{ __('roles.guard_name') }} <span class="text-danger">*</span></label>
                            <select class="form-control" id="edit_guard_name" name="guard_name" required>
                                <option value="web">Web</option>
                                <option value="api">API</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{ __('roles.permissions') }}</label>
                            <div class="permissions-container" id="editPermissionsContainer">
                                <!-- Permissions will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('roles.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('roles.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Permissions Modal -->
<div class="modal fade" id="permissionsModal" tabindex="-1" aria-labelledby="permissionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permissionsModalLabel">{{ __('roles.modal_permissions_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('roles.close') }}"></button>
            </div>
            <form id="permissionsForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 id="permissionsRoleName"></h6>
                                <div>
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="selectAllPermissions">{{ __('roles.select_all') }}</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" id="deselectAllPermissions">{{ __('roles.deselect_all') }}</button>
                                </div>
                            </div>
                            <div class="permissions-container" id="permissionsContainer">
                                <!-- Permissions will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('roles.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('roles.assign_permissions') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Role Modal -->
<div class="modal fade" id="deleteRoleModal" tabindex="-1" aria-labelledby="deleteRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoleModalLabel">{{ __('roles.modal_delete_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('roles.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="ti ti-alert-triangle text-danger fs-1 mb-3"></i>
                    <h5>{{ __('roles.confirm_delete') }}</h5>
                    <p class="text-muted">{{ __('roles.delete_warning') }}</p>
                    <p class="text-danger small" id="deleteRoleName"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('roles.cancel') }}</button>
                <form id="deleteRoleForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('roles.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Success/Error Messages -->
@if (session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <i class="ti ti-check me-2"></i>
                <strong class="me-auto">{{ __('roles.toast_success') }}</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <i class="ti ti-alert-circle me-2"></i>
                <strong class="me-auto">{{ __('roles.toast_error') }}</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif

<!-- javascript -->
<!-- JAVASCRIPT -->
@include('dashboard_layouts.js')

<!-- Custom CSS for Table -->
<style>
    .table-hover tbody tr:hover {
        background-color: rgba(47, 85, 212, 0.05);
    }

    .btn-soft-primary {
        background-color: rgba(47, 85, 212, 0.1);
        border-color: rgba(47, 85, 212, 0.2);
        color: #2f55d4;
    }

    .btn-soft-primary:hover {
        background-color: rgba(47, 85, 212, 0.2);
        border-color: rgba(47, 85, 212, 0.3);
        color: #2f55d4;
    }

    .btn-soft-info {
        background-color: rgba(13, 202, 240, 0.1);
        border-color: rgba(13, 202, 240, 0.2);
        color: #0dcaf0;
    }

    .btn-soft-info:hover {
        background-color: rgba(13, 202, 240, 0.2);
        border-color: rgba(13, 202, 240, 0.3);
        color: #0dcaf0;
    }

    .btn-soft-danger {
        background-color: rgba(220, 53, 69, 0.1);
        border-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    .btn-soft-danger:hover {
        background-color: rgba(220, 53, 69, 0.2);
        border-color: rgba(220, 53, 69, 0.3);
        color: #dc3545;
    }

    .permission-category {
        margin-bottom: 1rem;
        padding: 1rem;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
    }

    .permission-category h6 {
        margin-bottom: 0.5rem;
        color: #495057;
    }

    .permission-item {
        margin-bottom: 0.5rem;
    }
</style>

<!-- Custom JavaScript for Roles -->
<script>
    let allPermissions = {};

    document.addEventListener('DOMContentLoaded', function() {
        // Load permissions when page loads
        loadPermissions();

        // Auto-hide toast messages after 5 seconds
        setTimeout(function() {
            const toasts = document.querySelectorAll('.toast');
            toasts.forEach(function(toast) {
                const bsToast = new bootstrap.Toast(toast);
                bsToast.hide();
            });
        }, 5000);

        // Edit Role Modal
        const editModal = document.getElementById('editRoleModal');
        const editForm = document.getElementById('editRoleForm');

        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const roleId = button.getAttribute('data-role-id');
            const roleName = button.getAttribute('data-role-name');
            const roleGuard = button.getAttribute('data-role-guard');
            const rolePermissions = JSON.parse(button.getAttribute('data-role-permissions'));

            // Update form action URL
            editForm.action = `/admin/roles/${roleId}`;

            // Populate form fields
            document.getElementById('edit_name').value = roleName;
            document.getElementById('edit_guard_name').value = roleGuard;

            // Load permissions for edit
            loadPermissionsForEdit(rolePermissions);
        });

        // Permissions Modal
        const permissionsModal = document.getElementById('permissionsModal');
        const permissionsForm = document.getElementById('permissionsForm');

        permissionsModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const roleId = button.getAttribute('data-role-id');
            const roleName = button.getAttribute('data-role-name');
            const rolePermissions = JSON.parse(button.getAttribute('data-role-permissions'));

            // Update form action URL
            permissionsForm.action = `/admin/roles/${roleId}/permissions`;

            // Update role name
            document.getElementById('permissionsRoleName').textContent = `{{ __('roles.assign_permissions') }}: ${roleName}`;

            // Load permissions
            loadPermissionsForModal(rolePermissions);
        });

        // Delete Role Modal
        const deleteModal = document.getElementById('deleteRoleModal');
        const deleteForm = document.getElementById('deleteRoleForm');

        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const roleId = button.getAttribute('data-role-id');
            const roleName = button.getAttribute('data-role-name');

            // Update form action URL
            deleteForm.action = `/admin/roles/${roleId}`;

            // Update role name in modal
            document.getElementById('deleteRoleName').textContent = `{{ __('roles.delete_role_name') }}`.replace(':name', roleName);
        });

        // Select All / Deselect All buttons
        document.getElementById('selectAllPermissions').addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('#permissionsContainer input[type="checkbox"]');
            checkboxes.forEach(checkbox => checkbox.checked = true);
        });

        document.getElementById('deselectAllPermissions').addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('#permissionsContainer input[type="checkbox"]');
            checkboxes.forEach(checkbox => checkbox.checked = false);
        });
    });

    function loadPermissions() {

        fetch('/admin/roles/permissions', {
            headers: {
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                allPermissions = data;
                loadPermissionsForCreate();
            })
            .catch(error => console.error('Error loading permissions:', error));
    }

    function loadPermissionsForCreate() {
        const container = document.getElementById('createPermissionsContainer');
        container.innerHTML = generatePermissionsHTML(allPermissions, []);
    }

    function loadPermissionsForEdit(selectedPermissions) {
        const container = document.getElementById('editPermissionsContainer');
        container.innerHTML = generatePermissionsHTML(allPermissions, selectedPermissions);
    }

    function loadPermissionsForModal(selectedPermissions) {
        const container = document.getElementById('permissionsContainer');
        container.innerHTML = generatePermissionsHTML(allPermissions, selectedPermissions);
    }

    function generatePermissionsHTML(permissions, selectedPermissions) {
        let html = '';

        Object.keys(permissions).forEach(category => {
            const categoryPermissions = permissions[category];
            const categoryName = getCategoryName(category);

            html += `
                <div class="permission-category">
                    <h6>${categoryName}</h6>
                    <div class="row">
            `;

            categoryPermissions.forEach(permission => {
                const isChecked = selectedPermissions.includes(permission.id) ? 'checked' : '';
                const actionName = getActionName(permission.name);

                html += `
                    <div class="col-md-6 col-lg-4 permission-item">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="${permission.name}" id="permission_${permission.id}" ${isChecked}>
                            <label class="form-check-label" for="permission_${permission.id}">
                                ${actionName}
                            </label>
                        </div>
                    </div>
                `;
            });

            html += `
                    </div>
                </div>
            `;
        });

        return html;
    }

    function getCategoryName(category) {
        const categoryNames = {
            'tenant': '{{ __('roles.permission_tenant') }}',
            'user': '{{ __('roles.permission_user') }}',
            'role': '{{ __('roles.permission_role') }}',
            'permission': '{{ __('roles.permission_permission') }}',
            'business-activity': '{{ __('roles.permission_business_activity') }}',
            'business-activity-requirement': '{{ __('roles.permission_business_activity_requirement') }}',
            'database-credential': '{{ __('roles.permission_database_credential') }}',
            'setting': '{{ __('roles.permission_setting') }}',
            'dashboard': '{{ __('roles.permission_dashboard') }}',
            'reports': '{{ __('roles.permission_reports') }}',
            'system': '{{ __('roles.permission_system') }}',
            'other': '{{ __('roles.permission_other') }}'
        };
        return categoryNames[category] || category;
    }

    function getActionName(permissionName) {
        const parts = permissionName.split('-');
        const action = parts[0];
        const actionNames = {
            'create': '{{ __('roles.permission_create') }}',
            'read': '{{ __('roles.permission_read') }}',
            'update': '{{ __('roles.permission_update') }}',
            'delete': '{{ __('roles.permission_delete') }}',
            'access': '{{ __('roles.permission_access') }}',
            'view': '{{ __('roles.permission_view') }}',
            'manage': '{{ __('roles.permission_manage') }}',
            'export': '{{ __('roles.permission_export') }}'
        };
        return actionNames[action] || action;
    }
</script>
</body>

</html>
