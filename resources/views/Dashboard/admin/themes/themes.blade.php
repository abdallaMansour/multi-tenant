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
                    <h5 class="mb-0">{{ __('themes.page_title') }}</h5>

                    <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                        <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">{{ __('themes.breadcrumb_home') }}</a></li>
                            <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ __('themes.breadcrumb_current') }}</li>
                        </ul>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card border-0 rounded shadow">
                            <div class="card-header bg-transparent border-bottom p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ __('themes.management_title') }}</h5>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createThemeModal">
                                            <i class="ti ti-plus me-1"></i> {{ __('themes.add_new_theme') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <!-- Search and Filter -->
                                <div class="p-3 border-bottom">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ti ti-search"></i></span>
                                                <input type="text" class="form-control" id="searchThemes" placeholder="{{ __('themes.search_themes') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" id="filterStatus">
                                                <option value="">{{ __('themes.all_status') }}</option>
                                                <option value="active">{{ __('themes.active') }}</option>
                                                <option value="inactive">{{ __('themes.inactive') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" id="filterBusinessActivity">
                                                <option value="">{{ __('themes.all_business_activities') }}</option>
                                                @foreach ($businessActivities as $businessActivity)
                                                    <option value="{{ $businessActivity->id }}">{{ $businessActivity->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Themes Table -->
                                <div class="table-responsive">
                                    <table class="table table-center table-padding mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom p-3" style="min-width: 50px;">{{ __('themes.table_id') }}</th>
                                                <th class="border-bottom p-3" style="min-width: 200px;">{{ __('themes.table_title') }}</th>
                                                <th class="border-bottom p-3" style="min-width: 150px;">{{ __('themes.table_business_activity') }}</th>
                                                <th class="border-bottom p-3" style="min-width: 100px;">{{ __('themes.table_price') }}</th>
                                                <th class="border-bottom p-3" style="min-width: 80px;">{{ __('themes.table_pages_count') }}</th>
                                                <th class="border-bottom p-3" style="min-width: 100px;">{{ __('themes.table_status') }}</th>
                                                <th class="border-bottom p-3" style="min-width: 150px;">{{ __('themes.table_created_at') }}</th>
                                                <th class="border-bottom p-3 text-center" style="min-width: 100px;">{{ __('themes.table_actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($themes as $theme)
                                                <tr class="theme-row" data-status="{{ $theme->is_active ? 'active' : 'inactive' }}" data-business-activity="{{ $theme->business_activity_id }}">
                                                    <td class="p-3">{{ $theme->id }}</td>
                                                    <td class="p-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-1">
                                                                <h6 class="mb-0">{{ $theme->title }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-3">
                                                        <span class="badge bg-info">{{ $theme->businessActivity->name ?? 'N/A' }}</span>
                                                    </td>
                                                    <td class="p-3">
                                                        @if ($theme->price === null)
                                                            <span class="badge bg-success">{{ __('themes.free') }}</span>
                                                        @else
                                                            <strong>${{ number_format($theme->price, 2) }}</strong>
                                                        @endif
                                                    </td>
                                                    <td class="p-3">
                                                        <span class="badge bg-secondary">{{ $theme->pages->count() }}</span>
                                                    </td>
                                                    <td class="p-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input status-toggle"
                                                                type="checkbox"
                                                                id="statusToggle{{ $theme->id }}"
                                                                data-theme-id="{{ $theme->id }}"
                                                                data-theme-title="{{ $theme->title }}"
                                                                {{ $theme->is_active ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="statusToggle{{ $theme->id }}">
                                                                <span class="status-text">
                                                                    @if ($theme->is_active)
                                                                        <span class="badge bg-success">{{ __('themes.active') }}</span>
                                                                    @else
                                                                        <span class="badge bg-danger">{{ __('themes.inactive') }}</span>
                                                                    @endif
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="p-3">{{ $theme->created_at->format('M d, Y') }}</td>
                                                    <td class="p-3 text-center">
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#viewThemeModal"
                                                                data-theme-id="{{ $theme->id }}"
                                                                data-theme-title="{{ $theme->title }}"
                                                                data-theme-business-activity="{{ $theme->businessActivity->name ?? 'N/A' }}"
                                                                data-theme-features="{{ $theme->features }}"
                                                                data-theme-price="{{ $theme->price }}"
                                                                data-theme-status="{{ $theme->is_active }}"
                                                                data-theme-pages="{{ $theme->pages->pluck('name')->join(', ') }}"
                                                                data-theme-created="{{ $theme->created_at->format('M d, Y H:i') }}">
                                                                <i class="ti ti-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-warning"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editThemeModal"
                                                                data-theme-id="{{ $theme->id }}"
                                                                data-theme-business-activity-id="{{ $theme->business_activity_id }}"
                                                                data-theme-title="{{ $theme->title }}"
                                                                data-theme-features="{{ $theme->features }}"
                                                                data-theme-price="{{ $theme->price }}"
                                                                data-theme-status="{{ $theme->is_active }}"
                                                                data-theme-pages="{{ $theme->pages->pluck('id')->toJson() }}">
                                                                <i class="ti ti-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteThemeModal"
                                                                data-theme-id="{{ $theme->id }}"
                                                                data-theme-title="{{ $theme->title }}">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center p-4">
                                                        <div class="py-4">
                                                            <i class="ti ti-palette display-4 text-muted"></i>
                                                            <h5 class="mt-3">{{ __('themes.no_themes_found') }}</h5>
                                                            <p class="text-muted">{{ __('themes.start_adding_themes') }}</p>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createThemeModal">
                                                                {{ __('themes.add_first_theme') }}
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                @if ($themes->hasPages())
                                    <div class="p-3">
                                        {{ $themes->links() }}
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

<!-- Create Theme Modal -->
<div class="modal fade" id="createThemeModal" tabindex="-1" aria-labelledby="createThemeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createThemeModalLabel">{{ __('themes.modal_create_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('themes.close') }}"></button>
            </div>
            <form action="{{ route('admin.themes.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="createBusinessActivity" class="form-label">{{ __('themes.form_business_activity') }}</label>
                            <select class="form-select" id="createBusinessActivity" name="business_activity_id" required>
                                <option value="">{{ __('themes.form_select_business_activity') }}</option>
                                @foreach ($businessActivities as $businessActivity)
                                    <option value="{{ $businessActivity->id }}">{{ $businessActivity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="createTitle" class="form-label">{{ __('themes.form_title') }}</label>
                            <input type="text" class="form-control" id="createTitle" name="title" required placeholder="{{ __('themes.placeholder_title') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="createHasPrice" name="has_price" value="1">
                                <label class="form-check-label" for="createHasPrice">
                                    {{ __('themes.form_has_price') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3" id="createPriceField" style="display: none;">
                            <label for="createPrice" class="form-label">{{ __('themes.form_price') }}</label>
                            <input type="number" step="0.01" class="form-control" id="createPrice" name="price" placeholder="{{ __('themes.placeholder_price') }}">
                            <small class="text-muted">{{ __('themes.help_price') }}</small>
                        </div>

                        <input class="form-check-input" type="hidden" id="createIsActive" name="is_active" value="1" checked>

                        <div class="col-md-12 mb-3">
                            <label for="createFeatures" class="form-label">{{ __('themes.form_features') }}</label>
                            <textarea class="form-control" id="createFeatures" name="features" rows="4" required placeholder="{{ __('themes.placeholder_features') }}"></textarea>
                            <small class="text-muted">{{ __('themes.help_features') }}</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="createPages" class="form-label">{{ __('themes.form_pages') }}</label>
                            <select class="form-select" id="createPages" name="pages[]" multiple>
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}">{{ $page->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">{{ __('themes.help_pages') }}</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('themes.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('themes.create_theme') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Theme Modal -->
<div class="modal fade" id="viewThemeModal" tabindex="-1" aria-labelledby="viewThemeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewThemeModalLabel">{{ __('themes.modal_view_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('themes.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('themes.theme_id') }}</label>
                        <p class="form-control-plaintext" id="viewThemeId"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('themes.theme_title') }}</label>
                        <p class="form-control-plaintext" id="viewThemeTitle"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('themes.business_activity') }}</label>
                        <p class="form-control-plaintext" id="viewThemeBusinessActivity"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('themes.theme_price') }}</label>
                        <p class="form-control-plaintext" id="viewThemePrice"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('themes.theme_status') }}</label>
                        <p class="form-control-plaintext" id="viewThemeStatus"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">{{ __('themes.created_at') }}</label>
                        <p class="form-control-plaintext" id="viewThemeCreated"></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">{{ __('themes.features') }}</label>
                        <p class="form-control-plaintext" id="viewThemeFeatures"></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">{{ __('themes.assigned_pages') }}</label>
                        <p class="form-control-plaintext" id="viewThemePages"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('themes.close') }}</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Theme Modal -->
<div class="modal fade" id="editThemeModal" tabindex="-1" aria-labelledby="editThemeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editThemeModalLabel">{{ __('themes.modal_edit_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('themes.close') }}"></button>
            </div>
            <form id="editThemeForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editBusinessActivity" class="form-label">{{ __('themes.form_business_activity') }}</label>
                            <select class="form-select" id="editBusinessActivity" name="business_activity_id" required>
                                <option value="">{{ __('themes.form_select_business_activity') }}</option>
                                @foreach ($businessActivities as $businessActivity)
                                    <option value="{{ $businessActivity->id }}">{{ $businessActivity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editTitle" class="form-label">{{ __('themes.form_title') }}</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required placeholder="{{ __('themes.placeholder_title') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editHasPrice" name="has_price" value="1">
                                <label class="form-check-label" for="editHasPrice">
                                    {{ __('themes.form_has_price') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3" id="editPriceField" style="display: none;">
                            <label for="editPrice" class="form-label">{{ __('themes.form_price') }}</label>
                            <input type="number" step="0.01" class="form-control" id="editPrice" name="price" placeholder="{{ __('themes.placeholder_price') }}">
                            <small class="text-muted">{{ __('themes.help_price') }}</small>
                        </div>

                        <input class="form-check-input" type="hidden" id="editIsActive" name="is_active" value="1">

                        <div class="col-md-12 mb-3">
                            <label for="editFeatures" class="form-label">{{ __('themes.form_features') }}</label>
                            <textarea class="form-control" id="editFeatures" name="features" rows="4" required placeholder="{{ __('themes.placeholder_features') }}"></textarea>
                            <small class="text-muted">{{ __('themes.help_features') }}</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="editPages" class="form-label">{{ __('themes.form_pages') }}</label>
                            <select class="form-select" id="editPages" name="pages[]" multiple>
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}">{{ $page->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">{{ __('themes.help_pages') }}</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('themes.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('themes.update_theme') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Theme Modal -->
<div class="modal fade" id="deleteThemeModal" tabindex="-1" aria-labelledby="deleteThemeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteThemeModalLabel">{{ __('themes.modal_delete_title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('themes.close') }}"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('themes.modal_delete_message') }} <strong id="deleteThemeTitle"></strong></p>
                <p class="text-danger">{{ __('themes.modal_delete_warning') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('themes.cancel') }}</button>
                <form id="deleteThemeForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('themes.delete') }}</button>
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
                <strong class="me-auto">{{ __('themes.toast_success') }}</strong>
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
                <strong class="me-auto">{{ __('themes.toast_error') }}</strong>
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
        const searchInput = document.getElementById('searchThemes');
        const filterSelect = document.getElementById('filterStatus');
        const filterBusinessActivitySelect = document.getElementById('filterBusinessActivity');
        const themeRows = document.querySelectorAll('.theme-row');

        function filterThemes() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusFilter = filterSelect.value;
            const businessActivityFilter = filterBusinessActivitySelect.value;

            themeRows.forEach(row => {
                const title = row.querySelector('h6').textContent.toLowerCase();
                const status = row.getAttribute('data-status');
                const businessActivity = row.getAttribute('data-business-activity');

                const matchesSearch = title.includes(searchTerm);
                const matchesStatus = !statusFilter || status === statusFilter;
                const matchesBusinessActivity = !businessActivityFilter || businessActivity === businessActivityFilter;

                if (matchesSearch && matchesStatus && matchesBusinessActivity) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', filterThemes);
        filterSelect.addEventListener('change', filterThemes);
        filterBusinessActivitySelect.addEventListener('change', filterThemes);

        // Price Toggle Functionality
        const createHasPriceToggle = document.getElementById('createHasPrice');
        const createPriceField = document.getElementById('createPriceField');
        const editHasPriceToggle = document.getElementById('editHasPrice');
        const editPriceField = document.getElementById('editPriceField');

        createHasPriceToggle.addEventListener('change', function() {
            if (this.checked) {
                createPriceField.style.display = 'block';
                createPriceField.querySelector('input').required = true;
            } else {
                createPriceField.style.display = 'none';
                createPriceField.querySelector('input').required = false;
                createPriceField.querySelector('input').value = '';
            }
        });

        editHasPriceToggle.addEventListener('change', function() {
            if (this.checked) {
                editPriceField.style.display = 'block';
                editPriceField.querySelector('input').required = true;
            } else {
                editPriceField.style.display = 'none';
                editPriceField.querySelector('input').required = false;
                editPriceField.querySelector('input').value = '';
            }
        });

        // View Theme Modal
        const viewModal = document.getElementById('viewThemeModal');
        viewModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const themeId = button.getAttribute('data-theme-id');
            const themeTitle = button.getAttribute('data-theme-title');
            const themeBusinessActivity = button.getAttribute('data-theme-business-activity');
            const themeFeatures = button.getAttribute('data-theme-features');
            const themePrice = button.getAttribute('data-theme-price');
            const themeStatus = button.getAttribute('data-theme-status');
            const themePages = button.getAttribute('data-theme-pages');
            const themeCreated = button.getAttribute('data-theme-created');

            // Update modal content
            document.getElementById('viewThemeId').textContent = themeId;
            document.getElementById('viewThemeTitle').textContent = themeTitle;
            document.getElementById('viewThemeBusinessActivity').textContent = themeBusinessActivity;
            document.getElementById('viewThemeFeatures').textContent = themeFeatures;
            document.getElementById('viewThemePrice').textContent = themePrice === 'null' || themePrice === null || themePrice === '' ?
                '{{ __('themes.free') }}' : '$' + parseFloat(themePrice).toFixed(2);
            document.getElementById('viewThemeStatus').innerHTML = themeStatus === '1' ?
                '<span class="badge bg-success">{{ __('themes.active') }}</span>' :
                '<span class="badge bg-danger">{{ __('themes.inactive') }}</span>';
            document.getElementById('viewThemePages').textContent = themePages || '{{ __('themes.no_pages_assigned') }}';
            document.getElementById('viewThemeCreated').textContent = themeCreated;
        });

        // Edit Theme Modal
        const editModal = document.getElementById('editThemeModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const themeId = button.getAttribute('data-theme-id');
            const themeBusinessActivityId = button.getAttribute('data-theme-business-activity-id');
            const themeTitle = button.getAttribute('data-theme-title');
            const themeFeatures = button.getAttribute('data-theme-features');
            const themePrice = button.getAttribute('data-theme-price');
            const themeStatus = button.getAttribute('data-theme-status');
            const themePages = JSON.parse(button.getAttribute('data-theme-pages'));

            // Update form action
            document.getElementById('editThemeForm').action = `/admin/themes/${themeId}`;

            // Update form fields
            document.getElementById('editBusinessActivity').value = themeBusinessActivityId;
            document.getElementById('editTitle').value = themeTitle;
            document.getElementById('editFeatures').value = themeFeatures;
            document.getElementById('editIsActive').checked = themeStatus === '1';

            // Handle price toggle and field
            const hasPrice = themePrice !== 'null' && themePrice !== null && themePrice !== '';
            document.getElementById('editHasPrice').checked = hasPrice;
            if (hasPrice) {
                document.getElementById('editPriceField').style.display = 'block';
                document.getElementById('editPrice').value = themePrice;
                document.getElementById('editPrice').required = true;
            } else {
                document.getElementById('editPriceField').style.display = 'none';
                document.getElementById('editPrice').value = '';
                document.getElementById('editPrice').required = false;
            }

            // Update pages selection
            const editPagesSelect = document.getElementById('editPages');
            Array.from(editPagesSelect.options).forEach(option => {
                option.selected = themePages.includes(parseInt(option.value));
            });
        });

        // Delete Theme Modal
        const deleteModal = document.getElementById('deleteThemeModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const themeId = button.getAttribute('data-theme-id');
            const themeTitle = button.getAttribute('data-theme-title');

            // Update form action
            document.getElementById('deleteThemeForm').action = `/admin/themes/${themeId}`;

            // Update modal content
            document.getElementById('deleteThemeTitle').textContent = themeTitle;
        });

        // Status Toggle Functionality
        const statusToggles = document.querySelectorAll('.status-toggle');
        statusToggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const themeId = this.getAttribute('data-theme-id');
                const themeTitle = this.getAttribute('data-theme-title');
                const isActive = this.checked;
                const statusText = this.closest('td').querySelector('.status-text');
                const row = this.closest('tr');

                // Show loading state
                const originalText = statusText.innerHTML;
                statusText.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>{{ __('themes.loading') }}';
                this.disabled = true;

                // Make AJAX request
                fetch(`/admin/themes/${themeId}/toggle`, {
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
                                statusText.innerHTML = '<span class="badge bg-success">{{ __('themes.active') }}</span>';
                                row.setAttribute('data-status', 'active');
                            } else {
                                statusText.innerHTML = '<span class="badge bg-danger">{{ __('themes.inactive') }}</span>';
                                row.setAttribute('data-status', 'inactive');
                            }

                            // Show success toast
                            showToast('success', data.message || '{{ __('themes.success_updated') }}');
                        } else {
                            // Revert toggle state
                            this.checked = !isActive;
                            statusText.innerHTML = originalText;
                            showToast('error', data.message || '{{ __('themes.error_toggle') }}');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Revert toggle state
                        this.checked = !isActive;
                        statusText.innerHTML = originalText;
                        showToast('error', '{{ __('themes.error_toggle') }}');
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

            const successText = '{{ __('themes.toast_success') }}';
            const errorText = '{{ __('themes.toast_error') }}';

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
