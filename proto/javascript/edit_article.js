var imagesToDelete = [];
var nImages = 0;

function countImages(){
	nImages = $("#edit-form #article-images > div").length;
	console.log(nImages);
}

function deleteImage(id){
  imagesToDelete.push({'id': id});
  $("#edit-form #article-images #image-" +id).remove();
}

function warn(errorMessage){
	$("#edit-form #edit-alert").find('span').html(errorMessage);
    $("#edit-form #edit-alert").toggle(true);
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

  var nImagesTemp = nImages;
  var inp = document.getElementById('images-upload');
  nImagesTemp += inp.files.length;
  nImagesTemp -= imagesToDelete.length;

  if(nImagesTemp <= 0){
   return warn("O artigo deve ter no mínimo uma imagem.");
  }

  return true;
}

function save(){
	
  if(checkArticle()){
  	$.ajax({
        type: "post",
        url: "../../api/images/delete_images.php",
        datatype: "json",
        data: JSON.stringify({'images': imagesToDelete})
      }).done(function(html){
      	console.log(html);
        var json = JSON.parse(html);
        if("success" in json){
  			document.getElementById("edit-form").submit();
  			return true;
        }
      });
  }
   
  return false;
}

function discard(){
  window.location.replace(BASE_URL);
  return false;
}

function eliminate(){
	var articleId = $('#article-id').val();

  	$.ajax({
        type: "get",
        url: "../../api/delete_article.php",
        datatype: "json",
        data: JSON.stringify({'id': articleId})
      }).done(function(html){
        var json = JSON.parse(html);
        if("success" in json){
          window.location.replace(BASE_URL);
        }
      });
}

function main(){
  countImages();
}

$(document).ready(main);
