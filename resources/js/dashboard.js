/* Dashboard Revenue Chart & Interactive Elements */
document.addEventListener('DOMContentLoaded', () => {
    // Animate revenue bars sequentially on load
    const bars = document.querySelectorAll('.chart-bar');
    bars.forEach((bar, index) => {
        const targetHeight = bar.getAttribute('data-height');
        bar.style.height = '0%';
        setTimeout(() => {
            bar.style.height = targetHeight;
        }, index * 80);
    });

    // Handle range switches for revenue chart
    const graphToggles = document.querySelectorAll('.graph-toggle');
    graphToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            graphToggles.forEach(t => {
                t.classList.remove('bg-primary', 'text-on-primary');
                t.classList.add('bg-surface-container', 'text-on-surface-variant');
            });
            this.classList.add('bg-primary', 'text-on-primary');
            this.classList.remove('bg-surface-container', 'text-on-surface-variant');
            
            // Randomize bar heights to simulate chart update
            bars.forEach(bar => {
                const randomHeight = Math.floor(Math.random() * 60) + 30; // 30% - 90%
                bar.style.height = `${randomHeight}%`;
            });
        });
    });
});
