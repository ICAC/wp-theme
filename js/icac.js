'use strict';

(function($) {

$(function() {
  $("[icac-toggle]").each(function() {
    var $this = $(this);
    
    var targetSelector = $this.attr('icac-toggle');
    var $target = $(targetSelector);
    
    $this.on('click', function() {
      $target.slideToggle();
    });
  });
});

})(jQuery);