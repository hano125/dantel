/* Interactive Patient Profile & Tooth Map */
document.addEventListener('DOMContentLoaded', () => {
    // ─────────────────────────────────────────────────
    // Tooth Map — click to inspect
    // ─────────────────────────────────────────────────
    const teeth = document.querySelectorAll('.tooth-item');
    const toothDetails = document.getElementById('selected-tooth-details');
    const toothNum     = document.getElementById('selected-tooth-number');

    const stateMap = {
        'healthy':           'سليم ✓',
        'needs-treatment':   'يحتاج علاج — تسوس عميق ⚠️',
        'in-progress':       'قيد العلاج — حشوة عصب 🔵',
    };

    teeth.forEach(tooth => {
        tooth.addEventListener('click', function () {
            // Remove selected state from all
            teeth.forEach(t => t.classList.remove('selected', 'ring-2', 'ring-primary'));
            this.classList.add('selected');

            const id    = this.dataset.toothId;
            const state = this.dataset.state;

            if (toothNum)     toothNum.innerText     = `السن رقم ${id}`;
            if (toothDetails) toothDetails.innerText = `الحالة: ${stateMap[state] || 'غير محدد'}`;
        });
    });

    // ─────────────────────────────────────────────────
    // Tab Navigation — now uses `active` CSS class
    // ─────────────────────────────────────────────────
    const tabBtns   = document.querySelectorAll('.patient-tab-btn');
    const tabPanels = document.querySelectorAll('.patient-tab-panel');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const target = this.dataset.tab;

            // Update button states
            tabBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            // Show / hide panels with a small fade
            tabPanels.forEach(panel => {
                if (panel.id === `${target}-panel`) {
                    panel.classList.remove('hidden');
                    panel.style.animation = 'fadeInUp 0.3s ease both';
                } else {
                    panel.classList.add('hidden');
                }
            });
        });
    });
});
