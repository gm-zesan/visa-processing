import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/scss/admin/style.scss',
                'resources/scss/admin/table.scss',
                'resources/scss/admin/theme.scss',
                'resources/scss/frontend/styles.scss',
                'resources/scss/frontend/home.scss',
                'resources/scss/frontend/about.scss',
                'resources/scss/frontend/ourTeam.scss',
                'resources/scss/frontend/single_team.scss',
                'resources/scss/frontend/our_service.scss',
                'resources/scss/frontend/contact.scss',
                'resources/scss/frontend/faq.scss',
                'resources/scss/frontend/single_list.scss',
                'resources/scss/frontend/single_blog.scss',
                'resources/scss/frontend/country.scss',
                'resources/scss/frontend/visa.scss',
                'resources/scss/frontend/blog_list.scss',
                'resources/scss/frontend/privacy.scss',
                'resources/scss/frontend/termsofuse.scss',
                'resources/scss/frontend/cookie.scss',
                'resources/scss/frontend/helpcenter.scss',
                'resources/scss/frontend/responsive.scss',
                'resources/scss/frontend/helper.scss',
                // dark mode
                'resources/scss/frontend/styles-dark.scss',
                'resources/scss/frontend/about-dark.scss',
                'resources/scss/frontend/contact-dark.scss',
                'resources/scss/frontend/our_service-dark.scss',
                'resources/scss/frontend/single_team-dark.scss',
                'resources/scss/frontend/country-dark.scss',
                'resources/scss/frontend/single_blog-dark.scss',
                'resources/scss/frontend/faq-dark.scss',
                'resources/scss/frontend/helpcenter-dark.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
