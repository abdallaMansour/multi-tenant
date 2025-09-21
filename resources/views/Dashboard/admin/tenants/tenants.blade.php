@include("Dashboard.layouts.style")


        <div class="page-wrapper toggled">
            <!-- sidebar-wrapper -->
            @include("Dashboard.layouts.sidebar")
            <!-- sidebar-wrapper  -->

            <!-- Start Page Content -->
            <main class="page-content bg-light">
                <!-- Top Header -->
                @include("Dashboard.layouts.header")
                <!-- Top Header -->

                <div class="container-fluid">
                    <div class="layout-specing">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Tenants</h5>

                            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">Landrick</a></li>
                                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Tenants</li>
                                </ul>
                            </nav>
                        </div>
                    
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card border-0 rounded shadow">
                                    <div class="card-header bg-transparent border-bottom p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Tenants Management</h5>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTenantModal">
                                                <i class="ti ti-plus me-1"></i> Add New Tenant
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="border-0">ID</th>
                                                        <th class="border-0">Name</th>
                                                        <th class="border-0">Username</th>
                                                        <th class="border-0">Email</th>
                                                        <th class="border-0">Phone</th>
                                                        <th class="border-0">Created At</th>
                                                        <th class="border-0 text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($tenants as $tenant)
                                                    <tr>
                                                        <td class="border-0">{{ $tenant->id }}</td>
                                                        <td class="border-0">
                                                            <div class="d-flex align-items-center">
                                                                <span class="fw-medium">{{ $tenant->name }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="border-0">
                                                            <span class="badge bg-soft-info text-info">{{ $tenant->username }}</span>
                                                        </td>
                                                        <td class="border-0">{{ $tenant->email }}</td>
                                                        <td class="border-0">{{ $tenant->phone }}</td>
                                                        <td class="border-0">{{ $tenant->created_at->format('M d, Y') }}</td>
                                                        <td class="border-0 text-center">
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-sm btn-soft-primary" 
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#editTenantModal"
                                                                        data-tenant-id="{{ $tenant->id }}"
                                                                        data-tenant-name="{{ $tenant->name }}"
                                                                        data-tenant-username="{{ $tenant->username }}"
                                                                        data-tenant-email="{{ $tenant->email }}"
                                                                        data-tenant-phone="{{ $tenant->phone }}">
                                                                    <i class="ti ti-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-sm btn-soft-danger" 
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#deleteTenantModal"
                                                                        data-tenant-id="{{ $tenant->id }}"
                                                                        data-tenant-name="{{ $tenant->name }}">
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
                                                                No tenants found. Create your first tenant!
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
                @include("Dashboard.layouts.footer")
                <!-- End -->
            </main>
            <!--End page-content" -->
        </div>
        <!-- page-wrapper -->

        <!-- Offcanvas Start -->
        @include("Dashboard.layouts.themes")
        <!-- Offcanvas End -->
        
        <!-- Create Tenant Modal -->
        <div class="modal fade" id="createTenantModal" tabindex="-1" aria-labelledby="createTenantModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createTenantModalLabel">Create New Tenant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('tenants.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Tenant Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create Tenant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Tenant Modal -->
        <div class="modal fade" id="editTenantModal" tabindex="-1" aria-labelledby="editTenantModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTenantModalLabel">Edit Tenant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editTenantForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_name" class="form-label">Tenant Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_username" class="form-label">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_username" name="username" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="edit_email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="edit_phone" name="phone" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="edit_password" class="form-label">New Password (leave blank to keep current)</label>
                                    <input type="password" class="form-control" id="edit_password" name="password">
                                    <small class="text-muted">Leave blank if you don't want to change the password</small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Tenant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Tenant Modal -->
        <div class="modal fade" id="deleteTenantModal" tabindex="-1" aria-labelledby="deleteTenantModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteTenantModalLabel">Delete Tenant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="ti ti-alert-triangle text-danger fs-1 mb-3"></i>
                            <h5>Are you sure?</h5>
                            <p class="text-muted">You are about to delete tenant: <strong id="deleteTenantName"></strong></p>
                            <p class="text-danger small">This action cannot be undone!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteTenantForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Tenant</button>
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
                    <strong class="me-auto">Success</strong>
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
                    <strong class="me-auto">Error</strong>
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
        @include("Dashboard.layouts.js")
        
        <!-- Custom CSS for Table -->
        <style>
            .avatar {
                width: 32px;
                height: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .avatar-inner {
                font-size: 14px;
                font-weight: 600;
            }
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
        </style>

        <!-- Custom JavaScript for Modals -->
        <script>
            // Edit Tenant Modal
            document.addEventListener('DOMContentLoaded', function() {
                const editModal = document.getElementById('editTenantModal');
                const editForm = document.getElementById('editTenantForm');
                
                editModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const tenantId = button.getAttribute('data-tenant-id');
                    const tenantName = button.getAttribute('data-tenant-name');
                    const tenantUsername = button.getAttribute('data-tenant-username');
                    const tenantEmail = button.getAttribute('data-tenant-email');
                    const tenantPhone = button.getAttribute('data-tenant-phone');
                    
                    // Update form action URL
                    editForm.action = `/admin/tenants/${tenantId}`;
                    
                    // Populate form fields
                    document.getElementById('edit_name').value = tenantName;
                    document.getElementById('edit_username').value = tenantUsername;
                    document.getElementById('edit_email').value = tenantEmail;
                    document.getElementById('edit_phone').value = tenantPhone;
                });
                
                // Delete Tenant Modal
                const deleteModal = document.getElementById('deleteTenantModal');
                const deleteForm = document.getElementById('deleteTenantForm');
                
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const tenantId = button.getAttribute('data-tenant-id');
                    const tenantName = button.getAttribute('data-tenant-name');
                    
                    // Update form action URL
                    deleteForm.action = `/admin/tenants/${tenantId}`;
                    
                // Update tenant name in modal
                document.getElementById('deleteTenantName').textContent = tenantName;
            });
            
            // Auto-hide toast messages after 5 seconds
            setTimeout(function() {
                const toasts = document.querySelectorAll('.toast');
                toasts.forEach(function(toast) {
                    const bsToast = new bootstrap.Toast(toast);
                    bsToast.hide();
                });
            }, 5000);
            
            // Form validation for create modal
            const createForm = document.querySelector('form[action="{{ route('tenants.store') }}"]');
            if (createForm) {
                createForm.addEventListener('submit', function(e) {
                    const password = document.getElementById('password').value;
                    if (password.length < 6) {
                        e.preventDefault();
                        alert('Password must be at least 6 characters long.');
                        return false;
                    }
                });
            }
        });
        </script>
    </body>

</html>