(function ($) {
    'use strict';
    
    $('document').ready(function() {
        // console.log('document is ready');

        var table = $('.toggle-btn').find('.table');

        table.hide();

        $('.compl-task-btn').on('click', function(evt){
            evt.preventDefault();

            table.show();
        });
    });

}(jQuery));