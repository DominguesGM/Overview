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
  $("#create-form #create-alert").find('span').html(errorMessage);
    $("#create-form #create-alert").toggle(true);
    window.scrollTo(0, 0);
    return false;
}

function checkArticle(){
  tinymce.triggerSave();

  if($('#category').val() === "---"){
    return warn("Selecione uma categoria."); 
  }

  if($('#summary').val() == ""){
   return warn("Insira um pequeno resumo da notícia."); 
  }

  if($('#content').val() == ""){
    return warn("Elabore o conteúdo da notícia.");
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