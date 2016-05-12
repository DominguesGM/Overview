/**
 * Created by Gil on 11/03/2016.
 *
 * Manages the search bar and the sidebar toggle
 */

var searchbarHTML = "<span id='search-container'><input type='text' id='search-bar' /><i class='fa fa-times' id='search-close'></i></span>";
var searchbarTOGGLE = false;

function loadAllCategories(){

  $.getJSON(BASE_URL + "api/articles/get_categories.php", function(result){
          $.each(result, function(key, category){
              var option = $('<li><a href="#' + category['id'] + '">' + category['name'] + '</a></li>');
                           
              $("#all-categories").append(option);
          });
      });
}

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    loadAllCategories();
});

