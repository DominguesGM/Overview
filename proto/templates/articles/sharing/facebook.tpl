<div class="fb-share-button" data-href="{$BASE_URL}pages/articles/article.php?id={$article['id']}" data-layout="button" data-mobile-iframe="true"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(document).ready(function(){
$('#share_button').click(function(e){
e.preventDefault();
FB.ui(
{
method: 'feed',
name: '{$article.title}',
link: '{$BASE_URL}pages/articles/article.php?id={$article.id}',
picture: '{$BASE_URL}{$articleImages[0].path}',
caption: '{$article.title}',
description: '{$article.summary}',
message: ''
});
});
});
</script>
