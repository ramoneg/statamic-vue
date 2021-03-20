const mix = require("laravel-mix");
const webpack = require('webpack')

mix.alias({
    '@app': 'resources/js/',
})

mix.webpackConfig({
    plugins: [
        new webpack.DefinePlugin({
            __VUE_OPTIONS_API__: true,
            __VUE_PROD_DEVTOOLS__: false,
        }),
    ],
});

mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")]);
