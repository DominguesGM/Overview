<?php /* Smarty version Smarty-3.1.15, created on 2016-05-05 12:25:44
         compiled from "C:\wamp\www\Overview\proto\templates\articles\small_image_gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:245515729d53f34b204-58171599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec0d174175f6e8febcb9fe0ff6c19a56868560da' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\small_image_gallery.tpl',
      1 => 1462443767,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245515729d53f34b204-58171599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5729d53f3c4fa6_73976781',
  'variables' => 
  array (
    'articleImages' => 0,
    'image' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5729d53f3c4fa6_73976781')) {function content_5729d53f3c4fa6_73976781($_smarty_tpl) {?><div class="row">
  <br>
</div>
<div class="row">
  <div id="article-images" class='list-group small_gallery'>

  <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articleImages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
    <div id="image-<?php echo $_smarty_tpl->tpl_vars['image']->value['id'];?>
" class='col-sm-4 col-xs-6 col-md-3 col-lg-4'>
      <div class='col-sm-9 col-xs-9 col-md-9 col-lg-9'>
      <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['image']->value['path'];?>
">
        <img class="img-responsive" alt="$image['path']" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['image']->value['path'];?>
" />
      </a>
    </div>
    <div class='col-sm-1 col-xs-1 col-md-1 col-lg-1'>
      <div class="btn-simple pull-right text-muted">
         <span onclick="deleteImage(<?php echo $_smarty_tpl->tpl_vars['image']->value['id'];?>
)" data-placement="bottom" data-toggle="tooltip" title="Eliminar imagem" class="glyphicon glyphicon-trash"></span>
       </div>
    </div>
    </div> <!-- col-6 / end -->
    <?php } ?>

    </div> <!-- list-group / end -->
</div>

<script type="text/javascript">
  $(".fancybox").fancybox({
      helpers : {
          overlay : {
              css : {
                  'background' : 'rgba(58, 42, 45, 0.95)'
              }
          }
      }
    });
</script>
<?php }} ?>
