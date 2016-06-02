<?php /* Smarty version Smarty-3.1.15, created on 2016-06-02 04:01:57
         compiled from "C:\wamp\www\Overview\proto\templates\articles\view_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11407572b49bd710566-11169283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c224ebad81a3fe7e96512a49939cb8b7f216605b' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\view_article.tpl',
      1 => 1464832905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11407572b49bd710566-11169283',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572b49beccf1c7_80331502',
  'variables' => 
  array (
    'article' => 0,
    'ID' => 0,
    'editPermission' => 0,
    'contributorAccess' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572b49beccf1c7_80331502')) {function content_572b49beccf1c7_80331502($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="alert"></div>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-lg-8">
      <div class="blog-stripe">
        <div>
          <input type="hidden" id="article-id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
          <input type="hidden" id="author-id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>
">
          <input type="hidden" id="user-id" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
">
          <div class="page-header">
            <h2><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>

              <?php if ($_smarty_tpl->tpl_vars['editPermission']->value) {?>
              <div class="selectable small btn-simple pull-right text-muted" id="delete">
                <span onclick="eliminate()" data-placement="bottom" data-toggle="tooltip" title="Eliminar" class="glyphicon glyphicon-trash"></span>
              </div>
              <div class="selectable small btn-simple pull-right text-muted" id="edit">
                <span onclick="edit()" data-placement="bottom" data-toggle="tooltip" title="Editar" class="glyphicon glyphicon-pencil">&nbsp;</span>
              </div>
              <?php }?>
            </h2>
            <div id="article-score" class="article-score"><?php echo $_smarty_tpl->tpl_vars['article']->value['score'];?>
 ponto<?php if ($_smarty_tpl->tpl_vars['article']->value['score']!=1&&$_smarty_tpl->tpl_vars['article']->value['score']!=-1) {?>s<?php }?></div>
            <?php if ($_smarty_tpl->tpl_vars['contributorAccess']->value) {?>
            <div class="article-scoring">
              <a onclick="upvoteArticle(<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
)"><i id="article-up-vote" class="vote <?php if ($_smarty_tpl->tpl_vars['article']->value['vote']!='up') {?> text-muted <?php }?> fa fa-arrow-up"></i></a>
              <br>
              <a onclick="downvoteArticle(<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
)"><i id="article-down-vote" class="vote <?php if ($_smarty_tpl->tpl_vars['article']->value['vote']!='down') {?> text-muted <?php }?>fa fa-arrow-down"></i></a>
            </div>
            <?php }?>
          </div>
          <div class="auhtor">
            <input id="access-level" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['contributorAccess']->value;?>
">
            <em><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['last_name'];?>
</a></em>
            <span class="article-date">&nbsp;<?php echo $_smarty_tpl->tpl_vars['article']->value['publication_date'];?>
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
      <?php if ($_smarty_tpl->tpl_vars['contributorAccess']->value) {?>
      <div id="article-report">
        <?php if ($_smarty_tpl->tpl_vars['article']->value['report']) {?>
        <div class="pull-right text-muted"><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Artigo reportado</div>
        <?php } else { ?>
        <div class="selectable pull-right"><a data-id="article#<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" data-toggle="modal" data-target="#report-form"><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Reportar artigo</a></div>
        <?php }?>
      </div>
      <?php }?>

    </div>
    <?php echo $_smarty_tpl->getSubTemplate ('articles/related_articles.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  </div>

  <div class="row">
    <!-- Facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u=" title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>

    <!-- Twitter -->
    <a href="http://twitter.com/home?status=" title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>

    <!-- Google+ -->
    <a href="https://plus.google.com/share?url=" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
  </div>

  <?php echo $_smarty_tpl->getSubTemplate ('articles/article_comments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('articles/report.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/bootbox/bootbox.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/view_article.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
