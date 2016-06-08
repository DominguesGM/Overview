function init(){
  tinymce.init({
    selector:'#content',
    paste_data_images: false,
    menubar: false
  });
}

$(document).ready(init);

