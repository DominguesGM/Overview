<?php /* Smarty version Smarty-3.1.15, created on 2016-05-12 11:45:18
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\articles\view_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26035573450aea87dc4-76291576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12c4e4026cfa1e65e3f3dde4e38e3828e246b83d' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\articles\\view_article.tpl',
      1 => 1463043667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26035573450aea87dc4-76291576',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
    'editPermission' => 0,
    'ID' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_573450aeccb6b3_38295319',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573450aeccb6b3_38295319')) {function content_573450aeccb6b3_38295319($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="blog-stripe">
                <div>
                    <input type="hidden" id="article-id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
                    <div class="page-header">
                        <h2><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>

                          <?php if ($_smarty_tpl->tpl_vars['editPermission']->value) {?>
                           <div class="small btn-simple pull-right text-muted" id="delete">
                             <span onclick="eliminate()" data-placement="bottom" data-toggle="tooltip" title="Eliminar" class="glyphicon glyphicon-trash"></span>
                           </div>
                           <div class="small btn-simple pull-right text-muted" id="edit">
                             <span onclick="edit()" data-placement="bottom" data-toggle="tooltip" title="Editar" class="glyphicon glyphicon-pencil">&nbsp</span>
                           </div>
                           <?php }?>
                        </h2>
                        <div id="article-score" class="article-score"><?php echo $_smarty_tpl->tpl_vars['article']->value['score'];?>
</div>
                        <div class="article-scoring">
                          <a onclick="upvoteArticle(<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
)"><i id="article-up-vote" class="<?php if ($_smarty_tpl->tpl_vars['article']->value['vote']=='down') {?> text-muted <?php }?> fa fa-arrow-up"></i></a>
                          <br>
                          <a onclick="downvoteArticle(<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
)"><i id="article-down-vote" class="<?php if ($_smarty_tpl->tpl_vars['article']->value['vote']=='up') {?> text-muted <?php }?>fa fa-arrow-down"></i></a>
                        </div>
                    </div>
                     <div class="auhtor">
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
                <?php echo $_smarty_tpl->getSubTemplate ('common/image_gallery.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <div class="article-body"><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</div>
            </div>
            <br>
            <!-- TODO implement report description -->
            <div class="report-article"><span data-placement="bottom" data-toggle="tooltip" title="Reportar artigo" class="report-article glyphicon glyphicon-flag"></span><a href="#" >Reportar artigo</a></div>
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

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/view_article.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
