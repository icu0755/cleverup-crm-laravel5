var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.less('app.less');
    mix.scripts([
        '../bower/jquery/dist/jquery.js',
        '../bower/moment/moment.js',
        '../bower/fullcalendar/dist/fullcalendar.js',
        '../bower/datatables/media/js/jquery.dataTables.js',
        '../bower/jt.timepicker/jquery.timepicker.js',
        '../bower/datepair.js/dist/datepair.js',
        '../bower/datepair.js/dist/jquery.datepair.js',
    ], 'public/scripts/vendor.js');
    mix.scripts([
       '../bower/bootstrap/js/affix.js',
       '../bower/bootstrap/js/alert.js',
       '../bower/bootstrap/js/dropdown.js',
       '../bower/bootstrap/js/tooltip.js',
       '../bower/bootstrap/js/modal.js',
       '../bower/bootstrap/js/transition.js',
       '../bower/bootstrap/js/button.js',
       '../bower/bootstrap/js/popover.js',
       '../bower/bootstrap/js/carousel.js',
       '../bower/bootstrap/js/scrollspy.js',
       '../bower/bootstrap/js/collapse.js',
       '../bower/bootstrap/js/tab.js',
    ], 'public/scripts/plugins.js');
});
