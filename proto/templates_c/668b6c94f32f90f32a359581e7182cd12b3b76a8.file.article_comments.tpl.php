<?php /* Smarty version Smarty-3.1.15, created on 2016-05-12 21:44:20
         compiled from "C:\wamp\www\Overview\proto\templates\articles\article_comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10004572baa6f6ea626-33934860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '668b6c94f32f90f32a359581e7182cd12b3b76a8' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\article_comments.tpl',
      1 => 1463082257,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10004572baa6f6ea626-33934860',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572baa6fa20b81_77908817',
  'variables' => 
  array (
    'ID' => 0,
    'article' => 0,
    'PICTURE' => 0,
    'articleComments' => 0,
    'comment' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572baa6fa20b81_77908817')) {function content_572baa6fa20b81_77908817($_smarty_tpl) {?><div class="row">
    <div class="col-md-8">
        <div class="page-header">
            <h3><span class="glyphicon glyphicon-comment"></span> Comentários </h3>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['ID']->value) {?>
          <div class="well">
                  <h4>Deixe um comentário:</h4>
                      <div class="form-group">
                        <textarea id="new-comment" style="overflow:auto;resize:vertical" class="form-control" name="comment" rows="2" ></textarea>
                      </div>
                      <button type="button" onclick="postComment(<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['article']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['last_name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['PICTURE']->value;?>
');" class="btn btn-primary">Enviar</button>
            </div>
        <hr>
        <?php }?>
        <div id="comments-list" class="comments-list">
            <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articleComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>

            <div class="media comment">
                <p class="pull-right"><small><?php echo $_smarty_tpl->tpl_vars['comment']->value['comment_date'];?>
</small></p>
                <div class="comment-vote"><a href="#"><i class="fa fa-arrow-up"></i></a><br><a href="#"><i class="fa fa-arrow-down"></i></a></div>
                <a class="media-left" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['comment']->value['posted_by'];?>
">
                    <img class="img-circle comment-user-picture" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['comment']->value['path'];?>
">
                </a>
                <div class="media-body">
                    <h4 class="media-heading user_name"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['comment']->value['posted_by'];?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['comment']->value['last_name'];?>
</a></h4>
                    <?php echo $_smarty_tpl->tpl_vars['comment']->value['content'];?>

                    <p><small><?php echo $_smarty_tpl->tpl_vars['comment']->value['score'];?>
 ponto<?php if ($_smarty_tpl->tpl_vars['comment']->value['score']!=1) {?>s<?php }?> </small></p>
                    <div class="report-comment"><small><a data-id="comment#<?php echo $_smarty_tpl->tpl_vars['comment']->value['id'];?>
" data-toggle="modal" data-target="#report-form"><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Reportar comentário</a></small></div>
                </div>
            </div>

            <?php } ?>
        </div>
  </div>
</div>
<?php }} ?>
