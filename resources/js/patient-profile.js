/* Interactive Patient Profile & Tooth Map */
document.addEventListener('DOMContentLoaded', () => {
    // Tooth selection micro-interactions
    const teeth = document.querySelectorAll('.tooth-item');
    const selectedToothDetails = document.getElementById('selected-tooth-details');
    const selectedToothNum = document.getElementById('selected-tooth-number');

    teeth.forEach(tooth => {
        tooth.addEventListener('click', function() {
            // Toggle highlight ring
            teeth.forEach(t => t.classList.remove('ring-2', 'ring-primary', 'scale-105'));
            this.classList.add('ring-2', 'ring-primary', 'scale-105');
            
            const toothId = this.getAttribute('data-tooth-id');
            const state = this.getAttribute('data-state');
            let stateText = 'سليم';
            if (state === 'needs-treatment') {
                stateText = 'يحتاج علاج (تسوس عميق)';
            } else if (state === 'in-progress') {
                stateText = 'قيد العلاج (حشوة عصب)';
            }
            
            if (selectedToothNum && selectedToothDetails) {
                selectedToothNum.innerText = `السن رقم ${toothId}`;
                selectedToothDetails.innerText = `حالة السن: ${stateText}. مستحلب من الجلسة السابقة.`;
            }
        });
    });

    // Patient Profile Tabs Toggling
    const tabButtons = document.querySelectorAll('.patient-tab-btn');
    const tabPanels = document.querySelectorAll('.patient-tab-panel');

    tabButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');

            tabButtons.forEach(b => {
                b.classList.remove('border-primary', 'text-primary', 'border-b-2');
                b.classList.add('text-on-surface-variant', 'hover:text-on-surface');
            });

            this.classList.add('border-primary', 'text-primary', 'border-b-2');
            this.classList.remove('text-on-surface-variant', 'hover:text-on-surface');

            tabPanels.forEach(panel => {
                if (panel.id === `${targetTab}-panel`) {
                    panel.classList.remove('hidden');
                } else {
                    panel.classList.add('hidden');
                }
            });
        });
    });
});
