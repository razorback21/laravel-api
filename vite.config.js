import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    server: {
        host: true,
        port: 5177,
        strictPort: true,
        origin: "http://localhost:5177",
        cors: true,
        hmr: {
            port: 5177,
            host: "localhost",
        },
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
