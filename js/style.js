$(document).ready(function(){
      $('.slider').slider({full_width: true});
      $('.parallax').parallax();
      $('.slider').css('height','580px');
      $('.slides').css('height','580px');
      var height=$('._footer').height();
      $('._wrapper').css('margin-bottom',height);
});      