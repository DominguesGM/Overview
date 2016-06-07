<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 03:11:05
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\articles\sharing\google_plus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:792157548804278199-41482686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4abd8dfb61b8b8cadd5611da8b716222e99c867' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\articles\\sharing\\google_plus.tpl',
      1 => 1465261817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '792157548804278199-41482686',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_575488042c5e13_89049047',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575488042c5e13_89049047')) {function content_575488042c5e13_89049047($_smarty_tpl) {?><!-- Posicione esta tag no cabeçalho ou imediatamente antes da tag de fechamento do corpo. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {
    lang: 'pt-PT'
  }
</script>

<!-- Posicione esta tag onde você deseja que o botão compartilhar apareça. -->
<div class="g-plus" data-action="share" data-annotation="none"></div>
<?php }} ?>
