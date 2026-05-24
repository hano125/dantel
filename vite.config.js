import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/sidebar.css',
                'resources/css/header.css',
                'resources/css/footer.css',
                'resources/css/dashboard.css',
                'resources/css/appointments.css',
                'resources/css/patient.css',
                'resources/css/billing.css',
                'resources/css/login.css',
                'resources/js/app.js',
                'resources/js/sidebar.js',
                'resources/js/dashboard.js',
                'resources/js/appointments.js',
                'resources/js/queue.js',
                'resources/js/patient-profile.js',
                'resources/js/billing.js',
                'resources/js/login.js'
            ],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
