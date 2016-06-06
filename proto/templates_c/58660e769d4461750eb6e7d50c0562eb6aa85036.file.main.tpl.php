<?php /* Smarty version Smarty-3.1.15, created on 2016-06-05 11:32:26
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113285721e885438035-29998333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58660e769d4461750eb6e7d50c0562eb6aa85036' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\main.tpl',
      1 => 1465119129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113285721e885438035-29998333',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5721e88559ef05_93333206',
  'variables' => 
  array (
    'categoriesByLine' => 0,
    'articlesByCategory' => 0,
    'BASE_URL' => 0,
    'categoryId' => 0,
    'categories' => 0,
    'category' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5721e88559ef05_93333206')) {function content_5721e88559ef05_93333206($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php $_smarty_tpl->tpl_vars["categoryId"] = new Smarty_variable(0, null, 0);?>
    <!-- Category Row generator -->
    <?php  $_smarty_tpl->tpl_vars['articlesByCategory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['articlesByCategory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoriesByLine']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['articlesByCategory']->key => $_smarty_tpl->tpl_vars['articlesByCategory']->value) {
$_smarty_tpl->tpl_vars['articlesByCategory']->_loop = true;
?>
        <!-- Category display -->
        <div class="row news-row">
        <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articlesByCategory']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
            <!-- Category Display -->
            <div class="col-md-4 portfolio-item short_category_item">
                <h2 class="main_category"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/category.php?category=<?php echo $_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['categoryId']->value]['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['categoryId']->value]['name'];?>
</a></h2>
                <?php $_smarty_tpl->tpl_vars["categoryId"] = new Smarty_variable($_smarty_tpl->tpl_vars['categoryId']->value+1, null, 0);?>
                <div class="short_category_content">
                    <?php if (count($_smarty_tpl->tpl_vars['category']->value)>0) {?>
                        <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
                            <!-- Article Display -->
                            <div class="short_news_item">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
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
                    <?php } else { ?>
                        <p>Ainda não existem notícias nesta categoría.</p>
                    <?php }?>
                </div>
            </div>
        <?php } ?>
        </div>
    <?php } ?>



<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
