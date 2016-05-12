function loadArticleCategories(){
  $.getJSON(BASE_URL + "api/articles/get_categories.php", function(result){
          $.each(result, function(key, category){
              var option = $("<option></option>");
              option.text(category['name']);
              option.val(category['id']);
           
              $("#category").append(option);
          });
      });
}

function warn(errorMessage){
  $("#create-form #create-alert").html("<div \" class=\"alert alert-danger\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>"
      + errorMessage + "</div>");

  window.scrollTo(0, 0);
  return false;
}

function strip(html){
   var tmp = document.implementation.createHTMLDocument("HTMLTemp").body;
   tmp.innerHTML = html;
   return tmp.textContent || tmp.innerText || "";
}

function checkArticle(){
  tinymce.triggerSave();

  if($('#title').val() == ""){
    return warn("Introduza um título para a notícia."); 
  }

  if($('#category').val() === "---"){
    return warn("Selecione a categoria da notícia."); 
  }

  if(strip($('#summary').val()).trim() == ""){
   return warn("Insira um pequeno resumo da notícia."); 
  }

  if(strip($('#content').val()).trim() == ""){
    return warn("Elabore o conteúdo da notícia.");
  }

  var inp = document.getElementById('images-upload');
  if(inp.files.length <= 0){
   return warn("O artigo deve ter no mínimo uma imagem.");
  }

  return true;
}

function save(){
  if(checkArticle()){
  	document.getElementById("create-form").submit();
    return true;
  }else{
    return false;
  }
}

function discard(){
  window.location.replace(BASE_URL);
  return false;
}

function main(){
  loadArticleCategories();
};

$(document).ready(main);