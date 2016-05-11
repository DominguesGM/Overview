function init(){
  tinymce.init({
    selector:'#content, #summary',
    paste_data_images: false,
    menubar: false
  });
}

$(document).ready(init);

