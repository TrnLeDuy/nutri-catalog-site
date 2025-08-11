let mix = require('laravel-mix');
mix.disableNotifications();

const themeInfo = require('./theme.json');

if (mix.inProduction()) {
    mix.version();
    const pathAssetCompile = "./assets/";
    mix.setPublicPath(pathAssetCompile);
    mix.sass('resources/sass/main.scss', '/css/main.css');
    mix.css('resources/css/skin/skin-4.css', '/css/skin/skin-4.css');
    mix.css('resources/css/style.css', '/css/style.css');
    mix.js('resources/js/app.js', '/app').vue({ version: 2 });
    mix.scripts(['resources/js/script.js'], pathAssetCompile + '/js/script.js');
    mix.copy('resources/fonts', pathAssetCompile + '/fonts');
    mix.copy('resources/images', pathAssetCompile + '/images');
    mix.copy('resources/js/template-js', pathAssetCompile + '/js/template-js');

    // **Thêm đoạn này để copy toàn bộ thư mục CSS**
    mix.copyDirectory('resources/css', pathAssetCompile + '/css');
} else {
    const pathPublicTheme = 'public/themes/' + themeInfo.name.toLowerCase();
    mix.sourceMaps();
    // Compile SASS
    mix.setPublicPath('../../').sass('resources/sass/main.scss', pathPublicTheme + '/css/main.css');

    // Gộp và xử lý file CSS
    mix.css('resources/css/skin/skin-4.css', pathPublicTheme + '/css/skin-4.css');
    mix.css('resources/css/style.css', pathPublicTheme + '/css/style.css');
    // JavaScript
    mix.js('resources/js/app.js', pathPublicTheme + '/app').vue({ version: 2 });
    mix.scripts(['resources/js/script.js'], "../../" + pathPublicTheme + '/js/script.js');

    // Copy các file/directory
    mix.copy('resources/fonts', "../../" + pathPublicTheme + '/fonts');
    mix.copy('resources/images', "../../" + pathPublicTheme + '/images');
    mix.copy('resources/js/template-js', "../../" + pathPublicTheme + '/js/template-js');

    // **Thêm đoạn này để copy toàn bộ thư mục CSS**
    mix.copyDirectory('resources/css', "../../" + pathPublicTheme + '/css');
}
