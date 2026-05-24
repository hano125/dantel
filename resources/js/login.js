/* Login Interactive Logic */
window.togglePassword = function() {
    const passwordInput = document.getElementById('password');
    const icon = document.getElementById('visibility-icon');
    if (passwordInput && icon) {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.innerText = 'visibility_off';
        } else {
            passwordInput.type = 'password';
            icon.innerText = 'visibility';
        }
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const loginBtn = document.querySelector('button[type="submit"]');
    if (loginBtn) {
        loginBtn.addEventListener('mousedown', function(e) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple-effect');
            
            // Calculate ripple coordinates relative to button
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = `${size}px`;
            
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            
            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    }
});
