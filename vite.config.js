import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    server: {
        host: "127.0.0.1",
        port: 3000,
        hmr: {
            host: "127.0.0.1",
        },
    },
    plugins: [
        laravel({
            input: [
                "resources/scss/app.scss",
                "resources/scss/admin/style.scss",
                "resources/scss/admin/table.scss",
                "resources/scss/admin/theme.scss",
                "resources/scss/frontend/styles.scss",
                "resources/scss/frontend/home.scss",
                "resources/scss/frontend/about.scss",
                "resources/scss/frontend/ourTeam.scss",
                "resources/scss/frontend/single_team.scss",
                "resources/scss/frontend/our_service.scss",
                "resources/scss/frontend/contact.scss",
                "resources/scss/frontend/faq.scss",
                "resources/scss/frontend/single_blog.scss",
                "resources/scss/frontend/country.scss",
                "resources/scss/frontend/visa.scss",
                "resources/scss/frontend/blog_list.scss",
                "resources/scss/frontend/apply.scss",
                "resources/scss/frontend/responsive.scss",
                "resources/scss/frontend/helper.scss",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
