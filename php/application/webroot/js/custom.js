// Js for menu.
(function($) {

  $.fn.menumaker = function(options) {
      
      var cssmenu = $(this), settings = $.extend({
        title: "Menu",
        format: "dropdown",
        sticky: false
      }, options);

      return this.each(function() {
        cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
        $(this).find("#menu-button").on('click', function(){
          $(this).toggleClass('menu-opened');
          var mainmenu = $(this).next('ul');
          if (mainmenu.hasClass('open')) { 
            mainmenu.hide().removeClass('open');
          }
          else {
            mainmenu.show().addClass('open');
            if (settings.format === "dropdown") {
              mainmenu.find('ul').show();
            }
          }
        });

        cssmenu.find('li ul').parent().addClass('has-sub');

        multiTg = function() {
          cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
          cssmenu.find('.submenu-button').on('click', function() {
            $(this).toggleClass('submenu-opened');
            if ($(this).siblings('ul').hasClass('open')) {
              $(this).siblings('ul').removeClass('open').hide();
            }
            else {
              $(this).siblings('ul').addClass('open').show();
            }
          });
        };

        if (settings.format === 'multitoggle') multiTg();
        else cssmenu.addClass('dropdown');

        if (settings.sticky === true) cssmenu.css('position', 'fixed');

        resizeFix = function() {
          if ($( window ).width() > 768) {
            cssmenu.find('ul').show();
          }

          if ($(window).width() <= 768) {
            cssmenu.find('ul').hide().removeClass('open');
          }
        };
        resizeFix();
        return $(window).on('resize', resizeFix);

      });
  };
})(jQuery);

(function($){
$(document).ready(function(){

$(document).ready(function() {
  $("#cssmenu").menumaker({
    title: "Menu",
    format: "multitoggle"
  });

  $("#cssmenu").prepend("<div id='menu-line'></div>");

var foundActive = false, activeElement, linePosition = 0, menuLine = $("#cssmenu #menu-line"), lineWidth, defaultPosition, defaultWidth;

$("#cssmenu > ul > li").each(function() {
  if ($(this).hasClass('active')) {
    activeElement = $(this);
    foundActive = true;
  }
});

if (foundActive === false) {
  activeElement = $("#cssmenu > ul > li").first();
}

defaultWidth = lineWidth = activeElement.width();

defaultPosition = linePosition = activeElement.position().left;

menuLine.css("width", lineWidth);
menuLine.css("left", linePosition);

$("#cssmenu > ul > li").hover(function() {
  activeElement = $(this);
  lineWidth = activeElement.width();
  linePosition = activeElement.position().left;
  menuLine.css("width", lineWidth);
  menuLine.css("left", linePosition);
}, 
function() {
  menuLine.css("left", defaultPosition);
  menuLine.css("width", defaultWidth);
});

});


});
})(jQuery);

function rating(point){
	console.log(point);
	for ( i=0; i<=point; i++ ){
		$('#rating a:eq('+i+') i').addClass('fa-star');
		$('#rating a:eq('+i+') i').removeClass('fa-star-o');
	}
	for ( i=point+1; i<= 4; i++){
		$('#rating a:eq('+i+') i').addClass('fa-star-o');
		$('#rating a:eq('+i+') i').removeClass('fa-star');
	}
}


$(document).ready(function(){
	$('#rating a:eq(0)').mouseenter(function(){
		rating(0);
	});
	
	$('#rating a:eq(1)').mouseenter(function(){
		rating(1);
	});
	
	$('#rating a:eq(2)').mouseenter(function(){
		rating(2);
	});
	
	$('#rating a:eq(3)').mouseenter(function(){
		rating(3);
	});
	
	$('#rating a:eq(4)').mouseenter(function(){
		rating(4);
	});

	
//	$('#rating a:eq(0)').mouseenter(function(){
//		$('#rating a:eq(0) i').addClass('fa-star');
//		$('#rating a:eq(0) i').removeClass('fa-star-o');
//		$('#rating a:eq(1) i').addClass('fa-star-o');
//		$('#rating a:eq(1) i').removeClass('fa-star');
//		$('#rating a:eq(2) i').addClass('fa-star-o');
//		$('#rating a:eq(2) i').removeClass('fa-star');
//		$('#rating a:eq(3) i').addClass('fa-star-o');
//		$('#rating a:eq(3) i').removeClass('fa-star');
//		$('#rating a:eq(4) i').addClass('fa-star-o');
//		$('#rating a:eq(4) i').addClass('fa-star');
//		rating(0);
//	});
	
//	$('#rating a:eq(1)').mouseenter(function(){
//		rating(1);
//	});
});
