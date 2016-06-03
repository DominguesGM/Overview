<?php /* Smarty version Smarty-3.1.15, created on 2016-06-02 22:22:08
         compiled from "C:\wamp\www\Overview\proto\templates\users\articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197574f7a29075e33-59822517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cf8dc071b2d55a8e56af5c7f47d76f804e83ad4' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\users\\articles.tpl',
      1 => 1464862521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197574f7a29075e33-59822517',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_574f7a299ca9b5_62292277',
  'variables' => 
  array (
    'nArticles' => 0,
    'articles' => 0,
    'BASE_URL' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574f7a299ca9b5_62292277')) {function content_574f7a299ca9b5_62292277($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="glyphicon glyphicon-duplicate"></span> Artigos</h1>
      <h2 class="lead"><strong id="article-count"><?php echo $_smarty_tpl->tpl_vars['nArticles']->value;?>
</strong> <?php if ($_smarty_tpl->tpl_vars['nArticles']->value==1) {?> artigo <?php }?></h2>
    </hgroup>
  </div>

  <div id="article-tools" class="col-md-9"></div>

  <div class="tab-content col-md-12">
    <div id="articles" class="tab-pane fade in active">
      <div id="all-articles" class="col-md-3">
        <br>
        <div id="list-articles" class="nav nav-pills nav-stacked">
          <?php if (count($_smarty_tpl->tpl_vars['articles']->value)==0) {?> <li class="button-link" onclick="getArticles()">Nenhum artigo.</li><?php }?>
          <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>

            <div class="short_news_item">
              <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><h4><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h4></a>
              <span class="image-box" data-score="<?php echo $_smarty_tpl->tpl_vars['article']->value['score'];?>
"><img class="img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['article']->value['path'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
"></span>
              <p class="summary"><?php echo $_smarty_tpl->tpl_vars['article']->value['summary'];?>
</p>
            </div>

          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/slimScroll/jquery.slimscroll.min.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
