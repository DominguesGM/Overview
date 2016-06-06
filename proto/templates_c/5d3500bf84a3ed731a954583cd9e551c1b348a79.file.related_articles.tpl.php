<?php /* Smarty version Smarty-3.1.15, created on 2016-06-05 22:13:55
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\articles\related_articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:878573450af443bc8-53385267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d3500bf84a3ed731a954583cd9e551c1b348a79' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\articles\\related_articles.tpl',
      1 => 1465007457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '878573450af443bc8-53385267',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_573450af54b909_75046163',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'article' => 0,
    'relatedArticles' => 0,
    'relatedArticle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573450af54b909_75046163')) {function content_573450af54b909_75046163($_smarty_tpl) {?><div class="col-md-4 col-lg-4">
  <div class="page-header">
    <h3><span class="glyphicon glyphicon-tag"></span>
      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/category.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['category']['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['category']['name'];?>
 </a>
    </h3>
  </div>

  <ul class="all-blogs">
    <?php  $_smarty_tpl->tpl_vars['relatedArticle'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['relatedArticle']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['relatedArticles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['relatedArticle']->key => $_smarty_tpl->tpl_vars['relatedArticle']->value) {
$_smarty_tpl->tpl_vars['relatedArticle']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['relatedArticle']->value['article_id']!=$_smarty_tpl->tpl_vars['article']->value['id']) {?>
    <li class="media">
      <a class="pull-left" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/article.php?id=<?php echo $_smarty_tpl->tpl_vars['relatedArticle']->value['article_id'];?>
">
        <img alt="<?php echo $_smarty_tpl->tpl_vars['relatedArticle']->value['title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['relatedArticle']->value['path'];?>
" width="100" height="100">
      </a>
      <div class="media-body">
        <h4 class="media-heading"><a class="pull-left" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/article.php?id=<?php echo $_smarty_tpl->tpl_vars['relatedArticle']->value['article_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['relatedArticle']->value['title'];?>
</a></h4>
        <div class="auhtor">
          <em><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['relatedArticle']->value['author'];?>
"><?php echo $_smarty_tpl->tpl_vars['relatedArticle']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['relatedArticle']->value['last_name'];?>
</a></em>
          <span class="article-date">&nbsp;<?php echo $_smarty_tpl->tpl_vars['relatedArticle']->value['date'];?>
</span>
        </div>
      </div>
    </li>
    <?php }?>
    <?php } ?>
  </ul>
</div>
<?php }} ?>
