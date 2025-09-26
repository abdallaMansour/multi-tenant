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
                    <h5 class="mb-0">{{ __('packages.create_package') }}</h5>

                    <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                        <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">{{ __('packages.breadcrumb_home') }}</a></li>
                            <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.packages.index') }}">{{ __('packages.breadcrumb_packages') }}</a></li>
                            <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ __('packages.breadcrumb_create') }}</li>
                        </ul>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card border-0 rounded shadow">
                            <div class="card-header bg-transparent border-bottom p-3">
                                <h5 class="mb-0">{{ __('packages.create_package_form') }}</h5>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('admin.packages.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <!-- Package Name -->
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">{{ __('packages.form_name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ old('name') }}"
                                                placeholder="{{ __('packages.placeholder_name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Plan Type -->
                                        <div class="col-md-6 mb-3">
                                            <label for="plan" class="form-label">{{ __('packages.form_plan') }} <span class="text-danger">*</span></label>
                                            <select class="form-select @error('plan') is-invalid @enderror" id="plan" name="plan" required>
                                                <option value="">{{ __('packages.select_plan') }}</option>
                                                <option value="monthly" {{ old('plan') == 'monthly' ? 'selected' : '' }}>{{ __('packages.monthly') }}</option>
                                                <option value="yearly" {{ old('plan') == 'yearly' ? 'selected' : '' }}>{{ __('packages.yearly') }}</option>
                                            </select>
                                            @error('plan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Price -->
                                        <div class="col-md-6 mb-3">
                                            <label for="price" class="form-label">{{ __('packages.form_price') }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                                    id="price" name="price" value="{{ old('price') }}"
                                                    placeholder="0.00" step="0.01" min="0" required>
                                            </div>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Trial Days -->
                                        <div class="col-md-6 mb-3">
                                            <label for="trial_days" class="form-label">{{ __('packages.form_trial_days') }} <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('trial_days') is-invalid @enderror"
                                                id="trial_days" name="trial_days" value="{{ old('trial_days', 7) }}"
                                                placeholder="7" min="0" required>
                                            @error('trial_days')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Active Status -->
                                        <div class="col-md-12 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                                    {{ old('is_active', true) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active">
                                                    {{ __('packages.form_is_active') }}
                                                </label>
                                            </div>
                                            @error('is_active')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Features Section -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">{{ __('packages.form_features') }} <span class="text-danger">*</span></label>
                                            <div id="features-container">
                                                @if (old('features'))
                                                    @foreach (old('features') as $index => $feature)
                                                        <div class="input-group mb-2 feature-input">
                                                            <input type="text" class="form-control @error('features.' . $index) is-invalid @enderror"
                                                                name="features[]" value="{{ $feature }}"
                                                                placeholder="{{ __('packages.placeholder_feature') }}" required>
                                                            <button type="button" class="btn btn-outline-danger remove-feature"
                                                                {{ count(old('features')) <= 1 ? 'disabled' : '' }}>
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                            @error('features.' . $index)
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="input-group mb-2 feature-input">
                                                        <input type="text" class="form-control" name="features[]"
                                                            placeholder="{{ __('packages.placeholder_feature') }}" required>
                                                        <button type="button" class="btn btn-outline-danger remove-feature" disabled>
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                            <button type="button" class="btn btn-outline-primary btn-sm" id="add-feature">
                                                <i class="ti ti-plus me-1"></i> {{ __('packages.add_feature') }}
                                            </button>
                                            @error('features')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
                                                    <i class="ti ti-arrow-left me-1"></i> {{ __('packages.cancel') }}
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ti ti-check me-1"></i> {{ __('packages.create_package') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

<!-- javascript -->
<!-- JAVASCRIPT -->
@include('dashboard_layouts.js')

<!-- Custom JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const featuresContainer = document.getElementById('features-container');
        const addFeatureBtn = document.getElementById('add-feature');

        // Add feature input
        addFeatureBtn.addEventListener('click', function() {
            const featureInput = document.createElement('div');
            featureInput.className = 'input-group mb-2 feature-input';
            featureInput.innerHTML = `
                <input type="text" class="form-control" name="features[]" 
                       placeholder="{{ __('packages.placeholder_feature') }}" required>
                <button type="button" class="btn btn-outline-danger remove-feature">
                    <i class="ti ti-trash"></i>
                </button>
            `;
            featuresContainer.appendChild(featureInput);
            updateRemoveButtons();
        });

        // Remove feature input
        featuresContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-feature')) {
                const featureInput = e.target.closest('.feature-input');
                if (featuresContainer.children.length > 1) {
                    featureInput.remove();
                    updateRemoveButtons();
                }
            }
        });

        // Update remove buttons state
        function updateRemoveButtons() {
            const featureInputs = featuresContainer.querySelectorAll('.feature-input');
            const removeButtons = featuresContainer.querySelectorAll('.remove-feature');

            removeButtons.forEach(button => {
                button.disabled = featureInputs.length <= 1;
            });
        }

        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const featureInputs = featuresContainer.querySelectorAll('input[name="features[]"]');
            let hasValidFeature = false;

            featureInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasValidFeature = true;
                }
            });

            if (!hasValidFeature) {
                e.preventDefault();
                alert('{{ __('packages.at_least_one_feature_required') }}');
                return false;
            }
        });
    });
</script>
</body>

</html>
