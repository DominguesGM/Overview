<?php /* Smarty version Smarty-3.1.15, created on 2016-06-03 17:25:58
         compiled from "C:\wamp\www\Overview\proto\templates\articles\sharing\twitter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104515751a186cd9fb8-40898103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '457508c8a4422aebbc692f8f64eea403d10a78a3' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\sharing\\twitter.tpl',
      1 => 1464967003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104515751a186cd9fb8-40898103',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5751a186d4fa03_30414696',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5751a186d4fa03_30414696')) {function content_5751a186d4fa03_30414696($_smarty_tpl) {?><a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
">Tweet</a>
<script>
!function(d,s,id){
  var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
  if(!d.getElementById(id)){
    js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
    fjs.parentNode.insertBefore(js,fjs);
  }
}(document, 'script', 'twitter-wjs');
</script>
<?php }} ?>
