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
                    <h5 class="mb-0">{{ __('packages.page_title') }}</h5>

                    <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                        <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">{{ __('packages.breadcrumb_home') }}</a></li>
                            <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ __('packages.breadcrumb_current') }}</li>
                        </ul>
                    </nav>
                </div>
            
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card border-0 rounded shadow">
                            <div class="card-header bg-transparent border-bottom p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ __('packages.management_title') }}</h5>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.packages.create') }}" class="btn btn-primary btn-sm">
                                            <i class="ti ti-plus me-1"></i> {{ __('packages.add_new_package') }}
                                        </a>
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
                                                <input type="text" class="form-control" id="searchPackages" placeholder="{{ __('packages.search_packages') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select" id="filterPlan">
                                                <option value="">{{ __('packages.all_plans') }}</option>
                                                <option value="monthly">{{ __('packages.monthly') }}</option>
                                                <option value="yearly">{{ __('packages.yearly') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Packages Table -->
                                <div class="table-responsive">
                                    <table class="table table-center table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-bottom-0">{{ __('packages.table_id') }}</th>
                                                <th class="border-bottom-0">{{ __('packages.table_name') }}</th>
                                                <th class="border-bottom-0">{{ __('packages.table_plan') }}</th>
                                                <th class="border-bottom-0">{{ __('packages.table_price') }}</th>
                                                <th class="border-bottom-0">{{ __('packages.table_trial_days') }}</th>
                                                <th class="border-bottom-0">{{ __('packages.table_features') }}</th>
                                                <th class="border-bottom-0">{{ __('packages.table_status') }}</th>
                                                <th class="border-bottom-0 text-center">{{ __('packages.table_actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($packages as $package)
                                                <tr>
                                                    <td>{{ $package->id }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-xs me-2">
                                                                <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                    {{ substr($package->name, 0, 1) }}
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0">{{ $package->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-soft-{{ $package->plan === 'monthly' ? 'info' : 'success' }} text-{{ $package->plan === 'monthly' ? 'info' : 'success' }}">
                                                            {{ __('packages.' . $package->plan) }}
                                                        </span>
                                                    </td>
                                                    <td>${{ number_format($package->price, 2) }}</td>
                                                    <td>{{ $package->trial_days }} {{ __('packages.days') }}</td>
                                                    <td>
                                                        @if($package->features && count($package->features) > 0)
                                                            <span class="badge bg-soft-secondary text-secondary">
                                                                {{ count($package->features) }} {{ __('packages.features_count') }}
                                                            </span>
                                                        @else
                                                            <span class="text-muted">{{ __('packages.no_features') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" 
                                                                   {{ $package->is_active ? 'checked' : '' }}
                                                                   onchange="togglePackageStatus({{ $package->id }})">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <button class="btn btn-soft-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPackageModal" 
                                                                       data-package-id="{{ $package->id }}" data-package-name="{{ $package->name }}" 
                                                                       data-package-plan="{{ $package->plan }}" data-package-price="{{ $package->price }}"
                                                                       data-package-trial="{{ $package->trial_days }}" data-package-features="{{ json_encode($package->features) }}"
                                                                       data-package-status="{{ $package->is_active }}">
                                                                        <i class="ti ti-eye me-2"></i>{{ __('packages.view') }}
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('admin.packages.edit', $package) }}">
                                                                        <i class="ti ti-edit me-2"></i>{{ __('packages.edit') }}
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#deletePackageModal" 
                                                                       data-package-id="{{ $package->id }}" data-package-name="{{ $package->name }}">
                                                                        <i class="ti ti-trash me-2"></i>{{ __('packages.delete') }}
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center py-5">
                                                        <i class="ti ti-package text-muted" style="font-size: 3rem;"></i>
                                                        <h5 class="mt-3 text-muted">{{ __('packages.no_packages_found') }}</h5>
                                                        <p class="text-muted">{{ __('packages.start_adding_packages') }}</p>
                                                        <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">
                                                            {{ __('packages.add_first_package') }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                @if($packages->hasPages())
                                    <div class="p-3">
                                        {{ $packages->links() }}
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

<!-- View Package Modal -->
<div class="modal fade" id="viewPackageModal" tabindex="-1" aria-labelledby="viewPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPackageModalLabel">{{ __('packages.modal_view_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('packages.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('packages.package_id') }}</label>
                        <p class="form-control-plaintext" id="viewPackageId"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('packages.package_name') }}</label>
                        <p class="form-control-plaintext" id="viewPackageName"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('packages.package_plan') }}</label>
                        <p class="form-control-plaintext" id="viewPackagePlan"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('packages.package_price') }}</label>
                        <p class="form-control-plaintext" id="viewPackagePrice"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('packages.package_trial_days') }}</label>
                        <p class="form-control-plaintext" id="viewPackageTrial"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('packages.package_status') }}</label>
                        <p class="form-control-plaintext" id="viewPackageStatus"></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">{{ __('packages.package_features') }}</label>
                        <div id="viewPackageFeatures">
                            <!-- Features will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('packages.close') }}</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Package Modal -->
