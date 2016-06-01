<?php /* Smarty version Smarty-3.1.15, created on 2016-05-31 18:59:01
         compiled from "C:\wamp\www\Overview\proto\templates\articles\article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:615574ca54e08e325-65238273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68e72eb4976105edf25482f11d384cf5d5600f5a' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\article.tpl',
      1 => 1464713935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '615574ca54e08e325-65238273',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_574ca54e4ebc67_28144084',
  'variables' => 
  array (
    'article' => 0,
    'ID' => 0,
    'BASE_URL' => 0,
    'contributorAccess' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574ca54e4ebc67_28144084')) {function content_574ca54e4ebc67_28144084($_smarty_tpl) {?><div class="container">
  <div class="row">
    <div class="col-md-8 col-lg-8">
      <div class="blog-stripe">
        <div>
          <input type="hidden" id="article-id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
          <input type="hidden" id="user-id" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
">
          <div class="page-header">
            <h2><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h2>
            <h4><span class="glyphicon glyphicon-tag"></span><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/category.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['category']['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['article']->value['category']['name'];?>
 </a></h4>
            <div id="article-score" class="article-score"><?php echo $_smarty_tpl->tpl_vars['article']->value['score'];?>
 ponto<?php if ($_smarty_tpl->tpl_vars['article']->value['score']!=1&&$_smarty_tpl->tpl_vars['article']->value['score']!=-1) {?>s<?php }?></div>
          </div>
          <div class="auhtor">
            <input id="access-level" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['contributorAccess']->value;?>
">
            <em><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['last_name'];?>
</a></em>
            <span class="article-date">&nbsp<?php echo $_smarty_tpl->tpl_vars['article']->value['publication_date'];?>
</span>
          </div>
          <br>
          <div class="article-summary"><?php echo $_smarty_tpl->tpl_vars['article']->value['summary'];?>
</div>
        </div>
        <br>
        <?php echo $_smarty_tpl->getSubTemplate ('common/image_gallery.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="article-body"><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</div>
      </div>
      <br>
    </div>
  </div>

  <div class="row">
    <!-- Facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u=" title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>

    <!-- Twitter -->
    <a href="http://twitter.com/home?status=" title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>

    <!-- Google+ -->
    <a href="https://plus.google.com/share?url=" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
  </div>
  <?php $_smarty_tpl->tpl_vars['contributorAccess'] = new Smarty_variable(false, null, 0);?>
  <?php echo $_smarty_tpl->getSubTemplate ('articles/article_comments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/view_article.js"></script>
<?php }} ?>
