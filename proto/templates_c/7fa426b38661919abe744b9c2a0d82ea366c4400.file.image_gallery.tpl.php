<?php /* Smarty version Smarty-3.1.15, created on 2016-06-02 11:48:47
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\common\image_gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31465573450af09d059-72968851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fa426b38661919abe744b9c2a0d82ea366c4400' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\common\\image_gallery.tpl',
      1 => 1464860754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31465573450af09d059-72968851',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_573450af265896_97847364',
  'variables' => 
  array (
    'articleImages' => 0,
    'i' => 0,
    'article' => 0,
    'BASE_URL' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573450af265896_97847364')) {function content_573450af265896_97847364($_smarty_tpl) {?><div class="carousel slide article-slide" id="article-photo-carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner cont-slider">
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articleImages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
    <div class="item <?php if ($_smarty_tpl->tpl_vars['i']->value++==0) {?> active <?php }?>">
      <img alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['image']->value['path'];?>
">
    </div>
    <?php } ?>
  </div>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articleImages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['i']->value==0) {?>active<?php }?>" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
" data-target="#article-photo-carousel">
      <img alt="" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['image']->value['path'];?>
">
    </li>
    <?php } ?>
  </ol>
</div>
<?php }} ?>