<div class="modal fade" id="deletePackageModal" tabindex="-1" aria-labelledby="deletePackageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePackageModalLabel">{{ __('packages.modal_delete_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('packages.close') }}"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('packages.modal_delete_message') }} <strong id="deletePackageName"></strong></p>
                <p class="text-danger">{{ __('packages.modal_delete_warning') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('packages.cancel') }}</button>
                <form id="deletePackageForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('packages.delete') }}</button>
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
            <strong class="me-auto">{{ __('packages.toast_success') }}</strong>
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
            <strong class="me-auto">{{ __('packages.toast_error') }}</strong>
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

        // Search functionality
        const searchInput = document.getElementById('searchPackages');
        const filterSelect = document.getElementById('filterPlan');
        
        searchInput.addEventListener('input', filterPackages);
        filterSelect.addEventListener('change', filterPackages);

        // View Package Modal
        const viewModal = document.getElementById('viewPackageModal');
        viewModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const packageId = button.getAttribute('data-package-id');
            const packageName = button.getAttribute('data-package-name');
            const packagePlan = button.getAttribute('data-package-plan');
            const packagePrice = button.getAttribute('data-package-price');
            const packageTrial = button.getAttribute('data-package-trial');
            const packageFeatures = JSON.parse(button.getAttribute('data-package-features'));
            const packageStatus = button.getAttribute('data-package-status');
            
            // Update modal content
            document.getElementById('viewPackageId').textContent = packageId;
            document.getElementById('viewPackageName').textContent = packageName;
            document.getElementById('viewPackagePlan').textContent = packagePlan.charAt(0).toUpperCase() + packagePlan.slice(1);
            document.getElementById('viewPackagePrice').textContent = '$' + parseFloat(packagePrice).toFixed(2);
            document.getElementById('viewPackageTrial').textContent = packageTrial + ' days';
            document.getElementById('viewPackageStatus').textContent = packageStatus === '1' ? 'Active' : 'Inactive';
            
            // Update features
            const featuresContainer = document.getElementById('viewPackageFeatures');
            if (packageFeatures && packageFeatures.length > 0) {
                featuresContainer.innerHTML = packageFeatures.map(feature => 
                    `<span class="badge bg-primary me-1 mb-1">${feature}</span>`
                ).join('');
            } else {
                featuresContainer.innerHTML = `<span class="text-muted">No features</span>`;
            }
        });

        // Delete Package Modal
        const deleteModal = document.getElementById('deletePackageModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const packageId = button.getAttribute('data-package-id');
            const packageName = button.getAttribute('data-package-name');
            
            // Update form action
            document.getElementById('deletePackageForm').action = `/admin/packages/${packageId}`;
            
            // Update modal content
            document.getElementById('deletePackageName').textContent = packageName;
        });
    });

    function filterPackages() {
        const searchTerm = document.getElementById('searchPackages').value.toLowerCase();
        const filterPlan = document.getElementById('filterPlan').value;
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const name = row.cells[1].textContent.toLowerCase();
            const plan = row.cells[2].textContent.toLowerCase();
            
            const matchesSearch = !searchTerm || name.includes(searchTerm);
            const matchesPlan = !filterPlan || plan.includes(filterPlan);
            
            row.style.display = matchesSearch && matchesPlan ? 'table-row' : 'none';
        });
    }

    function togglePackageStatus(packageId) {
        fetch(`/admin/packages/${packageId}/toggle`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                showToast('success', data.message);
            } else {
                // Show error message
                showToast('error', data.message);
                // Reload page to reset the toggle state
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('error', 'An error occurred while updating the package status.');
            // Reload page to reset the toggle state
            location.reload();
        });
    }

    function showToast(type, message) {
        const toastContainer = document.querySelector('.toast-container');
        if (!toastContainer) {
            // Create toast container if it doesn't exist
            const container = document.createElement('div');
            container.className = 'toast-container position-fixed top-0 end-0 p-3';
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        toast.className = `toast show`;
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'assertive');
        toast.setAttribute('aria-atomic', 'true');

        const bgClass = type === 'success' ? 'bg-success' : 'bg-danger';
        const icon = type === 'success' ? 'ti-check' : 'ti-alert-circle';

        toast.innerHTML = `
            <div class="toast-header ${bgClass} text-white">
                <i class="ti ${icon} me-2"></i>
                <strong class="me-auto">${type === 'success' ? 'Success' : 'Error'}</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        `;

        document.querySelector('.toast-container').appendChild(toast);

        // Auto-hide after 5 seconds
        setTimeout(() => {
            const bsToast = new bootstrap.Toast(toast);
            bsToast.hide();
        }, 5000);
    }
</script>
</body>

</html>
