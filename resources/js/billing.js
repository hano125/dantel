/* Sliding Invoice Preview Drawer Logic */
window.togglePreview = function(invoiceNum, patientName, date, amount, status) {
    const previewDrawer = document.getElementById('invoicePreview');
    const overlay = document.getElementById('invoice-overlay');

    if (previewDrawer && overlay) {
        const isClosed = !previewDrawer.classList.contains('drawer-open');
        
        if (isClosed) {
            // Update contents dynamically if arguments provided
            if (invoiceNum) {
                document.getElementById('drawer-inv-num').innerText = invoiceNum;
                document.getElementById('drawer-patient-name').innerText = patientName;
                document.getElementById('drawer-inv-date').innerText = date;
                document.getElementById('drawer-inv-status').innerText = status;
                document.getElementById('drawer-total-amount').innerText = amount;
                document.getElementById('drawer-subtotal-amount').innerText = amount;
            }

            previewDrawer.classList.remove('hidden');
            // Force redraw for CSS transition
            previewDrawer.offsetHeight; 
            previewDrawer.classList.add('drawer-open');
            overlay.classList.add('overlay-open');
        } else {
            previewDrawer.classList.remove('drawer-open');
            overlay.classList.remove('overlay-open');
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
});
