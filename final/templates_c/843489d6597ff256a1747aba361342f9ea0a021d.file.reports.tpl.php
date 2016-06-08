<?php /* Smarty version Smarty-3.1.15, created on 2016-06-02 03:12:41
         compiled from "C:\wamp\www\Overview\proto\templates\moderation\reports.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3093574bf8247de052-08716750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '843489d6597ff256a1747aba361342f9ea0a021d' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\moderation\\reports.tpl',
      1 => 1464808882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3093574bf8247de052-08716750',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_574bf8248cf760_41452005',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'nReports' => 0,
    'articleReports' => 0,
    'article' => 0,
    'commentReports' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574bf8248cf760_41452005')) {function content_574bf8248cf760_41452005($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- image_gallery CSS-->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/reports.css">

<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="glyphicon glyphicon-flag"></span> Itens reportados</h1>
      <h2 class="lead"><strong id="report-count"><?php echo $_smarty_tpl->tpl_vars['nReports']->value;?>
</strong> <?php if ($_smarty_tpl->tpl_vars['nReports']->value==1) {?> item foi reportado e requer<?php } else { ?> itens foram reportados e requerem<?php }?> revisão</h2>
    </hgroup>
  </div>

    <div class="all-reports tab-content col-md-3">
      <ul class="nav nav-pills btn-group pull-right">
        <li class="active"><a onclick="resetSelectedItem('article')" data-toggle="pill" href="#article-reports"><span class="glyphicon glyphicon-duplicate"></span> Artigos</a></li>
        <li><a onclick="resetSelectedItem('comment')" data-toggle="pill" href="#comment-reports"><span class="glyphicon glyphicon-comment"></span> Comentários</a></li>
      </ul>
    </div>

    <div id="moderator-tools" class="col-md-9"></div>

    <div class="tab-content col-md-12">
    <div id="article-reports" class="tab-pane fade in active">
      <div id="all-article-reports" sytle="overflow-y: auto;" class="h-scroll col-md-3">
        <br>
        <ul id="list-article-reports" class="nav nav-pills nav-stacked">
          <?php if (count($_smarty_tpl->tpl_vars['articleReports']->value)==0) {?> <li class="report button-link" onclick="getReports('article', true)">Nenhum artigo requer a atenção.</li><?php }?>
          <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articleReports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
          <li id="report-<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="report button-link" onclick="displayReport('article','<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
',<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
)">
            <div class="media">
              <p class="pull-right text-muted"><small><?php echo $_smarty_tpl->tpl_vars['article']->value['report_date'];?>
</small></p>
              <a class="media-left" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['reported_by'];?>
">
                <img class="img-circle" height="40" width="40" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['article']->value['reporter_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['reporter_first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['reporter_last_name'];?>
">
              </a>
              <span><h5 class="user_name"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['reported_by'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['reporter_first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['reporter_last_name'];?>
</a></h5></span>
              <p><?php echo $_smarty_tpl->tpl_vars['article']->value['description'];?>
</p>
              <div class="delete btn-simple pull-right text-muted">
                <small><span onclick="deleteReport(<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
)" data-placement="left" data-toggle="tooltip" title="Descartar" class="glyphicon glyphicon-remove"></span></small>
              </div>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>

      <section id="content-article" sytle="overflow: auto;" class="h-scroll col-md-9"></section>
    </div>


    <div id="comment-reports" class="tab-pane fade in">
      <div id="all-comment-reports" sytle="overflow-y: auto;" class="h-scroll col-md-3">
        <br>
        <ul id="list-comment-reports" class="nav nav-pills nav-stacked">
          <?php if (count($_smarty_tpl->tpl_vars['commentReports']->value)==0) {?> <li class="report button-link" onclick="getReports('comment', true)">Nenhum comentário requer a atenção.</li><?php }?>
          <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commentReports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
          <li id="report-<?php echo $_smarty_tpl->tpl_vars['comment']->value['id'];?>
" class="report button-link" onclick="displayReport('comment','<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
',<?php echo $_smarty_tpl->tpl_vars['comment']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['comment']->value['article_id'];?>
, <?php echo $_smarty_tpl->tpl_vars['comment']->value['comment_id'];?>
)">
            <div class="media">
              <p class="pull-right text-muted"><small><?php echo $_smarty_tpl->tpl_vars['comment']->value['report_date'];?>
</small></p>
              <a class="media-left" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['comment']->value['reported_by'];?>
">
                <img class="img-circle" height="40" width="40" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['comment']->value['reporter_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['comment']->value['reporter_first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['comment']->value['reporter_last_name'];?>
">
              </a>
              <span><h5 class="user_name"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['comment']->value['reported_by'];?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value['reporter_first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['comment']->value['reporter_last_name'];?>
</a></h5></span>
              <p><?php echo $_smarty_tpl->tpl_vars['comment']->value['description'];?>
</p>
              <div class="delete btn-simple pull-right text-muted">
                <small><span onclick="deleteReport(<?php echo $_smarty_tpl->tpl_vars['comment']->value['id'];?>
)" data-placement="left" data-toggle="tooltip" title="Descartar" class="glyphicon glyphicon-remove"></span></small>
              </div>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
      <section id="content-comment" sytle="overflow: auto;" class="h-scroll col-md-9"></section>
    </div>
  </div>
  </div>
  </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/reports.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/bootbox/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/slimScroll/jquery.slimscroll.min.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
