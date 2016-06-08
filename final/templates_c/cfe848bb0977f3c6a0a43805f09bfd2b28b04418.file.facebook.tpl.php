<?php /* Smarty version Smarty-3.1.15, created on 2016-06-03 17:29:50
         compiled from "C:\wamp\www\Overview\proto\templates\articles\sharing\facebook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293785751a186a2c3d9-97333411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfe848bb0977f3c6a0a43805f09bfd2b28b04418' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\sharing\\facebook.tpl',
      1 => 1464967762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293785751a186a2c3d9-97333411',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5751a186ba7924_91229491',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'article' => 0,
    'articleImages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5751a186ba7924_91229491')) {function content_5751a186ba7924_91229491($_smarty_tpl) {?><div class="fb-share-button" data-href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
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
link: '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
',
picture: '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['articleImages']->value[0]['path'];?>
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
