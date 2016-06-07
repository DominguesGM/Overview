<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 03:10:56
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\users\profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2790157561f203dc3d7-19931771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9996cd402ec1663403e8891201381830bcfac961' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\users\\profile.tpl',
      1 => 1465261818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2790157561f203dc3d7-19931771',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'ID' => 0,
    'user' => 0,
    'userStories' => 0,
    'userStory' => 0,
    'userSorie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57561f206fe088_15338762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57561f206fe088_15338762')) {function content_57561f206fe088_15338762($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<link rel="shortcut icon" href="facivon.ico">
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/profile.css" rel="stylesheet">

<div class="row">
  <div class="col-md-5 col-lg-5">
    <div id="user-info" class="profile">
      <input type="hidden" id="user-id" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
">
      <div class="col-sm-12">
        <div class="col-xs-12 col-sm-8">
          <h2><?php echo $_smarty_tpl->tpl_vars['user']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['last_name'];?>
</h2>
          <p class="text-muted email"><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</p>
          <h4><?php echo $_smarty_tpl->tpl_vars['user']->value['type'];?>
</h4>
          <br>
          <p class="about"><strong>Sobre...</strong></p>
          <p class="about"><?php echo $_smarty_tpl->tpl_vars['user']->value['about'];?>
</p>
          <br>
        </div>

        <div class="col-xs-12 col-sm-4 text-center">
          <figure>
            <img height="80" width="80" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['path'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['last_name'];?>
" class="img-circle">
          </figure>
        </div>

        <div class="selectable btn-simple pull-right text-muted">
          <span onclick="editAccount()" data-placement="bottom" data-toggle="tooltip" title="Editar perfil" class="glyphicon glyphicon-wrench"></span>
        </div>
      </div>

      <div class="col-xs-12 divider text-center">
        <div class="col-xs-12 col-sm-4 emphasis">
          <h2><strong><?php echo $_smarty_tpl->tpl_vars['user']->value['nArticles'];?>
</strong></h2>
          <p><small>Artigo<?php if ($_smarty_tpl->tpl_vars['user']->value['nArticles']!=1) {?>s<?php }?></small></p>
        </div>
        <div class="col-xs-12 col-sm-4 emphasis">
          <h2><strong id="nFollowees"><?php echo $_smarty_tpl->tpl_vars['user']->value['nFollowees'];?>
</strong></h2>
          <p><small>A seguir</small></p>
        </div>
        <div class="col-xs-12 col-sm-4 emphasis">
          <h2><strong id="nFollowers"><?php echo $_smarty_tpl->tpl_vars['user']->value['nFollowers'];?>
</strong></h2>
          <p><small>Seguidor<?php if ($_smarty_tpl->tpl_vars['user']->value['nFollowers']!=1) {?>es<?php }?></small></p>
        </div>
      </div>

      <?php if ($_smarty_tpl->tpl_vars['ID']->value&&$_smarty_tpl->tpl_vars['ID']->value!=$_smarty_tpl->tpl_vars['user']->value['id']) {?>
      <div class="col-xs-12 divider text-center">
        <button id="follow-button" style="margin-top:30px" onclick="toggleFollowStatus(<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
)"class="btn btn-primary btn-block"><span class="glyphicon glyphicon-<?php if ($_smarty_tpl->tpl_vars['user']->value['follow_status']==false) {?>plus<?php } else { ?>minus<?php }?>"></span> <?php if ($_smarty_tpl->tpl_vars['user']->value['follow_status']==true) {?> Não seguir <?php } else { ?> Seguir <?php }?> </button>
      </div>
      <?php }?>
    </div>
  </div>

  <div class="col-md-7 col-lg-7">
    <div id="wall">

      <?php  $_smarty_tpl->tpl_vars['userStory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['userStory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userStories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['userStory']->key => $_smarty_tpl->tpl_vars['userStory']->value) {
$_smarty_tpl->tpl_vars['userStory']->_loop = true;
?>
      <div class="row story">
         <div class="col-md-offset-1 col-md-10 col-sm-10 col-xs-10">
            <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['userStory']->value['author_picture'];?>
" class="img-circle pull-left user_picture" width="60" height="60" alt="$userStory.first_name} <?php echo $_smarty_tpl->tpl_vars['userSorie']->value['last_name'];?>
"/>
            <b><span class="vcenter"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['userStory']->value['author_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['userStory']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['userStory']->value['last_name'];?>
</a> editou um artigo.</span></b>
            <p class="text-muted small"><?php echo $_smarty_tpl->tpl_vars['userStory']->value['date'];?>
</p>
         </div>

        <div class="col-md-offset-3 col-md-9 col-sm-9 col-xs-9">
         <div class="short_news_item">
           <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/article.php?id=<?php echo $_smarty_tpl->tpl_vars['userStory']->value['article_id'];?>
"><h4><?php echo $_smarty_tpl->tpl_vars['userStory']->value['title'];?>
</h4></a>
           <span class="image-box" data-score="<?php echo $_smarty_tpl->tpl_vars['userStory']->value['score'];?>
 ponto<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['userStory']->value['score'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!=1) {?>s<?php }?>"><img class="img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['userStory']->value['path'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['userStory']->value['title'];?>
"></span>
           <p class="summary"><?php echo $_smarty_tpl->tpl_vars['userStory']->value['summary'];?>
</p>
         </div>
        </div>
    </div>
    <br>
    <?php } ?>
    </div>
  </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/bootbox/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/profile.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
