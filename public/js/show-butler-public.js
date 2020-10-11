(function ($) {
  "use strict";

  $(document).ready(function () {
    // Hide Event Handeller
    let hideEventTrigger = (id) => {
      const target = $("#" + id);
      // const accessTime = target.data('accessTime');
      const currentTime = target.data("currentTime");
      const hideTime = target.data("hideTime");
      const diff = hideTime - currentTime;

      $("#" + id)
        .fadeIn()
        .delay(diff * 1000)
        .queue(function (next) {
          $("#" + id).hide();
          $("#" + id).hide("slow", function () {
            // console.log(id, "a>>>Animation complete. hhhhhhhhhhhh");
          });
        });
    };

    // Show event Handeller
    let showEventHandeler = (id, diff) => {
      setTimeout(() => {
        $("#" + id).show("slow", function () {
          hideEventTrigger(id);
        });
      }, diff * 1000);
    };

    // Hide Event Handeller
    let eventHandeler = (id, diff) => {
      $("#" + id)
        .fadeIn()
        .delay(diff * 1000)
        .queue(function (next) {
          $("#" + id).hide();
          $("#" + id).hide("slow", function () {
            // console.log(id, "Animation complete. hhhhhhhhhhhh");
          });
        });
    };

    // All Events Triggers
    $(".showButlerEventHandeler").each(function () {
      const id = $(this).attr("id");
      const accessTime = $(this).data("accessTime");
      const currentTime = $(this).data("currentTime");
      const hideTime = $(this).data("hideTime");
      const diff = accessTime - currentTime;
      if (accessTime <= currentTime && currentTime <= hideTime) {
        eventHandeler(id, hideTime - currentTime);
      } else {
        showEventHandeler(id, accessTime - currentTime);
      }
    });
  });
})(jQuery);
