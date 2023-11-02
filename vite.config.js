import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import inject from '@rollup/plugin-commonjs';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        inject({
            $: 'jquery',
            jQuery: 'jquery',
        }),
    ],
    resolve: {
        alias: {
            '~boxicons': path.resolve(__dirname, 'node_modules/boxicons'),
            '~jquery': path.resolve(__dirname, 'node_modules/jquery'),
            '~sweetalert2': path.resolve(__dirname, 'node_modules/sweetalert2'),
        }
    }
});
