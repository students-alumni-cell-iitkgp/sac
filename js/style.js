$(document).ready(function(){
      $('.slider').slider({full_width: true});
      $('.parallax').parallax();
      $('.slider').css('height','460px');
      $('.slides').css('height','460px');
      //var height=$('._footer').height();
     // $('._wrapper').css('margin-bottom',height);
});
$('.button-collapse').sideNav({
          menuWidth: 300, // Default is 240
          edge: 'left', // Choose the horizontal origin
          closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
);