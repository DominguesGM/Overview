<?php /* Smarty version Smarty-3.1.15, created on 2016-06-05 22:13:56
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\articles\sharing\twitter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5784575488041cb239-64879450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0cf2caee7343b34118663b55a8f46acd03542a4' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\articles\\sharing\\twitter.tpl',
      1 => 1465007457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5784575488041cb239-64879450',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_575488041f04d1_69703490',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575488041f04d1_69703490')) {function content_575488041f04d1_69703490($_smarty_tpl) {?><a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
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
