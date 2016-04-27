/**
 * Created by Gil on 11/03/2016.
 *
 * Manages the search bar and the sidebar toggle
 */

var searchbarHTML = "<span id='search-container'><input type='text' id='search-bar' /><i class='fa fa-times' id='search-close'></i></span>";
var searchbarTOGGLE = false;


$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$("#search-button").click(function(e){
    e.preventDefault();
    if(!searchbarTOGGLE) {
        $('body').append(searchbarHTML);
        $('#search-bar').focus();
        searchbarTOGGLE = true;
    }else {
        $('#search-container').remove();
        searchbarTOGGLE = false;
    }
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

