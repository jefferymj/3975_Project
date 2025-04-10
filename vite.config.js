import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    server: {
        host: 'localhost',  // 👈 force IPv4 to avoid [::1]
        port: 5173          // default Vite port
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.tsx'], // use .tsx if you are using TypeScript
            refresh: true,
        }),
        react(), // 👈 required for React
    ],
});