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
                            <h5 class="mb-0">Database Credentials</h5>

                            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">Landrick</a></li>
                                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Database Credentials</li>
                                </ul>
                            </nav>
                        </div>
                    
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card border-0 rounded shadow">
                                    <div class="card-header bg-transparent border-bottom p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Database Credentials Management</h5>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCredentialModal">
                                                <i class="ti ti-plus me-1"></i> Add New Database Credential
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="border-0">ID</th>
                                                        <th class="border-0">Database Name</th>
                                                        <th class="border-0">Database User</th>
                                                        <th class="border-0">Password</th>
                                                        <th class="border-0">Is Active</th>
                                                        <th class="border-0">Created At</th>
                                                        <th class="border-0 text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($credentials as $credential)
                                                    <tr>
                                                        <td class="border-0">{{ $credential->id }}</td>
                                                        <td class="border-0">
                                                            <div class="d-flex align-items-center">
                                                                <span class="fw-medium">{{ $credential->db_name }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="border-0">
                                                            <span class="badge bg-soft-info text-info">{{ $credential->db_user }}</span>
                                                        </td>
                                                        <td class="border-0">
                                                            <span class="text-muted">{{ $credential->db_password }}</span>
                                                        </td>
                                                        <td class="border-0">
                                                            @if($credential->tenant_id)
                                                                <span class="badge bg-soft-success text-success">Active</span>
                                                            @else
                                                                <span class="badge bg-soft-secondary text-secondary">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td class="border-0">{{ $credential->created_at->format('M d, Y') }}</td>
                                                        <td class="border-0 text-center">
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-sm btn-soft-primary" 
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#editCredentialModal"
                                                                        data-credential-id="{{ $credential->id }}"
                                                                        data-credential-db-name="{{ $credential->db_name }}"
                                                                        data-credential-db-user="{{ $credential->db_user }}"
                                                                        data-credential-db-password="{{ $credential->db_password }}"
                                                                        data-credential-tenant-id="{{ $credential->tenant_id }}">
                                                                    <i class="ti ti-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-sm btn-soft-danger" 
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#deleteCredentialModal"
                                                                        data-credential-id="{{ $credential->id }}"
                                                                        data-credential-db-name="{{ $credential->db_name }}">
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
                                                                No database credentials found. Create your first credential!
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
        
        <!-- Create Database Credential Modal -->
        <div class="modal fade" id="createCredentialModal" tabindex="-1" aria-labelledby="createCredentialModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCredentialModalLabel">Create New Database Credential</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('database-credentials.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="db_name" class="form-label">Database Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('db_name') is-invalid @enderror" id="db_name" name="db_name" value="{{ old('db_name') }}" required>
                                    @error('db_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="db_user" class="form-label">Database User <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('db_user') is-invalid @enderror" id="db_user" name="db_user" value="{{ old('db_user') }}" required>
                                    @error('db_user')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="db_password" class="form-label">Database Password</label>
                                    <input type="text" class="form-control @error('db_password') is-invalid @enderror" id="db_password" name="db_password" value="{{ old('db_password') }}">
                                    @error('db_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create Credential</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Database Credential Modal -->
        <div class="modal fade" id="editCredentialModal" tabindex="-1" aria-labelledby="editCredentialModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCredentialModalLabel">Edit Database Credential</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editCredentialForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_db_name" class="form-label">Database Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_db_name" name="db_name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_db_user" class="form-label">Database User <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_db_user" name="db_user" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="edit_db_password" class="form-label">Database Password</label>
                                    <input type="text" class="form-control" id="edit_db_password" name="db_password" value="{{ old('db_password') }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Credential</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Database Credential Modal -->
        <div class="modal fade" id="deleteCredentialModal" tabindex="-1" aria-labelledby="deleteCredentialModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCredentialModalLabel">Delete Database Credential</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="ti ti-alert-triangle text-danger fs-1 mb-3"></i>
                            <h5>Are you sure?</h5>
                            <p class="text-muted">You are about to delete database credential: <strong id="deleteCredentialName"></strong></p>
                            <p class="text-danger small">This action cannot be undone!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteCredentialForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Credential</button>
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
            // Edit Database Credential Modal
            document.addEventListener('DOMContentLoaded', function() {
                const editModal = document.getElementById('editCredentialModal');
                const editForm = document.getElementById('editCredentialForm');
                
                editModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const credentialId = button.getAttribute('data-credential-id');
                    const credentialDbName = button.getAttribute('data-credential-db-name');
                    const credentialDbUser = button.getAttribute('data-credential-db-user');
                    const credentialDbPassword = button.getAttribute('data-credential-db-password');
                    const credentialIsActive = button.getAttribute('data-credential-tenant-id');
                    
                    // Update form action URL
                    editForm.action = `/admin/database-credentials/${credentialId}`;
                    
                    // Populate form fields
                    document.getElementById('edit_db_name').value = credentialDbName;
                    document.getElementById('edit_db_user').value = credentialDbUser;
                    document.getElementById('edit_db_password').value = credentialDbPassword;
                });
                
                // Delete Database Credential Modal
                const deleteModal = document.getElementById('deleteCredentialModal');
                const deleteForm = document.getElementById('deleteCredentialForm');
                
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const credentialId = button.getAttribute('data-credential-id');
                    const credentialDbName = button.getAttribute('data-credential-db-name');
                    
                    // Update form action URL
                    deleteForm.action = `/admin/database-credentials/${credentialId}`;
                    
                    // Update credential name in modal
                    document.getElementById('deleteCredentialName').textContent = credentialDbName;
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
                const createForm = document.querySelector('form[action="{{ route('database-credentials.store') }}"]');
                if (createForm) {
                    createForm.addEventListener('submit', function(e) {
                        const password = document.getElementById('db_password').value;
                        if (password && password.length < 6) {
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