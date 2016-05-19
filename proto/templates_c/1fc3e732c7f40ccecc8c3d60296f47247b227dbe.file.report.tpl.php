<?php /* Smarty version Smarty-3.1.15, created on 2016-05-12 21:43:48
         compiled from "C:\wamp\www\Overview\proto\templates\articles\report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171545734569e343d83-27486864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fc3e732c7f40ccecc8c3d60296f47247b227dbe' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\report.tpl',
      1 => 1463082171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171545734569e343d83-27486864',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5734569e35b780_13089301',
  'variables' => 
  array (
    'ID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5734569e35b780_13089301')) {function content_5734569e35b780_13089301($_smarty_tpl) {?><div id="report-form" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="report-item-id">
        <p>Porque motivo pretende reportar este item?</p>
        <textarea id="report-description" style="overflow:auto;resize:vertical" class="form-control" rows="2" ></textarea>
      </div>
      <div class="modal-footer">
        <button onclick="submitReport(<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
);" type="button" class="pull-right btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-flag"></span>Reportar</button>
        <span class="pull-right">&nbsp</span>
        <button type="button" class="pull-right btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
      </div>
    </div>
  </div>
</div>
<?php }} ?>
