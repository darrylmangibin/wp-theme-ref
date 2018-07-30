function hamMenu(x) {
    x.classList.toggle("change");
}
jQuery(document).ready(function($){
	  $('.navbar-toggler').hover(function() {
    $('.bar2').css('width', '45px');
  }, function() {
   
    $('.bar2').css('width', '35px');
  });
});
