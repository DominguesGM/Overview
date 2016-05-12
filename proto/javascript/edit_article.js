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
  $("#edit-form #edit-alert").html("<div \" class=\"alert alert-danger\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>"
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
}

function eliminate(){
	var articleId = $('#article-id').val();
  if(articleId == undefined){
      return;
  }

 	$.ajax({
      type: "post",
      url: "../../api/articles/delete_article.php",
      datatype: "json",
      data: JSON.stringify({'id': articleId})
    }).done(function(html){
      var json = JSON.parse(html);
      if("success" in json){
        window.location.replace(BASE_URL);
      }else if("error" in json){
        warn(json['error']);
      }
    });
}

function main(){
  countImages();
}

$(document).ready(main);
