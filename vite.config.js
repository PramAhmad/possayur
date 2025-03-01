import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.scss",
                "resources/css/plugins/select2.min.css",
                "resources/js/Select2.min.js",
                "resources/js/custom/store.js",
                "resources/js/main.js",
                "resources/js/app.js",
                "resources/js/qz.io/promise-polyfill-8.1.3.min.js",
                "resources/js/qz.io/qz-tray.js",
            ],
            refresh: true,
        }),
    ],
});
