<?php /* Smarty version Smarty-3.1.15, created on 2016-06-03 17:16:45
         compiled from "C:\wamp\www\Overview\proto\templates\articles\twt_sharing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2370257519f35dbf237-46265588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ce1a8e2c7e1b102efa4d2af09dddbcf0bd2a0c1' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\twt_sharing.tpl',
      1 => 1464967003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2370257519f35dbf237-46265588',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57519f35e74ca0_48291509',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57519f35e74ca0_48291509')) {function content_57519f35e74ca0_48291509($_smarty_tpl) {?><a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
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
