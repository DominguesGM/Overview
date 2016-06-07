<?php /* Smarty version Smarty-3.1.15, created on 2016-06-06 22:05:58
         compiled from "C:\wamp\www\Overview\proto\templates\articles\sharing\google_plus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159245751a1c568dc01-15518776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a02e7776ac04e124e7854ff60db867de11e9275' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\sharing\\google_plus.tpl',
      1 => 1465243533,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159245751a1c568dc01-15518776',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5751a1c5738036_79942944',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5751a1c5738036_79942944')) {function content_5751a1c5738036_79942944($_smarty_tpl) {?><!-- Posicione esta tag no cabeçalho ou imediatamente antes da tag de fechamento do corpo. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {
    lang: 'pt-PT'
  }
</script>

<!-- Posicione esta tag onde você deseja que o botão compartilhar apareça. -->
<div class="g-plus" data-action="share" data-annotation="none"></div>
<?php }} ?>
