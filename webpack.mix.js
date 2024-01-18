const mix = require("laravel-mix");

mix.options({
    terser: {
        terserOptions: {
            compress: {
                drop_console: true,
            },
        },
    },
})
    .setPublicPath("resources/dist")
    .sass("resources/css/app.scss", "resources/dist")
    .version();

mix.disableSuccessNotifications();
