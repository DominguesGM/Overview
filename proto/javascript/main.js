BASE_URL = '/Overview/proto/';

/**
 * Manages the search bar and the sidebar toggle
 */

var searchbarHTML = "<span id='search-container'><input type='text' id='search-bar' /><i class='fa fa-times' id='search-close'></i></span>";
var searchbarTOGGLE = false;

function loadAllCategories(){

  $.getJSON(BASE_URL + "api/articles/get_categories.php", function(result){
          $.each(result, function(key, category){
              var option = $('<li><a href="' + BASE_URL + 'pages/category.php?category=' + category['name'] + '">' + category['name'] + '</a></li>');
                           
              $("#all-categories").append(option);
          });
      });
}

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(document).ready(function() {
  initMessageClosers();
});

function initMessageClosers() {
  $('.close').click(function() {
    $(this).parent().fadeOut();
  });
}

function scrollToTop() {
  verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
  element = $('body');
  offset = element.offset();
  offsetTop = offset.top;
  $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

function scrolling(){
$(function(){
 
    $(document).on( 'scroll', function(){
 
      if ($(window).scrollTop() > 100) {
      $('.scroll-top-wrapper').addClass('show');
    } else {
      $('.scroll-top-wrapper').removeClass('show');
    }
  });
 
  $('.scroll-top-wrapper').on('click', scrollToTop);
});
}

$(document).ready(function(){
  	scrolling();
    loadAllCategories();
	  initMessageClosers();

    $('[data-toggle="tooltip"]').tooltip(); 
});