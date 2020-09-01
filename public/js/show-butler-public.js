(function($) {
    'use strict';

    $(document).ready(function() {

        let eventHandeler = (id, diff) => {
           
            $('#' + id).fadeIn().delay(diff * 1000).queue(function(next) {
                
                $('#' + id).hide();
                $('#' + id).hide("slow", function() {
                    alert("Animation complete.");
                });
            });
        };

        $('.showButlerEventHandeler').each(function() {
            const id = $(this).attr('id');
            const accessTime = $(this).data('accessTime');
            const currentTime = $(this).data('currentTime');
            const diff = accessTime - currentTime;
            if (diff > 0) {
                eventHandeler(id, diff);
            };
        });
    });

})(jQuery);