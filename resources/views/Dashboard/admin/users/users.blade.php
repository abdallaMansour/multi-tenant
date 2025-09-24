@include("dashboard_layouts.style")

<div class="page-wrapper toggled">
    <!-- sidebar-wrapper -->
    @include("dashboard_layouts.sidebar")
    <!-- sidebar-wrapper  -->

    <!-- Start Page Content -->
    <main class="page-content bg-light">
        <!-- Top Header -->
        @include("dashboard_layouts.header")
        <!-- Top Header -->

        <div class="container-fluid">
            <div class="layout-specing">
                <div class="d-md-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('users.page_title') }}</h5>

                    <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                        <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">{{ __('users.breadcrumb_home') }}</a></li>
                            <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ __('users.breadcrumb_current') }}</li>
                        </ul>
                    </nav>
                </div>
            
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card border-0 rounded shadow">
                            <div class="card-header bg-transparent border-bottom p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ __('users.management_title') }}</h5>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createUserModal">
                                            <i class="ti ti-plus me-1"></i> {{ __('users.add_new_user') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <!-- Search and Filter -->
                                <div class="p-3 border-bottom">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ti ti-search"></i></span>
                                                <input type="text" class="form-control" id="searchUsers" placeholder="{{ __('users.search_users') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select" id="filterRole">
                                                <option value="">{{ __('users.all_roles') }}</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                                <!-- Roles will be loaded dynamically -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Users Table -->
                                <div class="table-responsive">
                                    <table class="table table-center table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-bottom-0">{{ __('users.table_id') }}</th>
                                                <th class="border-bottom-0">{{ __('users.table_name') }}</th>
                                                <th class="border-bottom-0">{{ __('users.table_email') }}</th>
                                                <th class="border-bottom-0">{{ __('users.table_roles') }}</th>
                                                <th class="border-bottom-0">{{ __('users.table_created_at') }}</th>
                                                <th class="border-bottom-0 text-center">{{ __('users.table_actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-xs me-2">
                                                                <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                    {{ substr($user->name, 0, 1) }}
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0">{{ $user->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if($user->roles->count() > 0)
                                                            @foreach($user->roles as $role)
                                                                <span class="badge bg-soft-primary text-primary me-1">{{ $role->name }}</span>
                                                            @endforeach
                                                        @else
                                                            <span class="text-muted">{{ __('users.no_roles') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <button class="btn btn-soft-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewUserModal" 
                                                                       data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" 
                                                                       data-user-email="{{ $user->email }}" data-user-roles="{{ $user->roles->pluck('name')->toJson() }}">
                                                                        <i class="ti ti-eye me-2"></i>{{ __('users.view') }}
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editUserModal" 
                                                                       data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" 
                                                                       data-user-email="{{ $user->email }}" data-user-roles="{{ $user->roles->pluck('id')->toJson() }}">
                                                                        <i class="ti ti-edit me-2"></i>{{ __('users.edit') }}
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteUserModal" 
                                                                       data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">
                                                                        <i class="ti ti-trash me-2"></i>{{ __('users.delete') }}
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center py-5">
                                                        <i class="ti ti-users-off text-muted" style="font-size: 3rem;"></i>
                                                        <h5 class="mt-3 text-muted">{{ __('users.no_users_found') }}</h5>
                                                        <p class="text-muted">{{ __('users.start_adding_users') }}</p>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                                                            {{ __('users.add_first_user') }}
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                @if($users->hasPages())
                                    <div class="p-3">
                                        {{ $users->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->

        <!-- Footer Start -->
        @include("dashboard_layouts.footer")
        <!-- End -->
    </main>
    <!--End page-content" -->
</div>
<!-- page-wrapper -->

<!-- Offcanvas Start -->
@include("dashboard_layouts.themes")
<!-- Offcanvas End -->

<!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">{{ __('users.modal_create_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('users.close') }}"></button>
            </div>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="createName" class="form-label">{{ __('users.form_name') }}</label>
                            <input type="text" class="form-control" id="createName" name="name" required placeholder="{{ __('users.placeholder_name') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="createEmail" class="form-label">{{ __('users.form_email') }}</label>
                            <input type="email" class="form-control" id="createEmail" name="email" required placeholder="{{ __('users.placeholder_email') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="createPassword" class="form-label">{{ __('users.form_password') }}</label>
                            <input type="password" class="form-control" id="createPassword" name="password" required placeholder="{{ __('users.placeholder_password') }}">
                            <small class="text-muted">{{ __('users.help_password') }}</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="createPasswordConfirmation" class="form-label">{{ __('users.form_password_confirmation') }}</label>
                            <input type="password" class="form-control" id="createPasswordConfirmation" name="password_confirmation" required placeholder="{{ __('users.placeholder_password_confirmation') }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="createRoles" class="form-label">{{ __('users.form_roles') }}</label>
                            <select class="form-select" id="createRoles" name="roles[]" multiple>
                                <option value="">{{ __('users.form_select_roles') }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                                <!-- Roles will be loaded dynamically -->
                            </select>
                            <small class="text-muted">{{ __('users.help_roles') }}</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('users.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('users.create_user') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">{{ __('users.modal_edit_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('users.close') }}"></button>
            </div>
            <form id="editUserForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editName" class="form-label">{{ __('users.form_name') }}</label>
                            <input type="text" class="form-control" id="editName" name="name" required placeholder="{{ __('users.placeholder_name') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editEmail" class="form-label">{{ __('users.form_email') }}</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required placeholder="{{ __('users.placeholder_email') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editPassword" class="form-label">{{ __('users.form_password') }}</label>
                            <input type="password" class="form-control" id="editPassword" name="password" placeholder="{{ __('users.placeholder_password') }}">
                            <small class="text-muted">{{ __('users.help_password_optional') }}</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editPasswordConfirmation" class="form-label">{{ __('users.form_password_confirmation') }}</label>
                            <input type="password" class="form-control" id="editPasswordConfirmation" name="password_confirmation" placeholder="{{ __('users.placeholder_password_confirmation') }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="editRoles" class="form-label">{{ __('users.form_roles') }}</label>
                            <select class="form-select" id="editRoles" name="roles[]" multiple>
                                <option value="">{{ __('users.form_select_roles') }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                                <!-- Roles will be loaded dynamically -->
                            </select>
                            <small class="text-muted">{{ __('users.help_roles') }}</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('users.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('users.update_user') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View User Modal -->
<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewUserModalLabel">{{ __('users.modal_view_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('users.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('users.user_id') }}</label>
                        <p class="form-control-plaintext" id="viewUserId"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('users.user_name') }}</label>
                        <p class="form-control-plaintext" id="viewUserName"></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">{{ __('users.user_email') }}</label>
                        <p class="form-control-plaintext" id="viewUserEmail"></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">{{ __('users.assigned_roles') }}</label>
                        <div id="viewUserRoles">
                            <!-- Roles will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('users.close') }}</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">{{ __('users.modal_delete_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('users.close') }}"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('users.modal_delete_message') }} <strong id="deleteUserName"></strong></p>
                <p class="text-danger">{{ __('users.modal_delete_warning') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('users.cancel') }}</button>
                <form id="deleteUserForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('users.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Success/Error Messages -->
@if(session('success'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <i class="ti ti-check me-2"></i>
            <strong class="me-auto">{{ __('users.toast_success') }}</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif

@if(session('error'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <i class="ti ti-alert-circle me-2"></i>
            <strong class="me-auto">{{ __('users.toast_error') }}</strong>
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
@include("dashboard_layouts.js")

<!-- Custom CSS -->
<style>
    .avatar-xs {
        width: 2rem;
        height: 2rem;
    }
    
    .avatar-title {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .form-control-plaintext {
        background-color: #f8f9fa;
        padding: 0.5rem;
        border-radius: 0.375rem;
        border: 1px solid #dee2e6;
    }
    
    .badge {
        font-size: 0.75rem;
    }
    
    .dropdown-toggle::after {
        display: none;
    }
</style>

<!-- Custom JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-hide toast messages after 5 seconds
        setTimeout(function() {
            const toasts = document.querySelectorAll('.toast');
            toasts.forEach(function(toast) {
                const bsToast = new bootstrap.Toast(toast);
                bsToast.hide();
            });
        }, 5000);

        // Load roles for dropdowns
        loadRoles();

        // Search functionality
        const searchInput = document.getElementById('searchUsers');
        const filterSelect = document.getElementById('filterRole');
        
        searchInput.addEventListener('input', filterUsers);
        filterSelect.addEventListener('change', filterUsers);

        // Edit User Modal
        const editModal = document.getElementById('editUserModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const userId = button.getAttribute('data-user-id');
            const userName = button.getAttribute('data-user-name');
            const userEmail = button.getAttribute('data-user-email');
            const userRoles = JSON.parse(button.getAttribute('data-user-roles'));
            
            // Update form action
            document.getElementById('editUserForm').action = `/admin/users/${userId}`;
            
            // Update form fields
            document.getElementById('editName').value = userName;
            document.getElementById('editEmail').value = userEmail;
            
            // Update roles
            const editRolesSelect = document.getElementById('editRoles');
            Array.from(editRolesSelect.options).forEach(option => {
                option.selected = userRoles.includes(parseInt(option.value));
            });
        });

        // View User Modal
        const viewModal = document.getElementById('viewUserModal');
        viewModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const userId = button.getAttribute('data-user-id');
            const userName = button.getAttribute('data-user-name');
            const userEmail = button.getAttribute('data-user-email');
            const userRoles = JSON.parse(button.getAttribute('data-user-roles'));
            
            // Update modal content
            document.getElementById('viewUserId').textContent = userId;
            document.getElementById('viewUserName').textContent = userName;
            document.getElementById('viewUserEmail').textContent = userEmail;
            
            // Update roles
            const rolesContainer = document.getElementById('viewUserRoles');
            if (userRoles.length > 0) {
                rolesContainer.innerHTML = userRoles.map(role => 
                    `<span class="badge bg-primary me-1">${role}</span>`
                ).join('');
            } else {
                rolesContainer.innerHTML = `<span class="text-muted">${'{{ __("users.no_roles") }}'}</span>`;
            }
        });

        // Delete User Modal
        const deleteModal = document.getElementById('deleteUserModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const userId = button.getAttribute('data-user-id');
            const userName = button.getAttribute('data-user-name');
            
            // Update form action
            document.getElementById('deleteUserForm').action = `/admin/users/${userId}`;
            
            // Update modal content
            document.getElementById('deleteUserName').textContent = userName;
        });
    });

    function loadRoles() {
        fetch('/admin/users/roles')
            .then(response => response.json())
            .then(roles => {
                const createRolesSelect = document.getElementById('createRoles');
                const editRolesSelect = document.getElementById('editRoles');
                const filterRoleSelect = document.getElementById('filterRole');
                
                // Clear existing options
                createRolesSelect.innerHTML = '<option value="">{{ __("users.form_select_roles") }}</option>';
                editRolesSelect.innerHTML = '<option value="">{{ __("users.form_select_roles") }}</option>';
                filterRoleSelect.innerHTML = '<option value="">{{ __("users.all_roles") }}</option>';
                
                // Add role options
                roles.forEach(role => {
                    const createOption = new Option(role.name, role.id);
                    const editOption = new Option(role.name, role.id);
                    const filterOption = new Option(role.name, role.id);
                    
                    createRolesSelect.add(createOption);
                    editRolesSelect.add(editOption);
                    filterRoleSelect.add(filterOption);
                });
            })
            .catch(error => console.error('Error loading roles:', error));
    }

    function filterUsers() {
        const searchTerm = document.getElementById('searchUsers').value.toLowerCase();
        const filterRole = document.getElementById('filterRole').value;
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const name = row.cells[1].textContent.toLowerCase();
            const email = row.cells[2].textContent.toLowerCase();
            const roles = row.cells[3].textContent.toLowerCase();
            
            const matchesSearch = !searchTerm || name.includes(searchTerm) || email.includes(searchTerm);
            const matchesRole = !filterRole || roles.includes(filterRole);
            
            row.style.display = matchesSearch && matchesRole ? 'table-row' : 'none';
        });
    }
</script>
</body>

</html>

