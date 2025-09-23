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
                    <h5 class="mb-0">{{ __('business_activities.page_title') }}</h5>

                    <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                        <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">{{ __('business_activities.breadcrumb_home') }}</a></li>
                            <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ __('business_activities.breadcrumb_current') }}</li>
                        </ul>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card border-0 rounded shadow">
                            <div class="card-header bg-transparent border-bottom p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ __('business_activities.management_title') }}</h5>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBusinessActivityModal">
                                        <i class="ti ti-plus me-1"></i> {{ __('business_activities.add_new_business_activity') }}
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-0">{{ __('business_activities.table_id') }}</th>
                                                <th class="border-0">{{ __('business_activities.table_name') }}</th>
                                                <th class="border-0">{{ __('business_activities.table_icon') }}</th>
                                                <th class="border-0">{{ __('business_activities.table_is_active') }}</th>
                                                <th class="border-0 text-center">{{ __('business_activities.table_actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($businessActivities as $businessActivity)
                                                <tr>
                                                    <td class="border-0">{{ $businessActivity->id }}</td>
                                                    <td class="border-0">
                                                        <div class="d-flex align-items-center">
                                                            <span class="fw-medium">{{ $businessActivity->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="border-0">
                                                        <span class="badge bg-soft-info text-info">
                                                            <img src="{{ $businessActivity->getFirstMediaUrl() }}" alt="{{ $businessActivity->name }}" class="img-fluid"
                                                                style="width: 20px; height: 20px;">
                                                        </span>
                                                    </td>
                                                    <td class="border-0">
                                                        @if ($businessActivity->is_active)
                                                            <span class="badge bg-soft-success text-success">{{ __('business_activities.status_active') }}</span>
                                                        @else
                                                            <span class="badge bg-soft-secondary text-secondary">{{ __('business_activities.status_inactive') }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="border-0 text-center">
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-soft-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editBusinessActivityModal"
                                                                data-businessActivity-id="{{ $businessActivity->id }}"
                                                                data-businessActivity-name="{{ $businessActivity->name }}"
                                                                data-businessActivity-icon="{{ $businessActivity->getFirstMediaUrl() }}"
                                                                data-businessActivity-is-active="{{ $businessActivity->is_active }}">
                                                                <i class="ti ti-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-soft-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteBusinessActivityModal"
                                                                data-businessActivity-id="{{ $businessActivity->id }}"
                                                                data-businessActivity-name="{{ $businessActivity->name }}">
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
                                                            {{ __('business_activities.empty_message') }}
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

<!-- Create Business Activity Modal -->
<div class="modal fade" id="createBusinessActivityModal" tabindex="-1" aria-labelledby="createBusinessActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBusinessActivityModalLabel">{{ __('business_activities.modal_create_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('business_activities.close') }}"></button>
            </div>
            <form action="{{ route('business-activities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="accept-language" value="{{ app()->getLocale() }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">{{ __('business_activities.form_name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="icon" class="form-label">{{ __('business_activities.form_icon') }} <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ old('icon') }}" accept="image/*" required>

                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="is_active" class="form-label">{{ __('business_activities.form_is_active') }}</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input @error('is_active') is-invalid @enderror" type="checkbox" id="is_active" name="is_active" value="1"
                                    {{ old('is_active', '1') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    {{ old('is_active', '1') ? __('business_activities.status_active') : __('business_activities.status_inactive') }}
                                </label>
                            </div>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="mt-2" id="icon_preview" style="display: none;">
                                <img id="icon_preview_img" src="" alt="{{ __('business_activities.icon_preview') }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('business_activities.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('business_activities.create_business_activity') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Business Activity Modal -->
<div class="modal fade" id="editBusinessActivityModal" tabindex="-1" aria-labelledby="editBusinessActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBusinessActivityModalLabel">{{ __('business_activities.modal_edit_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('business_activities.close') }}"></button>
            </div>
            <form id="editBusinessActivityForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="accept-language" value="{{ app()->getLocale() }}">
                <input type="hidden" name="businessActivityId" id="businessActivityId">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_name" class="form-label">{{ __('business_activities.form_name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_icon" class="form-label">{{ __('business_activities.form_icon') }} <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="edit_icon" name="icon" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_is_active" class="form-label">{{ __('business_activities.form_is_active') }}</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="edit_is_active" name="is_active" value="1">
                                <label class="form-check-label" for="edit_is_active">
                                    {{ __('business_activities.status_active') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="mt-2" id="edit_icon_preview">
                                <img id="edit_icon_preview_img" src="" alt="{{ __('business_activities.icon_preview') }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('business_activities.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('business_activities.update_business_activity') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Business Activity Modal -->
<div class="modal fade" id="deleteBusinessActivityModal" tabindex="-1" aria-labelledby="deleteBusinessActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBusinessActivityModalLabel">{{ __('business_activities.modal_delete_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('business_activities.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="ti ti-alert-triangle text-danger fs-1 mb-3"></i>
                    <h5>{{ __('business_activities.modal_delete_message') }}</h5>
                    <p class="text-muted">{{ __('business_activities.modal_delete_description') }} <strong id="deleteBusinessActivityName"></strong></p>
                    <p class="text-danger small">{{ __('business_activities.modal_delete_warning') }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('business_activities.cancel') }}</button>
                <form id="deleteBusinessActivityForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="accept-language" value="{{ app()->getLocale() }}">
                    <button type="submit" class="btn btn-danger">{{ __('business_activities.delete_business_activity') }}</button>
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
                <strong class="me-auto">{{ __('business_activities.toast_success') }}</strong>
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
                <strong class="me-auto">{{ __('business_activities.toast_error') }}</strong>
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
    // Edit Business Activity Modal
    document.addEventListener('DOMContentLoaded', function() {
        const editModal = document.getElementById('editBusinessActivityModal');
        const editForm = document.getElementById('editBusinessActivityForm');

        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const businessActivityId = button.getAttribute('data-businessActivity-id');
            const businessActivityName = button.getAttribute('data-businessActivity-name');
            const businessActivityIcon = button.getAttribute('data-businessActivity-icon');
            const businessActivityIsActive = button.getAttribute('data-businessActivity-is-active');

            // Update form action URL
            editForm.action = `{{ route('home') }}/business-activities/${businessActivityId}`;

            // Populate form fields
            document.getElementById('edit_name').value = businessActivityName;
            document.getElementById('edit_icon_preview_img').src = businessActivityIcon;

            // Reset file input and hide icon preview
            document.getElementById('edit_icon').value = '';

            // Handle toggle button
            const toggleCheckbox = document.getElementById('edit_is_active');
            const toggleLabel = toggleCheckbox.nextElementSibling;
            toggleCheckbox.checked = businessActivityIsActive == '1' || businessActivityIsActive == 1;
            toggleLabel.textContent = toggleCheckbox.checked ? 'Active' : 'Inactive';
        });

        // Handle toggle button state changes
        document.getElementById('is_active').addEventListener('change', function() {
            const label = this.nextElementSibling;
            label.textContent = this.checked ? '{{ __('business_activities.status_active') }}' : '{{ __('business_activities.status_inactive') }}';
        });

        document.getElementById('edit_is_active').addEventListener('change', function() {
            const label = this.nextElementSibling;
            label.textContent = this.checked ? '{{ __('business_activities.status_active') }}' : '{{ __('business_activities.status_inactive') }}';
        });

        // Handle form submission to ensure unchecked checkboxes send value 0
        document.querySelector('form[action="{{ route('business-activities.store') }}"]').addEventListener('submit', function(e) {
            const checkbox = document.getElementById('is_active');
            if (!checkbox.checked) {
                // Create a hidden input with value 0 for unchecked state
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'is_active';
                hiddenInput.value = '0';
                this.appendChild(hiddenInput);
            }
        });

        document.getElementById('editBusinessActivityForm').addEventListener('submit', function(e) {
            const checkbox = document.getElementById('edit_is_active');
            if (!checkbox.checked) {
                // Create a hidden input with value 0 for unchecked state
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'is_active';
                hiddenInput.value = '0';
                this.appendChild(hiddenInput);
            }
        });

        // Delete Business Activity Modal
        const deleteModal = document.getElementById('deleteBusinessActivityModal');
        const deleteForm = document.getElementById('deleteBusinessActivityForm');

        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const businessActivityId = button.getAttribute('data-businessActivity-id');
            const businessActivityName = button.getAttribute('data-businessActivity-name');

            // Update form action URL
            deleteForm.action = `{{ route('home') }}/business-activities/${businessActivityId}`;

            // Update business activity name in modal
            document.getElementById('deleteBusinessActivityName').textContent = businessActivityName;
        });

        // Auto-hide toast messages after 5 seconds
        setTimeout(function() {
            const toasts = document.querySelectorAll('.toast');
            toasts.forEach(function(toast) {
                const bsToast = new bootstrap.Toast(toast);
                bsToast.hide();
            });
        }, 5000);

        // Image preview functionality for create modal
        document.getElementById('icon').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('icon_preview');
            const previewImg = document.getElementById('icon_preview_img');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

        // Image preview functionality for edit modal
        document.getElementById('edit_icon').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('edit_icon_preview');
            const previewImg = document.getElementById('edit_icon_preview_img');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

    });
</script>
</body>

</html>
