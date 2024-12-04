import vue from '@vitejs/plugin-vue'
import laravel from 'laravel-vite-plugin'
import path from 'path'
import { defineConfig } from 'vite'

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],

    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
            '@scss': path.resolve(__dirname, './resources/scss'),
        },
    },

    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `
                    @use "@scss/_variables.scss";
                `,
                api: 'modern-compiler',
            },
        },
    },
})
