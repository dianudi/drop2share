import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import os from "node:os";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    server: {
        hmr: { host: os.hostname },
    },
});
