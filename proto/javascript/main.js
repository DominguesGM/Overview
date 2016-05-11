BASE_URL = '/Overview/proto/';

$(document).ready(function() {
  initMessageClosers();
});

function initMessageClosers() {
  $('.close').click(function() {
    $(this).parent().fadeOut();
  });
}

