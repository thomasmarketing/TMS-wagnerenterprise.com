//Add Class based on Touch or NonTouch Device
if ("ontouchstart" in document.documentElement) {
  $('body').addClass('touch');
}
else {
  $('body').addClass('no-touch');
}  

//Responsive WP Images
$(document).ready(function($){
    $('.entry img').each(function(){ 
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    });

  $('.wp-caption').each(function(){ 
      $(this).css("width", "100%");
  });
 
});

//Remove Empty WP <p></p> tags
$('p').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
});



//Smooth Scroll
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


//Parallax (Data Speed)
$('#business, section#headerimg').each(function(){ 
    var $obj = $(this); 

    if ( $(window).width() > 1200 ) {
    $(window).scroll(function() { 
      var yPos = -($(window).scrollTop() / $obj.data('speed')); 
      var bgpos = '50% '+ yPos + 'px'; 
      $obj.css('background-position', bgpos ); 
    }); 
  }
  });


$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});

//Initialize Mean Menu Mobile Menu
jQuery(document).ready(function () {
    jQuery('aside#navsidebar nav').meanmenu();
});


//Prepend Search Box to Top of Mobile Menu
$(document).ready(function(){
    $('.mean-container .mean-nav ul').find('li.menu-item-search').prependTo('.mean-container .mean-nav ul');
});


$('header#mobile .socialmobile').appendTo('.menu-primary-container ul#menu-primary');
$( '.socialmobile' ).wrap( "<li class='menu-item-social'></li>" );
