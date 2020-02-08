(function($) {
  $(document).ready(function() {
    $('#carousel-next').click(() => {
      $('.carousel').carousel('next');
    });

    $('#carousel-prev').click(() => {
      $('.carousel').carousel('prev');
    });
  });
})(jQuery);
