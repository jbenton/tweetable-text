jQuery(document).ready(function($){
  $(".tweetable").hover(
      function(){
            if ($(this).data('vis') != true) {
                    $(this).data('vis', true);
                    $(this).find('.sharebuttons').fadeIn(200);
            }
      },
      function(){
            if ($(this).data('vis') === true) {
                    $(this).find('.sharebuttons').clearQueue().delay(0).fadeOut(200);
                    $(this).data('vis', false);
                    $(this).data('leftSet', false);
            }
      });
});	