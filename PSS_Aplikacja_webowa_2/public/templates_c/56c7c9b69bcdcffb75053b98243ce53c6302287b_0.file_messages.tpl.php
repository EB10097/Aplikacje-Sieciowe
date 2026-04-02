<?php
/* Smarty version 5.4.5, created on 2026-04-02 13:45:53
  from 'file:messages.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69ce56f188ce07_71020463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56c7c9b69bcdcffb75053b98243ce53c6302287b' => 
    array (
      0 => 'messages.tpl',
      1 => 1768473534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69ce56f188ce07_71020463 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\mydla\\app\\views\\templates';
if ($_smarty_tpl->getValue('msgs')->isMessage()) {?>
<div class="messages bottom-margin">
	<ul>
	<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
	<li class="msg <?php if ($_smarty_tpl->getValue('msg')->type == 2) {?>error<?php }?> <?php if ($_smarty_tpl->getValue('msg')->type == 1) {?>warning<?php }?> <?php if ($_smarty_tpl->getValue('msg')->type == 0) {?>info<?php }?>">
        <?php echo $_smarty_tpl->getValue('msg')->text;?>

    </li>
	<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
	</ul>
</div>
<?php }
}
}
