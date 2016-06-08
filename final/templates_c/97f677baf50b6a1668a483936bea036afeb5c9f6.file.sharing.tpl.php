<?php /* Smarty version Smarty-3.1.15, created on 2016-06-03 17:04:53
         compiled from "C:\wamp\www\Overview\proto\templates\articles\sharing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2311757519894131ad9-06673305%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97f677baf50b6a1668a483936bea036afeb5c9f6' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\sharing.tpl',
      1 => 1464966286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2311757519894131ad9-06673305',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5751989414def1_63691308',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5751989414def1_63691308')) {function content_5751989414def1_63691308($_smarty_tpl) {?><div class="fb-share-button" data-href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
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
