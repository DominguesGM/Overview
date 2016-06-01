<?php /* Smarty version Smarty-3.1.15, created on 2016-06-01 22:48:37
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\articles\report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10205574f4a25a63db1-34796123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '520f191dc703c2be0ac24d7ed876ea1470b829e0' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\articles\\report.tpl',
      1 => 1463660139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10205574f4a25a63db1-34796123',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_574f4a25b5d795_08414871',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574f4a25b5d795_08414871')) {function content_574f4a25b5d795_08414871($_smarty_tpl) {?><div id="report-form" class="modal fade" role="dialog">
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
