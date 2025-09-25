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
                    <h5 class="mb-0">{{ __('pages.page_title') }}</h5>

                    <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                        <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">{{ __('pages.breadcrumb_home') }}</a></li>
                            <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ __('pages.breadcrumb_current') }}</li>
                        </ul>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card border-0 rounded shadow">
                            <div class="card-header bg-transparent border-bottom p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ __('pages.management_title') }}</h5>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createPageModal">
                                            <i class="ti ti-plus me-1"></i> {{ __('pages.add_new_page') }}
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
                                                <input type="text" class="form-control" id="searchPages" placeholder="{{ __('pages.search_pages') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select" id="filterStatus">
                                                <option value="">{{ __('pages.all_status') }}</option>
                                                <option value="active">{{ __('pages.active') }}</option>
                                                <option value="inactive">{{ __('pages.inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pages Table -->
                                <div class="table-responsive">
                                    <table class="table table-center table-padding mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom p-3" style="min-width: 50px;">{{ __('pages.table_id') }}</th>
                                                <th class="border-bottom p-3" style="min-width: 200px;">{{ __('pages.table_name') }}</th>
                                                <th class="border-bottom p-3" style="min-width: 200px;">{{ __('pages.table_slug') }}</th>
                                                <th class="border-bottom p-3" style="min-width: 100px;">{{ __('pages.table_status') }}</th>
                                                <th class="border-bottom p-3" style="min-width: 150px;">{{ __('pages.table_created_at') }}</th>
                                                <th class="border-bottom p-3 text-center" style="min-width: 100px;">{{ __('pages.table_actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($pages as $page)
                                                <tr class="page-row" data-status="{{ $page->is_active ? 'active' : 'inactive' }}">
                                                    <td class="p-3">{{ $page->id }}</td>
                                                    <td class="p-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-1">
                                                                <h6 class="mb-0">{{ $page->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-3">
                                                        <code>{{ $page->slug }}</code>
                                                    </td>
                                                    <td class="p-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input status-toggle"
                                                                type="checkbox"
                                                                id="statusToggle{{ $page->id }}"
                                                                data-page-id="{{ $page->id }}"
                                                                data-page-name="{{ $page->name }}"
                                                                {{ $page->is_active ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="statusToggle{{ $page->id }}">
                                                                <span class="status-text">
                                                                    @if ($page->is_active)
                                                                        <span class="badge bg-success">{{ __('pages.active') }}</span>
                                                                    @else
                                                                        <span class="badge bg-danger">{{ __('pages.inactive') }}</span>
                                                                    @endif
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="p-3">{{ $page->created_at->format('M d, Y') }}</td>
                                                    <td class="p-3 text-center">
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#viewPageModal"
                                                                data-page-id="{{ $page->id }}"
                                                                data-page-name="{{ $page->name }}"
                                                                data-page-slug="{{ $page->slug }}"
                                                                data-page-status="{{ $page->is_active }}"
                                                                data-page-created="{{ $page->created_at->format('M d, Y H:i') }}">
                                                                <i class="ti ti-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-warning"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editPageModal"
                                                                data-page-id="{{ $page->id }}"
                                                                data-page-name="{{ $page->name }}"
                                                                data-page-slug="{{ $page->slug }}"
                                                                data-page-status="{{ $page->is_active }}">
                                                                <i class="ti ti-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deletePageModal"
                                                                data-page-id="{{ $page->id }}"
                                                                data-page-name="{{ $page->name }}">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center p-4">
                                                        <div class="py-4">
                                                            <i class="ti ti-file-text display-4 text-muted"></i>
                                                            <h5 class="mt-3">{{ __('pages.no_pages_found') }}</h5>
                                                            <p class="text-muted">{{ __('pages.start_adding_pages') }}</p>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPageModal">
                                                                {{ __('pages.add_first_page') }}
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                @if ($pages->hasPages())
                                    <div class="p-3">
                                        {{ $pages->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->
    </main>
    <!--End page-content" -->
</div>
<!-- page-wrapper -->

<!-- Offcanvas Start -->
@include('dashboard_layouts.themes')
<!-- Offcanvas End -->

<!-- Create Page Modal -->
<div class="modal fade" id="createPageModal" tabindex="-1" aria-labelledby="createPageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPageModalLabel">{{ __('pages.modal_create_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('pages.close') }}"></button>
            </div>
            <form action="{{ route('admin.pages.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="createName" class="form-label">{{ __('pages.form_name') }}</label>
                            <input type="text" class="form-control" id="createName" name="name" required placeholder="{{ __('pages.placeholder_name') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="createSlug" class="form-label">{{ __('pages.form_slug') }}</label>
                            <input type="text" class="form-control" id="createSlug" name="slug" required placeholder="{{ __('pages.placeholder_slug') }}">
                            <small class="text-muted">{{ __('pages.help_slug') }}</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="createIsActive" name="is_active" value="1" checked>
                                <label class="form-check-label" for="createIsActive">
                                    {{ __('pages.form_is_active') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('pages.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('pages.create_page') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Page Modal -->
<div class="modal fade" id="viewPageModal" tabindex="-1" aria-labelledby="viewPageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPageModalLabel">{{ __('pages.modal_view_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('pages.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('pages.page_id') }}</label>
                        <p class="form-control-plaintext" id="viewPageId"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('pages.page_name') }}</label>
                        <p class="form-control-plaintext" id="viewPageName"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('pages.page_slug') }}</label>
                        <p class="form-control-plaintext"><code id="viewPageSlug"></code></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('pages.page_status') }}</label>
                        <p class="form-control-plaintext" id="viewPageStatus"></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">{{ __('pages.created_at') }}</label>
                        <p class="form-control-plaintext" id="viewPageCreated"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('pages.close') }}</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Page Modal -->
<div class="modal fade" id="editPageModal" tabindex="-1" aria-labelledby="editPageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPageModalLabel">{{ __('pages.modal_edit_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('pages.close') }}"></button>
            </div>
            <form id="editPageForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editName" class="form-label">{{ __('pages.form_name') }}</label>
                            <input type="text" class="form-control" id="editName" name="name" required placeholder="{{ __('pages.placeholder_name') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editSlug" class="form-label">{{ __('pages.form_slug') }}</label>
                            <input type="text" class="form-control" id="editSlug" name="slug" required placeholder="{{ __('pages.placeholder_slug') }}">
                            <small class="text-muted">{{ __('pages.help_slug') }}</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="editIsActive" name="is_active" value="1">
                                <label class="form-check-label" for="editIsActive">
                                    {{ __('pages.form_is_active') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('pages.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('pages.update_page') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Page Modal -->
<div class="modal fade" id="deletePageModal" tabindex="-1" aria-labelledby="deletePageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePageModalLabel">{{ __('pages.modal_delete_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('pages.close') }}"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('pages.modal_delete_message') }} <strong id="deletePageName"></strong></p>
                <p class="text-danger">{{ __('pages.modal_delete_warning') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('pages.cancel') }}</button>
                <form id="deletePageForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('pages.delete') }}</button>
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
                <strong class="me-auto">{{ __('pages.toast_success') }}</strong>
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
                <i class="ti ti-x me-2"></i>
                <strong class="me-auto">{{ __('pages.toast_error') }}</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif

@include('dashboard_layouts.js')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('searchPages');
        const filterSelect = document.getElementById('filterStatus');
        const pageRows = document.querySelectorAll('.page-row');

        function filterPages() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusFilter = filterSelect.value;

            pageRows.forEach(row => {
                const name = row.querySelector('h6').textContent.toLowerCase();
                const slug = row.querySelector('code').textContent.toLowerCase();
                const status = row.getAttribute('data-status');

                const matchesSearch = name.includes(searchTerm) || slug.includes(searchTerm);
                const matchesStatus = !statusFilter || status === statusFilter;

                if (matchesSearch && matchesStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', filterPages);
        filterSelect.addEventListener('change', filterPages);

        // Auto-generate slug from name
        const createNameInput = document.getElementById('createName');
        const createSlugInput = document.getElementById('createSlug');

        createNameInput.addEventListener('input', function() {
            if (!createSlugInput.value) {
                createSlugInput.value = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            }
        });

        // View Page Modal
        const viewModal = document.getElementById('viewPageModal');
        viewModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const pageId = button.getAttribute('data-page-id');
            const pageName = button.getAttribute('data-page-name');
            const pageSlug = button.getAttribute('data-page-slug');
            const pageStatus = button.getAttribute('data-page-status');
            const pageCreated = button.getAttribute('data-page-created');

            // Update modal content
            document.getElementById('viewPageId').textContent = pageId;
            document.getElementById('viewPageName').textContent = pageName;
            document.getElementById('viewPageSlug').textContent = pageSlug;
            document.getElementById('viewPageStatus').innerHTML = pageStatus === '1' ?
                '<span class="badge bg-success">{{ __('pages.active') }}</span>' :
                '<span class="badge bg-danger">{{ __('pages.inactive') }}</span>';
            document.getElementById('viewPageCreated').textContent = pageCreated;
        });

        // Edit Page Modal
        const editModal = document.getElementById('editPageModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const pageId = button.getAttribute('data-page-id');
            const pageName = button.getAttribute('data-page-name');
            const pageSlug = button.getAttribute('data-page-slug');
            const pageStatus = button.getAttribute('data-page-status');

            // Update form action
            document.getElementById('editPageForm').action = `{{ route('home') }}/pages/${pageId}`;

            // Update form fields
            document.getElementById('editName').value = pageName;
            document.getElementById('editSlug').value = pageSlug;
            document.getElementById('editIsActive').checked = pageStatus === '1';
        });

        // Delete Page Modal
        const deleteModal = document.getElementById('deletePageModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const pageId = button.getAttribute('data-page-id');
            const pageName = button.getAttribute('data-page-name');

            // Update form action
            document.getElementById('deletePageForm').action = `{{ route('home') }}/pages/${pageId}`;

            // Update modal content
            document.getElementById('deletePageName').textContent = pageName;
        });

        // Status Toggle Functionality
        const statusToggles = document.querySelectorAll('.status-toggle');
        statusToggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const pageId = this.getAttribute('data-page-id');
                const pageName = this.getAttribute('data-page-name');
                const isActive = this.checked;
                const statusText = this.closest('td').querySelector('.status-text');
                const row = this.closest('tr');

                // Show loading state
                const originalText = statusText.innerHTML;
                statusText.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>{{ __('pages.loading') }}';
                this.disabled = true;

                // Make AJAX request
                fetch(`{{ route('home') }}/pages/${pageId}/toggle`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            is_active: isActive
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update status text
                            if (isActive) {
                                statusText.innerHTML = '<span class="badge bg-success">{{ __('pages.active') }}</span>';
                                row.setAttribute('data-status', 'active');
                            } else {
                                statusText.innerHTML = '<span class="badge bg-danger">{{ __('pages.inactive') }}</span>';
                                row.setAttribute('data-status', 'inactive');
                            }

                            // Show success toast
                            showToast('success', data.message || '{{ __('pages.success_updated') }}');
                        } else {
                            // Revert toggle state
                            this.checked = !isActive;
                            statusText.innerHTML = originalText;
                            showToast('error', data.message || '{{ __('pages.error_toggle') }}');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Revert toggle state
                        this.checked = !isActive;
                        statusText.innerHTML = originalText;
                        showToast('error', '{{ __('pages.error_toggle') }}');
                    })
                    .finally(() => {
                        this.disabled = false;
                    });
            });
        });

        // Toast notification function
        function showToast(type, message) {
            const toastContainer = document.querySelector('.toast-container') || createToastContainer();
            const toast = document.createElement('div');
            toast.className = `toast show ${type === 'success' ? 'bg-success' : 'bg-danger'} text-white`;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');

            const successText = '{{ __('pages.toast_success') }}';
            const errorText = '{{ __('pages.toast_error') }}';

            toast.innerHTML = `
            <div class="toast-header ${type === 'success' ? 'bg-success' : 'bg-danger'} text-white">
                <i class="ti ti-${type === 'success' ? 'check' : 'x'} me-2"></i>
                <strong class="me-auto">${type === 'success' ? successText : errorText}</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        `;

            toastContainer.appendChild(toast);

            // Auto remove after 5 seconds
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 5000);
        }

        function createToastContainer() {
            const container = document.createElement('div');
            container.className = 'toast-container position-fixed top-0 end-0 p-3';
            document.body.appendChild(container);
            return container;
        }
    });
</script>
