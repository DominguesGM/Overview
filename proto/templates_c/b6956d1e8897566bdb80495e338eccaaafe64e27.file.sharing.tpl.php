<?php /* Smarty version Smarty-3.1.15, created on 2016-06-06 22:21:22
         compiled from "C:\wamp\www\Overview\proto\templates\articles\sharing\sharing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78655755db42556461-89627880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6956d1e8897566bdb80495e338eccaaafe64e27' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\sharing\\sharing.tpl',
      1 => 1465244175,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78655755db42556461-89627880',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5755db425df844_25586829',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5755db425df844_25586829')) {function content_5755db425df844_25586829($_smarty_tpl) {?><section class="helpIcons">
<p>Partilhar </p>
<a id="shareUrl" target="_blank" href=""></a>
<span id="st_twitter" class="st_twitter_custom shareIcon text-hide" st_title="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
">Twitter</span>
<span id="st_facebook" class="st_facebook_custom shareIcon text-hide" st_title="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
">Facebook</span>
<span id="st_googleplus" class="st_googleplus_custom shareIcon text-hide" st_title="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
">Google Plus</span>
</section>
<?php }} ?>
