var elixir = require('laravel-elixir');
require('laravel-elixir-remove');

elixir(function (mix) {
    /**
     * Coleção de fontes utilizadas pelo projeto
     */
    mix.styles([
        './node_modules/font-awesome/css/font-awesome.css',
        './resources/fonts/feather/css/feather.css',
        './resources/fonts/icofont/css/icofont.css',
        './resources/fonts/ion-icon/css/ionicons.min.css',
        './resources/fonts/flag-icons/css/flag-icon.css',
    ], './public/module/shared/css/icons.css');

    /**
     * Scrits globais utilizados comumente em toda extenção do projeto interno
     */
    mix.styles([
        './public/module/shared/css/icons.css',
        './node_modules/bootstrap/dist/css/bootstrap.css',
        '../able-pro/waves/css/waves.min.css',
        '../able-pro/css/style.css',
    ], './public/module/shared/css/able.layout.interno.css');

    mix.scripts([
        './node_modules/jquery/dist/jquery.js',
        '../able-pro/bower_components/jquery-ui/js/jquery-ui.min.js',
        '../able-pro/bower_components/popper.js/js/popper.min.js',
        './node_modules/bootstrap/dist/js/bootstrap.js',
        '../able-pro/waves/js/waves.min.js',
        '../able-pro/bower_components/jquery-slimscroll/js/jquery.slimscroll.js',
        '../able-pro/js/pcoded.min.js',
        '../able-pro/js/vertical/vertical-layout.min.js',
        '../able-pro/js/script.min.js',
        '../modules/shared/js/fonteUpDown.js',
        '../modules/shared/js/geral.js',
    ], './public/module/shared/js/able.layout.interno.js');

    /**
     * Scrits globais utilizados comumente em toda extenção do projeto
     */
    mix.styles([
        './public/module/shared/css/icons.css',
        './node_modules/bootstrap/dist/css/bootstrap.css',
        '../able-pro/waves/css/waves.min.css',
        '../able-pro/css/style.css',
        '../modules/shared/css/externo.css',
    ], './public/module/shared/css/able.layout.externo.css');

    mix.scripts([
        './node_modules/jquery/dist/jquery.js',
        './node_modules/bootstrap/dist/js/bootstrap.js',
        '../able-pro/bower_components/jquery-ui/js/jquery-ui.min.js',
        '../able-pro/bower_components/popper.js/js/popper.min.js',
        '../able-pro/waves/js/waves.min.js',
        '../able-pro/bower_components/jquery-slimscroll/js/jquery.slimscroll.js',
        '../able-pro/js/pcoded.min.js',
        '../able-pro/js/vertical/horizontal-layout.min.js',
        '../able-pro/js/script.js',
        '../modules/shared/js/fonteUpDown.js',
    ], './public/module/shared/js/able.layout.externo.js');

    mix.styles([
        './node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
    ], './public/module/shared/css/datatable.css');

    mix.scripts([
        './node_modules/datatables.net/js/jquery.dataTables.js',
        './node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
        '../modules/shared/js/DataTables.js',
    ], './public/module/shared/js/datatable.js');

    mix.styles([
        '../able-pro/bower_components/select2/css/select2.min.css',
        '../able-pro/css/style.css',
        '../able-pro/css/select2-custom.css',
    ], './public/module/shared/css/select2.css');

    mix.scripts([
        '../able-pro/j-pro/js/jquery.ui.min.js',
        '../able-pro/j-pro/js/jquery.maskedinput.min.js',
        '../able-pro/bower_components/select2/js/select2.full.min.js',
        '../able-pro/advance-elements/select2-custom.js',
    ], './public/module/shared/js/select2.js');

    mix.scripts([
        '../modules/shared/js/Endereco.js',
    ], './public/module/shared/js/endereco.js');

    /**
     * Versionamento de todos os results.
     */
    mix.version([
        './public/module/shared/css/able.layout.interno.css',
        './public/module/shared/js/able.layout.interno.js',
        './public/module/shared/css/datatable.css',
        './public/module/shared/js/datatable.js',
        './public/module/shared/css/able.layout.externo.css',
        './public/module/shared/js/able.layout.externo.js',
        './public/module/shared/css/select2.css',
        './public/module/shared/js/select2.js',
        './public/module/shared/js/endereco.js',
    ]);


    /**
     * Versionamento de todos os results.
     */


    /**
     * Cópias de fontes, imagens e JSON.
     */
    mix.copy([
        './node_modules/font-awesome/fonts',
        'resources/fonts/feather/fonts',
        'resources/fonts/icofont/fonts',
        'resources/fonts/ion-icon/fonts',
        'resources/fonts/flag-icons/fonts',
    ], 'public/build/module/shared/fonts')
        .copy([
            './public/build/module/shared/fonts',
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


});

elixir(function (mix) {
    mix.remove([
        // './public/module/'
    ]);
});
