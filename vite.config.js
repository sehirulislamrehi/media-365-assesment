import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1',  // Or 'localhost'
        port: 5173,
        https: false,       // Reverb typically doesn't need local SSL, unless you've set it up manually
    },
});
