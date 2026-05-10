import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // Tambahkan baris ini

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/SweetAlert2.js'
            ],
            refresh: true, // Ini yang bikin auto-reload aktif
        }),
        tailwindcss(), // Panggil plugin di sini
    ],
});