(function ($, Drupal) {
  Drupal.behaviors.codesnippet = {
    attach: function () {
      $('pre code').each(function(i, e) {hljs.highlightBlock(e)});
    }
  }
})(jQuery, Drupal);