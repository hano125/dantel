/* Collapsible Sidebar Logic */
document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('app-sidebar');
    const toggleBtn = document.getElementById('sidebar-toggle-btn');
    const treatmentTrigger = document.getElementById('sidebar-treatment-trigger');
    const treatmentSubmenu = document.getElementById('sidebar-treatment-submenu');
    const treatmentArrow = document.getElementById('treatment-arrow');

    // Toggle entire sidebar width (collapsed vs expanded)
    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-collapsed');
            
            // Adjust main content margin dynamically on large screens
            const mainContent = document.querySelector('main');
            if (mainContent) {
                if (sidebar.classList.contains('sidebar-collapsed')) {
                    mainContent.style.marginRight = '70px';
                } else {
                    mainContent.style.marginRight = '260px';
                }
            }
        });
    }

    // Toggle nested submenu for treatments
    if (treatmentTrigger && treatmentSubmenu) {
        treatmentTrigger.addEventListener('click', () => {
            const isHidden = treatmentSubmenu.classList.contains('hidden');
            if (isHidden) {
                treatmentSubmenu.classList.remove('hidden');
                if (treatmentArrow) {
                    treatmentArrow.style.transform = 'rotate(180deg)';
                }
            } else {
                treatmentSubmenu.classList.add('hidden');
                if (treatmentArrow) {
                    treatmentArrow.style.transform = 'rotate(0deg)';
                }
            }
        });
    }
});
