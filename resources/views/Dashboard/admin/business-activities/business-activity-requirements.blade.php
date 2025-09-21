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
                    <h5 class="mb-0">Business Activity Requirements</h5>

                    <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                        <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">Landrick</a></li>
                            <li class="breadcrumb-item text-capitalize active" aria-current="page">Business Activity Requirements</li>
                        </ul>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card border-0 rounded shadow">
                            <div class="card-header bg-transparent border-bottom p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Business Activity Requirements Management</h5>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBusinessActivityRequirementModal">
                                        <i class="ti ti-plus me-1"></i> Add New Requirement
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-0">ID</th>
                                                <th class="border-0">Business Activity</th>
                                                <th class="border-0">Label</th>
                                                <th class="border-0">Type</th>
                                                <th class="border-0">Is Required</th>
                                                <th class="border-0 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($businessActivityRequirements as $businessActivityRequirement)
                                                <tr>
                                                    <td class="border-0">{{ $businessActivityRequirement->id }}</td>
                                                    <td class="border-0">
                                                        <div class="d-flex align-items-center">
                                                            <span class="fw-medium">{{ $businessActivityRequirement->businessActivity->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="border-0">
                                                        <span class="fw-medium">{{ $businessActivityRequirement->label }}</span>
                                                    </td>
                                                    <td class="border-0">
                                                        <span class="badge bg-soft-primary text-primary">{{ $businessActivityRequirement->type }}</span>
                                                    </td>
                                                    <td class="border-0">
                                                        @if ($businessActivityRequirement->is_required)
                                                            <span class="badge bg-soft-success text-success">Required</span>
                                                        @else
                                                            <span class="badge bg-soft-secondary text-secondary">Optional</span>
                                                        @endif
                                                    </td>
                                                    <td class="border-0 text-center">
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-soft-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editBusinessActivityRequirementModal"
                                                                data-requirement-id="{{ $businessActivityRequirement->id }}"
                                                                data-business-activity-id="{{ $businessActivityRequirement->business_activity_id }}"
                                                                data-label="{{ $businessActivityRequirement->label }}"
                                                                data-type="{{ $businessActivityRequirement->type }}"
                                                                data-is-required="{{ $businessActivityRequirement->is_required }}">
                                                                <i class="ti ti-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-soft-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteBusinessActivityRequirementModal"
                                                                data-requirement-id="{{ $businessActivityRequirement->id }}"
                                                                data-label="{{ $businessActivityRequirement->label }}">
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
                                                            No business activity requirements found. Create your first business activity requirement!
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

<!-- Create Business Activity Requirement Modal -->
<div class="modal fade" id="createBusinessActivityRequirementModal" tabindex="-1" aria-labelledby="createBusinessActivityRequirementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBusinessActivityRequirementModalLabel">Create New Business Activity Requirement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('business-activity-requirements.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="business_activity_id" class="form-label">Business Activity <span class="text-danger">*</span></label>
                            <select class="form-control @error('business_activity_id') is-invalid @enderror" id="business_activity_id" name="business_activity_id" required>
                                <option value="">Select Business Activity</option>
                                @foreach($businessActivities as $businessActivity)
                                    <option value="{{ $businessActivity->id }}" {{ old('business_activity_id') == $businessActivity->id ? 'selected' : '' }}>
                                        {{ $businessActivity->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('business_activity_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="requirements-container">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0">Requirements</h6>
                            <button type="button" class="btn btn-sm btn-success" id="add-requirement">
                                <i class="ti ti-plus"></i> Add Requirement
                            </button>
                        </div>
                        
                        <div class="requirement-item" data-index="0">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Label <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="requirements[0][label]" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Type <span class="text-danger">*</span></label>
                                    <select class="form-control" name="requirements[0][type]" required>
                                        <option value="">Select Type</option>
                                        <option value="text">Text</option>
                                        <option value="number">Number</option>
                                        <option value="email">Email</option>
                                        <option value="file">File</option>
                                        <option value="date">Date</option>
                                        <option value="textarea">Textarea</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Is Required</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="requirements[0][is_required]" value="1" checked>
                                        <label class="form-check-label">Required</label>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-sm btn-danger remove-requirement" style="display: none;">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Requirement</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Business Activity Requirement Modal -->
<div class="modal fade" id="editBusinessActivityRequirementModal" tabindex="-1" aria-labelledby="editBusinessActivityRequirementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBusinessActivityRequirementModalLabel">Edit Business Activity Requirement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBusinessActivityRequirementForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_business_activity_id" class="form-label">Business Activity <span class="text-danger">*</span></label>
                            <select class="form-control" id="edit_business_activity_id" name="business_activity_id" required>
                                <option value="">Select Business Activity</option>
                                @foreach($businessActivities as $businessActivity)
                                    <option value="{{ $businessActivity->id }}" @selected($businessActivityRequirement->business_activity_id == $businessActivity->id)>{{ $businessActivity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_label" class="form-label">Label <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_label" name="label" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_type" class="form-label">Type <span class="text-danger">*</span></label>
                            <select class="form-control" id="edit_type" name="type" required>
                                <option value="">Select Type</option>
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                                <option value="email">Email</option>
                                <option value="file">File</option>
                                <option value="date">Date</option>
                                <option value="textarea">Textarea</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_is_required" class="form-label">Is Required</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="edit_is_required" name="is_required" value="1">
                                <label class="form-check-label" for="edit_is_required">
                                    Required
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Requirement</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Business Activity Requirement Modal -->
<div class="modal fade" id="deleteBusinessActivityRequirementModal" tabindex="-1" aria-labelledby="deleteBusinessActivityRequirementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBusinessActivityRequirementModalLabel">Delete Business Activity Requirement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="ti ti-alert-triangle text-danger fs-1 mb-3"></i>
                    <h5>Are you sure?</h5>
                    <p class="text-muted">You are about to delete requirement: <strong id="deleteRequirementLabel"></strong></p>
                    <p class="text-danger small">This action cannot be undone!</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteBusinessActivityRequirementForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Requirement</button>
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
                <strong class="me-auto">Success</strong>
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
@include('dashboard_layouts.js')

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
    // Edit Business Activity Requirement Modal
    document.addEventListener('DOMContentLoaded', function() {
        const editModal = document.getElementById('editBusinessActivityRequirementModal');
        const editForm = document.getElementById('editBusinessActivityRequirementForm');

        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const requirementId = button.getAttribute('data-requirement-id');
            const businessActivityId = button.getAttribute('data-business-activity-id');
            const label = button.getAttribute('data-label');
            const type = button.getAttribute('data-type');
            const isRequired = button.getAttribute('data-is-required');

            // Update form action URL
            editForm.action = `/admin/business-activity-requirements/${requirementId}`;

            // Populate form fields
            document.getElementById('edit_business_activity_id').value = businessActivityId;
            document.getElementById('edit_label').value = label;
            document.getElementById('edit_type').value = type;

            // Handle toggle button
            const toggleCheckbox = document.getElementById('edit_is_required');
            const toggleLabel = toggleCheckbox.nextElementSibling;
            toggleCheckbox.checked = isRequired == '1' || isRequired == 1;
            toggleLabel.textContent = toggleCheckbox.checked ? 'Required' : 'Optional';
        });

        // Dynamic form handling for requirements
        let requirementIndex = 0;

        // Add requirement button
        document.getElementById('add-requirement').addEventListener('click', function() {
            requirementIndex++;
            const container = document.querySelector('.requirements-container');
            const newRequirement = createRequirementField(requirementIndex);
            container.appendChild(newRequirement);
            updateRemoveButtons();
        });

        // Remove requirement button
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-requirement')) {
                e.target.closest('.requirement-item').remove();
                updateRemoveButtons();
            }
        });

        // Handle toggle button state changes for edit modal
        document.getElementById('edit_is_required').addEventListener('change', function() {
            const label = this.nextElementSibling;
            label.textContent = this.checked ? 'Required' : 'Optional';
        });

        // Handle form submission to ensure unchecked checkboxes send value 0
        document.querySelector('form[action="{{ route('business-activity-requirements.store') }}"]').addEventListener('submit', function(e) {
            const checkboxes = this.querySelectorAll('input[name*="[is_required]"]');
            checkboxes.forEach(function(checkbox) {
                if (!checkbox.checked) {
                    // Create a hidden input with value 0 for unchecked state
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = checkbox.name;
                    hiddenInput.value = '0';
                    checkbox.parentNode.appendChild(hiddenInput);
                }
            });
        });

        document.getElementById('editBusinessActivityRequirementForm').addEventListener('submit', function(e) {
            const checkbox = document.getElementById('edit_is_required');
            if (!checkbox.checked) {
                // Create a hidden input with value 0 for unchecked state
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'is_required';
                hiddenInput.value = '0';
                this.appendChild(hiddenInput);
            }
        });

        // Delete Business Activity Requirement Modal
        const deleteModal = document.getElementById('deleteBusinessActivityRequirementModal');
        const deleteForm = document.getElementById('deleteBusinessActivityRequirementForm');

        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const requirementId = button.getAttribute('data-requirement-id');
            const label = button.getAttribute('data-label');

            // Update form action URL
            deleteForm.action = `/admin/business-activity-requirements/${requirementId}`;

            // Update requirement label in modal
            document.getElementById('deleteRequirementLabel').textContent = label;
        });

        // Auto-hide toast messages after 5 seconds
        setTimeout(function() {
            const toasts = document.querySelectorAll('.toast');
            toasts.forEach(function(toast) {
                const bsToast = new bootstrap.Toast(toast);
                bsToast.hide();
            });
        }, 5000);

        // Helper function to create requirement field
        function createRequirementField(index) {
            const div = document.createElement('div');
            div.className = 'requirement-item';
            div.setAttribute('data-index', index);
            div.innerHTML = `
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Label <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="requirements[${index}][label]" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Type <span class="text-danger">*</span></label>
                        <select class="form-control" name="requirements[${index}][type]" required>
                            <option value="">Select Type</option>
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                            <option value="email">Email</option>
                            <option value="file">File</option>
                            <option value="date">Date</option>
                            <option value="textarea">Textarea</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Is Required</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="requirements[${index}][is_required]" value="1" checked>
                            <label class="form-check-label">Required</label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3 d-flex align-items-end">
                        <button type="button" class="btn btn-sm btn-danger remove-requirement">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            return div;
        }

        // Helper function to update remove buttons visibility
        function updateRemoveButtons() {
            const requirementItems = document.querySelectorAll('.requirement-item');
            requirementItems.forEach(function(item, index) {
                const removeBtn = item.querySelector('.remove-requirement');
                if (requirementItems.length > 1) {
                    removeBtn.style.display = 'block';
                } else {
                    removeBtn.style.display = 'none';
                }
            });
        }

        // Initialize remove buttons visibility
        updateRemoveButtons();

    });
</script>
</body>

</html>
