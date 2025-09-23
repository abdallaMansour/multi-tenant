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
                    <h5 class="mb-0">{{ __('permissions.page_title') }}</h5>

                    <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                        <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">{{ __('permissions.breadcrumb_home') }}</a></li>
                            <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ __('permissions.breadcrumb_current') }}</li>
                        </ul>
                    </nav>
                </div>
            
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card border-0 rounded shadow">
                            <div class="card-header bg-transparent border-bottom p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ __('permissions.management_title') }}</h5>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="refreshPermissions()">
                                            <i class="ti ti-refresh me-1"></i> {{ __('permissions.refresh') }}
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
                                                <input type="text" class="form-control" id="searchPermissions" placeholder="{{ __('permissions.search_permissions') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select" id="filterCategory">
                                                <option value="">{{ __('permissions.all_categories') }}</option>
                                                @foreach($permissions as $category => $categoryPermissions)
                                                    <option value="{{ $category }}">{{ __('permissions.category_' . $category) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Permissions by Category -->
                                <div class="p-3">
                                    @forelse($permissions as $category => $categoryPermissions)
                                        <div class="permission-category mb-4" data-category="{{ $category }}">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="mb-0 text-primary">
                                                    <i class="ti ti-folder me-2"></i>
                                                    {{ __('permissions.category_' . $category) }}
                                                </h6>
                                                <span class="badge bg-soft-primary text-primary">{{ $categoryPermissions->count() }} {{ __('permissions.permissions') }}</span>
                                            </div>
                                            
                                            <div class="row">
                                                @foreach($categoryPermissions as $permission)
                                                    <div class="col-md-6 col-lg-4 mb-3 permission-item" data-permission="{{ $permission->name }}">
                                                        <div class="card border-0 shadow-sm h-100">
                                                            <div class="card-body p-3">
                                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                                    <h6 class="card-title mb-0 text-truncate" title="{{ $permission->name }}">
                                                                        {{ $permission->name }}
                                                                    </h6>
                                                                    <span class="badge bg-soft-info text-info">{{ __('permissions.table_id') }}: {{ $permission->id }}</span>
                                                                </div>
                                                                
                                                                <div class="mb-2">
                                                                    <small class="text-muted">
                                                                        <i class="ti ti-shield me-1"></i>
                                                                        {{ __('permissions.table_guard') }}: {{ $permission->guard_name }}
                                                                    </small>
                                                                </div>
                                                                
                                                                <div class="mb-2">
                                                                    <small class="text-muted">
                                                                        <i class="ti ti-calendar me-1"></i>
                                                                        {{ __('permissions.created_at') }}: {{ $permission->created_at->format('M d, Y') }}
                                                                    </small>
                                                                </div>
                                                                
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <small class="text-muted">
                                                                        <i class="ti ti-users me-1"></i>
                                                                        {{ $permission->roles->count() }} {{ __('permissions.table_roles_count') }}
                                                                    </small>
                                                                    <button type="button" class="btn btn-sm btn-outline-primary" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#viewPermissionModal"
                                                                            data-permission-id="{{ $permission->id }}"
                                                                            data-permission-name="{{ $permission->name }}"
                                                                            data-permission-guard="{{ $permission->guard_name }}"
                                                                            data-permission-roles="{{ $permission->roles->pluck('name')->toJson() }}">
                                                                        <i class="ti ti-eye"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center py-5">
                                            <i class="ti ti-database-off text-muted" style="font-size: 3rem;"></i>
                                            <h5 class="mt-3 text-muted">{{ __('permissions.no_permissions_found') }}</h5>
                                            <p class="text-muted">{{ __('permissions.start_adding_permissions') }}</p>
                                        </div>
                                    @endforelse
                                </div>
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

<!-- View Permission Modal -->
<div class="modal fade" id="viewPermissionModal" tabindex="-1" aria-labelledby="viewPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPermissionModalLabel">{{ __('permissions.modal_view_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('permissions.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('permissions.permission_id') }}</label>
                        <p class="form-control-plaintext" id="viewPermissionId"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('permissions.permission_guard') }}</label>
                        <p class="form-control-plaintext" id="viewPermissionGuard"></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">{{ __('permissions.permission_name') }}</label>
                        <p class="form-control-plaintext" id="viewPermissionName"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('permissions.created_at') }}</label>
                        <p class="form-control-plaintext" id="viewPermissionCreated"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('permissions.updated_at') }}</label>
                        <p class="form-control-plaintext" id="viewPermissionUpdated"></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">{{ __('permissions.assigned_roles') }}</label>
                        <div id="viewPermissionRoles">
                            <!-- Roles will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('permissions.close') }}</button>
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
            <strong class="me-auto">{{ __('permissions.toast_success') }}</strong>
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
            <strong class="me-auto">{{ __('permissions.toast_error') }}</strong>
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
    .permission-category {
        border: 1px solid #e9ecef;
        border-radius: 0.5rem;
        padding: 1.5rem;
        background-color: #f8f9fa;
    }
    
    .permission-item {
        transition: transform 0.2s ease-in-out;
    }
    
    .permission-item:hover {
        transform: translateY(-2px);
    }
    
    .card {
        transition: box-shadow 0.2s ease-in-out;
    }
    
    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    
    .badge {
        font-size: 0.75rem;
    }
    
    .text-truncate {
        max-width: 200px;
    }
    
    .form-control-plaintext {
        background-color: #f8f9fa;
        padding: 0.5rem;
        border-radius: 0.375rem;
        border: 1px solid #dee2e6;
    }
    
    .role-badge {
        display: inline-block;
        margin: 0.25rem;
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

        // Search functionality
        const searchInput = document.getElementById('searchPermissions');
        const filterSelect = document.getElementById('filterCategory');
        
        searchInput.addEventListener('input', filterPermissions);
        filterSelect.addEventListener('change', filterPermissions);

        // View Permission Modal
        const viewModal = document.getElementById('viewPermissionModal');
        viewModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const permissionId = button.getAttribute('data-permission-id');
            const permissionName = button.getAttribute('data-permission-name');
            const permissionGuard = button.getAttribute('data-permission-guard');
            const permissionRoles = JSON.parse(button.getAttribute('data-permission-roles'));
            
            // Update modal content
            document.getElementById('viewPermissionId').textContent = permissionId;
            document.getElementById('viewPermissionName').textContent = permissionName;
            document.getElementById('viewPermissionGuard').textContent = permissionGuard;
            
            // Update roles
            const rolesContainer = document.getElementById('viewPermissionRoles');
            if (permissionRoles.length > 0) {
                rolesContainer.innerHTML = permissionRoles.map(role => 
                    `<span class="badge bg-primary role-badge">${role}</span>`
                ).join('');
            } else {
                rolesContainer.innerHTML = `<span class="text-muted">${'{{ __("permissions.no_roles") }}'}</span>`;
            }
        });
    });

    function filterPermissions() {
        const searchTerm = document.getElementById('searchPermissions').value.toLowerCase();
        const filterCategory = document.getElementById('filterCategory').value;
        const categories = document.querySelectorAll('.permission-category');
        const items = document.querySelectorAll('.permission-item');
        
        categories.forEach(category => {
            const categoryName = category.getAttribute('data-category');
            let categoryVisible = false;
            
            if (!filterCategory || categoryName === filterCategory) {
                const categoryItems = category.querySelectorAll('.permission-item');
                categoryItems.forEach(item => {
                    const permissionName = item.getAttribute('data-permission').toLowerCase();
                    const matchesSearch = !searchTerm || permissionName.includes(searchTerm);
                    
                    if (matchesSearch) {
                        item.style.display = 'block';
                        categoryVisible = true;
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
            
            category.style.display = categoryVisible ? 'block' : 'none';
        });
    }

    function refreshPermissions() {
        location.reload();
    }
</script>
</body>

</html>
