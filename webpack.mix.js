const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/assets/filepond/filepond.css',
    'resources/assets/filepond/custom.css',
], 'public/vendor/filepond/css.css');

mix.scripts([
    'resources/assets/filepond/filepond.min.js',
    'resources/assets/filepond/filepond.jquery.js',
    'resources/assets/filepond/filepond-plugin-file-validate-size.js',
    'resources/assets/filepond/filepond-plugin-file-validate-type.js',
    'resources/assets/filepond/custom.js',
], 'public/vendor/filepond/js.js');

mix.styles([
    'node_modules/font-awesome/css/font-awesome.css',
    'resources/fonts/feather/css/feather.css',
    'resources/fonts/icofont/css/icofont.css',
    'resources/fonts/ion-icon/css/ionicons.min.css',
    'resources/fonts/flag-icons/css/flag-icon.css'
], 'public/module/shared/css/icons.css');

/**
 * Scrits globais utilizados comumente em toda extenção do projeto interno
 */
mix.styles([
    'public/module/shared/css/icons.css',
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'resources/assets/able-pro/waves/css/waves.min.css',
    'resources/assets/able-pro/css/style.css'
], 'public/module/shared/css/able.layout.interno.css');

mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'resources/assets/able-pro/bower_components/jquery-ui/js/jquery-ui.min.js',
    'resources/assets/able-pro/bower_components/popper.js/js/popper.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'resources/assets/able-pro/waves/js/waves.min.js',
    'resources/assets/able-pro/bower_components/jquery-slimscroll/js/jquery.slimscroll.js',
    'resources/assets/able-pro/js/pcoded.min.js',
    'resources/assets/able-pro/js/vertical/vertical-layout.min.js',
    'resources/assets/able-pro/js/script.min.js',
    'resources/assets/modules/shared/js/fonteUpDown.js',
    'resources/assets/modules/shared/js/geral.js',
], 'public/module/shared/js/able.layout.interno.js');

/**
 * Scrits globais utilizados comumente em toda extenção do projeto
 */
mix.styles([
    'public/module/shared/css/icons.css',
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'resources/assets/able-pro/waves/css/waves.min.css',
    'resources/assets/able-pro/css/style.css',
    'resources/assets/modules/shared/css/externo.css',
], 'public/module/shared/css/able.layout.externo.css');

mix.scripts([
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'resources/assets/able-pro/waves/js/waves.min.js',
    'resources/assets/able-pro/js/pcoded.min.js',
    'resources/assets/able-pro/js/vertical/horizontal-layout.min.js',
    'resources/assets/able-pro/js/script.js',
    'resources/assets/modules/shared/js/fonteUpDown.js',
], 'public/module/shared/js/able.layout.externo.js');

mix.styles([
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
], 'public/vendor/mocsolucoes/core/css/datatable.css');

mix.scripts([
    'node_modules/datatables.net/js/jquery.dataTables.js',
    'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
    'resources/assets/modules/shared/js/DataTables.js',
], 'public/vendor/mocsolucoes/core/js/datatable.js');

mix.styles([
    'resources/assets/able-pro/bower_components/select2/css/select2.min.css',
    'resources/assets/able-pro/css/style.css',
    'resources/assets/able-pro/css/select2-custom.css',
], 'public/module/shared/css/select2.css');

mix.scripts([
    'resources/assets/able-pro/j-pro/js/jquery.ui.min.js',
    'resources/assets/able-pro/j-pro/js/jquery.maskedinput.min.js',
    'resources/assets/able-pro/bower_components/select2/js/select2.full.min.js',
    'resources/assets/able-pro/advance-elements/select2-custom.js',
], 'public/module/shared/js/select2.js');

mix.scripts([
    'resources/assets/modules/shared/js/Endereco.js',
], 'public/module/shared/js/endereco.js');
mix
    .setPublicPath('./public');
/**
 * Versionamento de todos os results.
 */
mix.version([
    'public/module/shared/css/able.layout.interno.css',
    'public/module/shared/js/able.layout.interno.js',
    'public/vendor/mocsolucoes/core/css/datatable.css',
    'public/vendor/mocsolucoes/core/js/datatable.js',
    'public/module/shared/css/able.layout.externo.css',
    'public/module/shared/js/able.layout.externo.js',
    'public/module/shared/css/select2.css',
    'public/module/shared/js/select2.js',
    'public/module/shared/js/endereco.js',
]).setPublicPath('./');

/**
 * Cópias de fontes, imagens e JSON.
 */
mix.copy([
    'node_modules/font-awesome/fonts',
    'resources/fonts/feather/fonts',
    'resources/fonts/icofont/fonts',
    'resources/fonts/ion-icon/fonts',
    'resources/fonts/flag-icons/fonts',
], 'public/build/module/shared/fonts')
    .copy([
        'public/build/module/shared/fonts',
    ], 'public/module/shared/fonts')
    .copy([
        'resources/images',
    ], 'public/images')
    .copy([
        'resources/json',
    ], 'public/json')
    .copy([
        'resources/email',
    ], 'public/email')
    .copy([
        'resources/svg',
    ], 'public/svg')
    .copy([
        'resources/favicon.ico',
    ], 'public/favicon.ico');

