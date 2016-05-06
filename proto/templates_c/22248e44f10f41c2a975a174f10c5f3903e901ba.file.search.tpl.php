<?php /* Smarty version Smarty-3.1.15, created on 2016-05-06 16:06:08
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111195728ca84ceb092-84415026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22248e44f10f41c2a975a174f10c5f3903e901ba' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\search.tpl',
      1 => 1462543567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111195728ca84ceb092-84415026',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5728ca85103a40_02867519',
  'variables' => 
  array (
    'SEARCH_QUERY' => 0,
    'SEARCH_TYPE' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5728ca85103a40_02867519')) {function content_5728ca85103a40_02867519($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="col-md-12">
        <hgroup class="mb20">
            <br>
            <h1>Search results</h1>
            <h2 class="lead"><strong class="text-danger" id="result-count"></strong> results were found for the search for <strong id="query-string" class="text-danger"><?php echo $_smarty_tpl->tpl_vars['SEARCH_QUERY']->value;?>
</strong> in <strong id="query-type" class="text-danger"><?php echo $_smarty_tpl->tpl_vars['SEARCH_TYPE']->value;?>
</strong></h2>
        </hgroup>
    </div>

    <div class="col-md-12">
        <section id="item-container" class="col-md-12 col-sm-6 col-md-18">
            <article class="search-result row">
                <span class="image-box" data-score="321"><img class="img-thumbnail" src="http://placehold.it/75x75" alt=""></span>
                <div class="col-xs-12 col-sm-12 col-md-2">
                    <ul class="meta-search">
                        <li><i class="glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
                        <li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
                        <li><i class="glyphicon glyphicon-tags"></i> <span>Category1</span></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                    <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>
                    <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
                </div>
                <span class="clearfix borda"></span>
            </article>

            <article class="search-result row">
                <span class="image-box" data-score="321"><img class="img-thumbnail" src="http://placehold.it/75x75" alt=""></span>
                <div class="col-xs-12 col-sm-12 col-md-2">
                    <ul class="meta-search">
                        <li><i class="glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
                        <li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
                        <li><i class="glyphicon glyphicon-tags"></i> <span>Category1</span></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                    <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>
                    <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
                </div>
                <span class="clearfix borda"></span>
            </article>


            <article class="search-result row">
                <span class="image-box" data-score="321"><img class="img-thumbnail" src="http://placehold.it/75x75" alt=""></span>
                <div class="col-xs-12 col-sm-12 col-md-2">
                    <ul class="meta-search">
                        <li><i class="glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
                        <li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
                        <li><i class="glyphicon glyphicon-tags"></i> <span>Category1</span></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                    <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>
                    <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
                </div>
                <span class="clearfix borda"></span>
            </article>
        </section>
    </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/search_page.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
