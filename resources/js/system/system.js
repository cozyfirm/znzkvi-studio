window.Popper = require('@popperjs/core');
require('../bootstrap');

/* jQuery */
window.$ = window.jQuery = require('jquery'); // Include jQuery
/* Require filters scripts */
require('../libraries/filters');
/* Delete item with pop-up */
require('../libraries/delete');


$(document).ready(function() {
    /*
     *  Datepicker function -- just add class name as .datepicker
     */

    require('../libraries/jquery-ui');
    $( function() {
        $( ".datepicker" ).datepicker({
            dateFormat: 'dd.mm.yy'
        });
    } );
});

// ** MQTT Library ** //
window.mqtt = require('../libraries/mqtt');
require('../layout/mqtt-init');

// ** Notify.js Library ** //
require('../libraries/notify-me');


/* Authentication script */
require('./pages/auth/auth');

// ** Select 2 ** //
require('../libraries/select-2');
$(document).ready(function() {
    $('.select-2').select2();
});
// // ** Filters.js ** //
// require('./template/filters');

// ** Menu JavaScript functions ** //
require('./menu');

// Require validator
window.validator = require('../layout/validation');

window.notify = require('../libraries/notify-me');
// Require submit
require('../layout/submit');

/* Quiz scripts */
require('./pages/quiz/questions');
require('./pages/quiz/demo/send-messages');

/* Global MQTT channel */
require('./live/global-channel');
require('./live/global-user-interactions');

/* Sponsors scripts */
require('./live/sponsors');
