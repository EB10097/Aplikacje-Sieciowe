<?php
/* Smarty version 4.2.1, created on 2026-05-16 15:04:22
  from 'cms_template:a_page_menu' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a086b567802f4_84047091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a765246bd3a6d3f3b35df806443ececb149afab' => 
    array (
      0 => 'cms_template:a_page_menu',
      1 => '1778936650',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a086b567802f4_84047091 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'Nav_menu' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\^0a765246bd3a6d3f3b35df806443ececb149afab_0.cms_template.apagemenu.php',
    'uid' => '0a765246bd3a6d3f3b35df806443ececb149afab',
    'call_name' => 'smarty_template_function_Nav_menu_19461763386a086b56743a59_76398655',
  ),
));
?>

<?php if ((isset($_smarty_tpl->tpl_vars['nodes']->value))) {?>
  <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Nav_menu', array('data'=>$_smarty_tpl->tpl_vars['nodes']->value,'depth'=>0), true);?>

<?php }
}
/* smarty_template_function_Nav_menu_19461763386a086b56743a59_76398655 */
if (!function_exists('smarty_template_function_Nav_menu_19461763386a086b56743a59_76398655')) {
function smarty_template_function_Nav_menu_19461763386a086b56743a59_76398655(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('depth'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>
<ul class="<?php if ($_smarty_tpl->tpl_vars['depth']->value == 0) {?>nav navbar-nav pull-right<?php } else { ?>dropdown-menu<?php }?>"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'node');
$_smarty_tpl->tpl_vars['node']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->do_else = false;
if ($_smarty_tpl->tpl_vars['node']->value->type == 'separator') {?><li class="divider"></li><?php } else {
$_smarty_tpl->_assignInScope('liclass', '');
$_smarty_tpl->_assignInScope('aclass', '');
if ($_smarty_tpl->tpl_vars['node']->value->current || $_smarty_tpl->tpl_vars['node']->value->parent) {
$_smarty_tpl->_assignInScope('liclass', 'active');
}
if ((isset($_smarty_tpl->tpl_vars['node']->value->children)) && $_smarty_tpl->tpl_vars['depth']->value == 0) {
$_smarty_tpl->_assignInScope('liclass', ($_smarty_tpl->tpl_vars['liclass']->value).(' dropdown'));
$_smarty_tpl->_assignInScope('aclass', 'dropdown-toggle');
}?><li<?php if ($_smarty_tpl->tpl_vars['liclass']->value != '') {?> class="<?php echo trim($_smarty_tpl->tpl_vars['liclass']->value);?>
"<?php }?>><a<?php if ($_smarty_tpl->tpl_vars['aclass']->value != '') {?> class="<?php echo trim($_smarty_tpl->tpl_vars['aclass']->value);?>
"<?php }?> href="<?php if ((isset($_smarty_tpl->tpl_vars['node']->value->children)) && $_smarty_tpl->tpl_vars['depth']->value == 0) {?>#<?php } else {
echo $_smarty_tpl->tpl_vars['node']->value->url;
}?>" <?php if ((isset($_smarty_tpl->tpl_vars['node']->value->children)) && $_smarty_tpl->tpl_vars['depth']->value == 0) {?>data-toggle="dropdown"<?php }?>><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
 <?php if ((isset($_smarty_tpl->tpl_vars['node']->value->children)) && $_smarty_tpl->tpl_vars['depth']->value == 0) {?><b class="caret"></b><?php }?></a><?php if (!empty($_smarty_tpl->tpl_vars['node']->value->children)) {
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Nav_menu', array('data'=>$_smarty_tpl->tpl_vars['node']->value->children,'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), true);
}?></li><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php
}}
/*/ smarty_template_function_Nav_menu_19461763386a086b56743a59_76398655 */
}
