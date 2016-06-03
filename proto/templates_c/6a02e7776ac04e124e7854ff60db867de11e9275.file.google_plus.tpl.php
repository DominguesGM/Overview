<?php /* Smarty version Smarty-3.1.15, created on 2016-06-03 17:34:18
         compiled from "C:\wamp\www\Overview\proto\templates\articles\sharing\google_plus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159245751a1c568dc01-15518776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a02e7776ac04e124e7854ff60db867de11e9275' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\sharing\\google_plus.tpl',
      1 => 1464968053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159245751a1c568dc01-15518776',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5751a1c5738036_79942944',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'article' => 0,
    'articleImages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5751a1c5738036_79942944')) {function content_5751a1c5738036_79942944($_smarty_tpl) {?><!-- Atualize a tag html para incluir os atributos itemscope e itemtype. -->
<html itemscope itemtype="http://schema.org/Article">

<!-- Insira as três tags a seguir no corpo. -->
<span itemprop="name"><?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/articles/article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
</span>
<span itemprop="description"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</span>
<img itemprop="image" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['articleImages']->value[0]['path'];?>
">

<!-- Posicione esta tag no cabeçalho ou imediatamente antes da tag de fechamento do corpo. -->
<script src="https://apis.google.com/js/platform.js" async>
  {
    lang: 'pt-PT',
    parsetags: 'explicit'
  }
</script>

<!-- Posicione esta tag onde você deseja que o botão +1 apareça. -->
<div class="g-plusone" data-annotation="inline" data-width="300"></div>

<!-- Posicione este retorno de chamada onde achar necessário. -->
<script type="text/javascript">gapi.plusone.go();</script>
<?php }} ?>
