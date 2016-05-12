<?php /* Smarty version Smarty-3.1.15, created on 2016-05-12 02:42:57
         compiled from "C:\wamp\www\Overview\proto\templates\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40685733d1918a4ab0-85526022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8930a03245f7c1b4543757cbf3e980ed56b0522d' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\search.tpl',
      1 => 1463013126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40685733d1918a4ab0-85526022',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SEARCH_QUERY' => 0,
    'SEARCH_TYPE' => 0,
    'SEARCH_CATEGORY' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5733d191a8e9b8_79919755',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5733d191a8e9b8_79919755')) {function content_5733d191a8e9b8_79919755($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-offset-3">
            <form id="search-form" method="get" action="">
                <div class="selectors">
                    <select id="type-selector" class="form-control" name="type">
                        <option value="Contributor">Contributor</option>
                        <option value="Article">Article</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" name="query" placeholder="Search on Overview...">

                    <span class="input-group-btn">
                      <button id="search-form-button" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container">
    <div class="col-md-12">
        <hgroup class="mb20">
            <br>
            <h1>Search results</h1>
            <h2 class="lead">Showing results for "<strong id="query-string" class="text-danger"><?php echo $_smarty_tpl->tpl_vars['SEARCH_QUERY']->value;?>
</strong>" in <strong id="query-type" class="text-danger"><?php echo $_smarty_tpl->tpl_vars['SEARCH_TYPE']->value;?>
</strong> <?php if ($_smarty_tpl->tpl_vars['SEARCH_TYPE']->value=="Article"&&$_smarty_tpl->tpl_vars['SEARCH_CATEGORY']->value!='') {?>of category <strong id="query-category" class="text-danger"><?php echo $_smarty_tpl->tpl_vars['SEARCH_CATEGORY']->value;?>
</strong><?php }?></h2>
        </hgroup>
    </div>

    <div class="col-md-12">
        <section id="item-container" class="col-md-12 col-sm-6 col-md-18">
        </section>
    </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/search_page.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
