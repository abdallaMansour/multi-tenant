<script src="{{ asset('assets_dashboard/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets_dashboard/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets_dashboard/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets_dashboard/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('assets_dashboard/js/plugins.init.js') }}"></script>
<script src="{{ asset('assets_dashboard/js/app.js') }}"></script>

<!-- Custom Theme Switcher -->
<script>
    function setTheme(theme, colorMode) {
        // Update the theme in localStorage for immediate UI change
        localStorage.setItem('theme', theme);
        
        // Apply the theme immediately
        document.documentElement.setAttribute('data-theme', theme);
        
        // Update the color mode in the database
        if (colorMode && typeof colorMode !== 'undefined') {
            fetch(`/change-color-mode/${colorMode}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Color mode updated successfully:', colorMode);
                } else {
                    console.error('Failed to update color mode:', data.message);
                }
            })
            .catch(error => {
                console.error('Error updating color mode:', error);
            });
        }
        
        // Update theme switcher UI
        updateThemeSwitcherUI(theme);
    }
    
    function updateThemeSwitcherUI(theme) {
        // Remove active class from all theme switchers
        document.querySelectorAll('.theme-icon').forEach(icon => {
            icon.classList.remove('active');
        });
        
        // Add active class to the current theme
        const activeTheme = document.querySelector(`[onclick*="${theme}"]`);
        if (activeTheme) {
            activeTheme.classList.add('active');
        }
    }
    
    // Language change function
    function changeLanguage(lang) {
        // Update the language in the database
        fetch(`/change-lang/${lang}`, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Language updated successfully:', lang);
                // Get current path without language prefix
                const currentPath = window.location.pathname;
                const pathWithoutLang = currentPath.replace(/^\/[a-z]{2}(?=\/|$)/, '') || '/';
                
                // Redirect to the new language URL
                window.location.href = `/${lang}${pathWithoutLang}${window.location.search}`;
            } else {
                console.error('Failed to update language:', data.message);
                // Fallback: redirect anyway
                const currentPath = window.location.pathname;
                const pathWithoutLang = currentPath.replace(/^\/[a-z]{2}(?=\/|$)/, '') || '/';
                window.location.href = `/${lang}${pathWithoutLang}${window.location.search}`;
            }
        })
        .catch(error => {
            console.error('Error updating language:', error);
            // Fallback: redirect anyway
            const currentPath = window.location.pathname;
            const pathWithoutLang = currentPath.replace(/^\/[a-z]{2}(?=\/|$)/, '') || '/';
            window.location.href = `/${lang}${pathWithoutLang}${window.location.search}`;
        });
    }
    
    // Initialize theme on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Get user's saved color mode from the database (via CSS class)
        const userColorMode = '{{ auth()->check() && auth()->user()->color_mode ? auth()->user()->color_mode : "light" }}';
        const savedTheme = localStorage.getItem('theme') || (userColorMode === 'dark' ? 'style-dark' : 'style');
        
        // Apply the theme without updating the database (since it's already saved)
        localStorage.setItem('theme', savedTheme);
        document.documentElement.setAttribute('data-theme', savedTheme);
        updateThemeSwitcherUI(savedTheme);
    });
</script>