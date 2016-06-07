<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 12:55:19
         compiled from "C:\wamp\www\Overview\proto\templates\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40685733d1918a4ab0-85526022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8930a03245f7c1b4543757cbf3e980ed56b0522d' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\search.tpl',
      1 => 1465284075,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40685733d1918a4ab0-85526022',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5733d191a8e9b8_79919755',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5733d191a8e9b8_79919755')) {function content_5733d191a8e9b8_79919755($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-offset-3">
            <form id="search-form">
                <div class="selectors">
                    <select id="type-selector" class="form-control" name="type">
                        <option value="Artigo">Artigo</option>
                        <option value="Contribuidor">Contribuidor</option>
                    </select>
                </div>
                <div class="input-group">
                    <input id="search-box" type="text" class="form-control" name="query" placeholder="Pesquise no Overview...">

                    <span class="input-group-btn">
                      <button id="search-form-button" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="result-container" class="container">

</div>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/search_page.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
