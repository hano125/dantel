/* Dentera Global Application Core - Vanilla JS */

document.addEventListener('DOMContentLoaded', () => {
    // ---------------------------------------------------------
    // Dark Mode Toggle Logic
    // ---------------------------------------------------------
    const darkToggle = document.getElementById('dark-mode-toggle');
    const darkIcon = document.getElementById('dark-mode-icon');
    
    // Check initial dark state
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        if (darkIcon) {
            darkIcon.innerText = 'dark_mode';
        }
    } else {
        document.documentElement.classList.remove('dark');
        if (darkIcon) {
            darkIcon.innerText = 'light_mode';
        }
    }

    if (darkToggle) {
        darkToggle.addEventListener('click', () => {
            const isDark = document.documentElement.classList.toggle('dark');
            if (isDark) {
                localStorage.theme = 'dark';
                if (darkIcon) {
                    darkIcon.innerText = 'dark_mode';
                }
            } else {
                localStorage.theme = 'light';
                if (darkIcon) {
                    darkIcon.innerText = 'light_mode';
                }
            }
        });
    }

    // ---------------------------------------------------------
    // Global Header Dropdowns Toggles
    // ---------------------------------------------------------
    setupDropdown('clinic-switcher-btn', 'clinic-switcher-dropdown');
    setupDropdown('notifications-btn', 'notifications-dropdown');
    setupDropdown('lang-switcher-btn', 'lang-switcher-dropdown');
    setupDropdown('profile-dropdown-btn', 'profile-dropdown');

    function setupDropdown(triggerId, dropdownId) {
        const trigger = document.getElementById(triggerId);
        const dropdown = document.getElementById(dropdownId);
        
        if (trigger && dropdown) {
            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                // Close all other dropdowns first
                closeAllDropdowns(dropdownId);
                dropdown.classList.toggle('hidden');
            });
        }
    }

    function closeAllDropdowns(exceptId = '') {
        const dropdowns = [
            'clinic-switcher-dropdown',
            'notifications-dropdown',
            'lang-switcher-dropdown',
            'profile-dropdown'
        ];
        
        dropdowns.forEach(id => {
            if (id !== exceptId) {
                const el = document.getElementById(id);
                if (el) {
                    el.classList.add('hidden');
                }
            }
        });
    }

    // Close dropdowns on outside clicks
    document.addEventListener('click', () => {
        closeAllDropdowns();
    });
});
