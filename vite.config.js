import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    root: resolve(__dirname, 'src'),
    build:
        {
            outDir: '../dist'
        },
        server:
            {
                port: 8080
            }
});
