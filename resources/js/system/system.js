window.Popper = require('@popperjs/core');
require('../bootstrap');

/* jQuery */
window.$ = window.jQuery = require('jquery'); // Include jQuery
/* Require filters scripts */
require('../libraries/filters');

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
require('../libraries/mqtt');
require('../layout/mqtt-init');

// ** Notify.js Library ** //
require('../libraries/notify-me');


/* Authentication script */
require('./pages/auth/auth');

// ** Select 2 ** //
require('../libraries/select-2');
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
