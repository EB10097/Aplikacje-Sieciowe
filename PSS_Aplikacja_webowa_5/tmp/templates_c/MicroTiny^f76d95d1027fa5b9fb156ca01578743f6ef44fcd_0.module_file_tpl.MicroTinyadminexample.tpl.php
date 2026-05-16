<?php
/* Smarty version 4.2.1, created on 2026-05-14 20:37:01
  from 'module_file_tpl:MicroTiny;admin_example.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a06164d58b9c9_84796383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f76d95d1027fa5b9fb156ca01578743f6ef44fcd' => 
    array (
      0 => 'module_file_tpl:MicroTiny;admin_example.tpl',
      1 => 1777739842,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a06164d58b9c9_84796383 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.uploads_url.php','function'=>'smarty_function_uploads_url',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_textarea.php','function'=>'smarty_function_cms_textarea',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo smarty_function_form_start(array(),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'value', null);?><p><img src='<?php echo smarty_function_uploads_url(array(),$_smarty_tpl);?>
/images/logo1.gif' style="float: right;" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et ipsum id ante dignissim cursus sollicitudin eget erat. Quisque sit amet arcu urna. Nulla ultricies lacinia sapien, sed aliquam quam feugiat in. Donec consectetur pretium congue. Integer aliquam facilisis lacus, ut facilisis erat pharetra eget. Duis dapibus posuere nunc, id gravida massa pellentesque ac. Duis massa lectus, tempor sed imperdiet aliquam, luctus ut risus. Integer nisl libero, porttitor sit amet sagittis at, sodales at urna. Maecenas facilisis arcu eget nulla imperdiet sed interdum massa pretium. In id eros orci, pharetra dignissim nisl. Quisque vitae luctus turpis. Aenean pulvinar accumsan justo, vel pulvinar mi consequat in. Vestibulum ac turpis vel massa venenatis volutpat placerat in diam. Quisque ac magna dolor. Aliquam sagittis interdum urna a euismod. </p><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php echo smarty_function_cms_textarea(array('forcemodule'=>'MicroTiny','name'=>'mt_example','id'=>'mt_example','enablewysiwyg'=>1,'rows'=>10,'columns'=>80,'value'=>$_smarty_tpl->tpl_vars['value']->value),$_smarty_tpl);?>


<?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
}
