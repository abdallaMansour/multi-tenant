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
                            <h5 class="mb-0">Settings</h5>

                            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('admin.dashboard') }}">Landrick</a></li>
                                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Settings</li>
                                </ul>
                            </nav>
                        </div>
                    
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card border-0 rounded shadow">
                                    <div class="card-header bg-transparent border-bottom p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Settings Management</h5>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSettingModal">
                                                <i class="ti ti-plus me-1"></i> Add New Setting
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        @if($settings->count() > 0)
                                            <form action="{{ route('tenant.settings.post') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    @foreach($settings as $setting)
                                                        <div class="col-md-6 mb-3">
                                                            <label for="setting_{{ $setting->id }}" class="form-label">
                                                                {{ $setting->label }}
                                                                <span class="text-muted small">({{ $setting->type }})</span>
                                                            </label>
                                                            
                                                            @if($setting->type === 'textarea')
                                                                <textarea 
                                                                    class="form-control @error('settings.'.$loop->index.'.value') is-invalid @enderror" 
                                                                    id="setting_{{ $setting->id }}" 
                                                                    name="settings[{{ $loop->index }}][value]" 
                                                                    rows="3"
                                                                >{{ old('settings.'.$loop->index.'.value', $setting->value) }}</textarea>
                                                            @elseif($setting->type === 'select')
                                                                <select 
                                                                    class="form-control @error('settings.'.$loop->index.'.value') is-invalid @enderror" 
                                                                    id="setting_{{ $setting->id }}" 
                                                                    name="settings[{{ $loop->index }}][value]"
                                                                >
                                                                    @php
                                                                        $options = explode(',', $setting->value);
                                                                        $currentValue = old('settings.'.$loop->index.'.value', $setting->value);
                                                                    @endphp
                                                                    @foreach($options as $option)
                                                                        <option value="{{ trim($option) }}" {{ trim($option) === $currentValue ? 'selected' : '' }}>
                                                                            {{ trim($option) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            @elseif($setting->type === 'checkbox')
                                                                <div class="form-check">
                                                                    <input 
                                                                        class="form-check-input @error('settings.'.$loop->index.'.value') is-invalid @enderror" 
                                                                        type="checkbox" 
                                                                        id="setting_{{ $setting->id }}" 
                                                                        name="settings[{{ $loop->index }}][value]" 
                                                                        value="1"
                                                                        {{ old('settings.'.$loop->index.'.value', $setting->value) == '1' ? 'checked' : '' }}
                                                                    >
                                                                    <label class="form-check-label" for="setting_{{ $setting->id }}">
                                                                        Enable {{ $setting->label }}
                                                                    </label>
                                                                </div>
                                                            @elseif($setting->type === 'file')
                                                                <div class="file-input-wrapper">
                                                                    <input 
                                                                        type="file" 
                                                                        class="form-control @error('settings.'.$loop->index.'.value') is-invalid @enderror" 
                                                                        id="setting_{{ $setting->id }}" 
                                                                        name="settings[{{ $loop->index }}][value]"
                                                                        accept="image/*,.pdf,.doc,.docx,.txt"
                                                                    >
                                                                    @if($setting->value)
                                                                        <div class="mt-2">
                                                                            <small class="text-muted">
                                                                                <i class="ti ti-file me-1"></i>
                                                                                Current file: {{ $setting->value }}
                                                                            </small>
                                                                            @if(
                                                                                str_contains($setting->value, '.jpg') ||
                                                                                str_contains($setting->value, '.jpeg') ||
                                                                                str_contains($setting->value, '.png') ||
                                                                                str_contains($setting->value, '.gif') ||
                                                                                str_contains($setting->value, '.pdf') ||
                                                                                str_contains($setting->value, '.doc') ||
                                                                                str_contains($setting->value, '.docx') ||
                                                                                str_contains($setting->value, '.txt'))
                                                                                <br>
                                                                                <img src="{{ asset('storage/' . $setting->value) }}" alt="Current file" class="mt-1" style="max-width: 100px; max-height: 100px; border-radius: 4px;">
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                    <small class="text-muted d-block mt-1">
                                                                        <i class="ti ti-info-circle me-1"></i>
                                                                        Leave empty to keep current file
                                                                    </small>
                                                                </div>
                                                            @else
                                                                <input 
                                                                    type="{{ $setting->type === 'email' ? 'email' : ($setting->type === 'number' ? 'number' : 'text') }}" 
                                                                    class="form-control @error('settings.'.$loop->index.'.value') is-invalid @enderror" 
                                                                    id="setting_{{ $setting->id }}" 
                                                                    name="settings[{{ $loop->index }}][value]" 
                                                                    value="{{ old('settings.'.$loop->index.'.value', $setting->value) }}"
                                                                >
                                                            @endif
                                                            
                                                            <input type="hidden" name="settings[{{ $loop->index }}][id]" value="{{ $setting->id }}">
                                                            
                                                            @error('settings.'.$loop->index.'.value')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    @endforeach
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="ti ti-device-floppy me-1"></i> Save Settings
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <div class="text-center py-5">
                                                <i class="ti ti-settings text-muted" style="font-size: 3rem;"></i>
                                                <h5 class="mt-3 text-muted">No Settings Found</h5>
                                                <p class="text-muted">Start by adding your first setting.</p>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSettingModal">
                                                    <i class="ti ti-plus me-1"></i> Add First Setting
                                                </button>
                                            </div>
                                        @endif
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
        
        <!-- Add Setting Modal -->
        <div class="modal fade" id="addSettingModal" tabindex="-1" aria-labelledby="addSettingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSettingModalLabel">Add New Setting</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('tenant.settings.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="label" class="form-label">Setting Label <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('label') is-invalid @enderror" id="label" name="label" value="{{ old('label') }}" required>
                                    @error('label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Input Type <span class="text-danger">*</span></label>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Text</option>
                                        <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>Email</option>
                                        <option value="number" {{ old('type') == 'number' ? 'selected' : '' }}>Number</option>
                                        <option value="textarea" {{ old('type') == 'textarea' ? 'selected' : '' }}>Textarea</option>
                                        <option value="select" {{ old('type') == 'select' ? 'selected' : '' }}>Select</option>
                                        <option value="checkbox" {{ old('type') == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
                                        <option value="file" {{ old('type') == 'file' ? 'selected' : '' }}>File</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="value" class="form-label">Default Value <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value') }}" required>
                                    <small class="text-muted">For select type, separate options with commas (e.g., option1,option2,option3)</small>
                                    @error('value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Setting</button>
                        </div>
                    </form>
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
            .file-input-wrapper {
                position: relative;
            }
            .file-input-wrapper input[type="file"] {
                padding: 0.375rem 0.75rem;
            }
            .file-input-wrapper .current-file {
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                border-radius: 0.375rem;
                padding: 0.5rem;
                margin-top: 0.5rem;
            }
        </style>

        <!-- Custom JavaScript for Settings -->
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
                
                // Form validation for settings form
                const settingsForm = document.querySelector('form[action="{{ route('tenant.settings.post') }}"]');
                if (settingsForm) {
                    settingsForm.addEventListener('submit', function(e) {
                        // Basic validation - check if at least one setting has a value
                        const inputs = settingsForm.querySelectorAll('input[name*="[value]"], textarea[name*="[value]"], select[name*="[value]"]');
                        let hasValue = false;
                        
                        inputs.forEach(function(input) {
                            if (input.type === 'checkbox') {
                                if (input.checked) hasValue = true;
                            } else if (input.type === 'file') {
                                // File inputs are always valid (can be empty)
                                hasValue = true;
                            } else if (input.value.trim() !== '') {
                                hasValue = true;
                            }
                        });
                        
                        if (!hasValue) {
                            e.preventDefault();
                            alert('Please fill in at least one setting before saving.');
                            return false;
                        }
                    });
                }
                
                // Dynamic form behavior for select type
                const typeSelect = document.getElementById('type');
                const valueInput = document.getElementById('value');
                
                if (typeSelect && valueInput) {
                    typeSelect.addEventListener('change', function() {
                        const type = this.value;
                        const helpText = valueInput.nextElementSibling;
                        
                        if (type === 'select') {
                            helpText.textContent = 'For select type, separate options with commas (e.g., option1,option2,option3)';
                            helpText.style.display = 'block';
                        } else if (type === 'checkbox') {
                            helpText.textContent = 'For checkbox type, use 1 for checked, 0 for unchecked';
                            helpText.style.display = 'block';
                        } else {
                            helpText.style.display = 'none';
                        }
                    });
                }
            });
        </script>
    </body>

</html>