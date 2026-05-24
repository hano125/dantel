/* Dashboard Revenue Chart & Interactive Elements */
document.addEventListener('DOMContentLoaded', () => {
    // ─────────────────────────────────────────────────
    // Animate revenue bars sequentially on load
    // ─────────────────────────────────────────────────
    const bars = document.querySelectorAll('.chart-bar');
    bars.forEach((bar, index) => {
        const targetHeight = bar.getAttribute('data-height');
        bar.style.height = '0%';
        bar.style.transition = `height 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) ${index * 90}ms`;
        requestAnimationFrame(() => {
            setTimeout(() => {
                bar.style.height = targetHeight;
            }, 50 + index * 80);
        });
    });

    // ─────────────────────────────────────────────────
    // Graph range toggles — use `active` CSS class
    // ─────────────────────────────────────────────────
    const graphToggles = document.querySelectorAll('.graph-toggle');
    graphToggles.forEach(toggle => {
        toggle.addEventListener('click', function () {
            graphToggles.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            // Animate bars with new random values to simulate data change
            bars.forEach((bar, i) => {
                const h = Math.floor(Math.random() * 65) + 25;
                bar.style.transition = `height 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) ${i * 60}ms`;
                bar.style.height = `${h}%`;
            });
        });
    });

    // ─────────────────────────────────────────────────
    // Inventory progress bars animate in
    // ─────────────────────────────────────────────────
    const progressFills = document.querySelectorAll('.inventory-progress-fill');
    progressFills.forEach(fill => {
        const target = fill.style.width;
        fill.style.width = '0%';
        setTimeout(() => { fill.style.width = target; }, 300);
    });
});
