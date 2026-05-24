/* Dentera Global Application Core - Vanilla JS */

document.addEventListener('DOMContentLoaded', () => {
    // ─────────────────────────────────────────────────────────────
    // Dark Mode
    // ─────────────────────────────────────────────────────────────
    const darkToggle = document.getElementById('dark-mode-toggle');
    const darkIcon   = document.getElementById('dark-mode-icon');
    const body       = document.body;

    const applyDark = (isDark) => {
        body.classList.toggle('dark-mode', isDark);
        document.documentElement.classList.toggle('dark', isDark);
        if (darkIcon) darkIcon.innerText = isDark ? 'dark_mode' : 'light_mode';
    };

    // On load — check preference
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    applyDark(savedTheme === 'dark' || (!savedTheme && prefersDark));

    if (darkToggle) {
        darkToggle.addEventListener('click', () => {
            const isDark = !body.classList.contains('dark-mode');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            applyDark(isDark);
        });
    }

    // ─────────────────────────────────────────────────────────────
    // Global Header Dropdowns
    // ─────────────────────────────────────────────────────────────
    const dropdownPairs = [
        ['clinic-switcher-btn',  'clinic-switcher-dropdown'],
        ['notifications-btn',    'notifications-dropdown'],
        ['profile-dropdown-btn', 'profile-dropdown'],
    ];

    function closeAllDropdowns(exceptId = '') {
        dropdownPairs.forEach(([, dropId]) => {
            if (dropId !== exceptId) {
                const el = document.getElementById(dropId);
                if (el) el.classList.add('hidden');
            }
        });
    }

    dropdownPairs.forEach(([btnId, dropId]) => {
        const btn  = document.getElementById(btnId);
        const drop = document.getElementById(dropId);
        if (btn && drop) {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                closeAllDropdowns(dropId);
                drop.classList.toggle('hidden');
            });
        }
    });

    // Close on outside click
    document.addEventListener('click', () => closeAllDropdowns());

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeAllDropdowns();
    });

    // ─────────────────────────────────────────────────────────────
    // Header scroll shadow enhancement
    // ─────────────────────────────────────────────────────────────
    const header = document.getElementById('app-header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 8) {
                header.style.boxShadow = '0 4px 24px rgba(15,23,42,0.1)';
            } else {
                header.style.boxShadow = '';
            }
        }, { passive: true });
    }

    // ─────────────────────────────────────────────────────────────
    // Stagger animate-fade-in-up on children
    // ─────────────────────────────────────────────────────────────
    document.querySelectorAll('.animate-fade-in-up').forEach((el, i) => {
        el.style.animationDelay = `${i * 50}ms`;
    });
});
