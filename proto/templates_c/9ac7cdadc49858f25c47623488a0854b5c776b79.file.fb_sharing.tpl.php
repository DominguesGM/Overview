<?php /* Smarty version Smarty-3.1.15, created on 2016-06-03 17:11:28
         compiled from "C:\wamp\www\Overview\proto\templates\articles\fb_sharing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2004157519e202f3177-51329856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ac7cdadc49858f25c47623488a0854b5c776b79' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\fb_sharing.tpl',
      1 => 1464966286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2004157519e202f3177-51329856',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57519e2055c705_95775259',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57519e2055c705_95775259')) {function content_57519e2055c705_95775259($_smarty_tpl) {?><div class="fb-share-button" data-href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" data-layout="button" data-mobile-iframe="true"></div>
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
name: '<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
',
link: ' http://www.hyperarts.com/',
picture: '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
',
caption: '<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
',
description: '<?php echo $_smarty_tpl->tpl_vars['article']->value['summary'];?>
',
message: ''
});
});
});
</script>
<?php }} ?>
