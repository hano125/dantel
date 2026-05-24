/* Sliding Invoice Preview Drawer Logic — updated for premium CSS */
window.togglePreview = function(invoiceNum, patientName, date, amount, status) {
    const previewDrawer = document.getElementById('invoicePreview');
    const overlay = document.getElementById('invoice-overlay');

    if (previewDrawer && overlay) {
        const isClosed = !previewDrawer.classList.contains('open');

        if (isClosed) {
            if (invoiceNum) {
                document.getElementById('drawer-inv-num').innerText   = invoiceNum;
                document.getElementById('drawer-patient-name').innerText = patientName;
                document.getElementById('drawer-inv-date').innerText  = date;
                document.getElementById('drawer-inv-status').innerText = status;
                document.getElementById('drawer-total-amount').innerText        = amount;
                document.getElementById('drawer-subtotal-amount').innerText     = amount;
                document.getElementById('drawer-total-amount-large').innerText  = amount;
            }

            // Trigger opening animation
            requestAnimationFrame(() => {
                previewDrawer.classList.add('open');
                overlay.classList.add('open');
            });
        } else {
            previewDrawer.classList.remove('open');
            overlay.classList.remove('open');
        }
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const overlay = document.getElementById('invoice-overlay');
    if (overlay) {
        overlay.addEventListener('click', () => {
            window.togglePreview();
        });
    }

    // Keyboard close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const previewDrawer = document.getElementById('invoicePreview');
            const overlay = document.getElementById('invoice-overlay');
            if (previewDrawer && previewDrawer.classList.contains('open')) {
                previewDrawer.classList.remove('open');
                overlay.classList.remove('open');
            }
        }
    });
});
