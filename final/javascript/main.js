BASE_URL = '/~lbaw1566/final/';

/**
 * Manages the search bar and the sidebar toggle
 */

var categoryList;
var categoryListBase="";


function loadAllCategories(){

  $("#all-categories").empty();
  $("#all-categories").html(categoryListBase)
  if(typeof category_management !== 'undefined'){
      $("#category-edit-listing").empty();
  }

  $.getJSON(BASE_URL + "api/articles/get_categories.php", function(result){
      categoryList = result;
          $.each(result, function(key, category){
              var option = $('<li><a href="' + BASE_URL + 'pages/category.php?category=' + category['name'] + '">' + category['name'] + '</a></li>');
                           
              $("#all-categories").append(option);

              if(typeof category_management !== 'undefined'){
                  var option = $('<li id="category-' + category['id'] + '" data-id="' + category['id'] + '" class="category category-element button-link"><div class="media"><p>' + category['name'] + '</p></div></li>');

                  $("#category-edit-listing").append(option);
              }
          });
      if(typeof category_management !== 'undefined'){
          prepareListForSelection();
      }
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
    categoryListBase = $("#all-categories").html();
  	scrolling();
    loadAllCategories();
	  initMessageClosers();

    $('[data-toggle="tooltip"]').tooltip(); 
});