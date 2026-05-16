<?php
/* Smarty version 4.2.1, created on 2026-05-16 13:41:45
  from 'tpl_head:1' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a0857f950b846_93782011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64060443164a9839c71c34206331731aaeeac788' => 
    array (
      0 => 'tpl_head:1',
      1 => '1778931702',
      2 => 'tpl_head',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a0857f950b846_93782011 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.title.php','function'=>'smarty_function_title',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.sitename.php','function'=>'smarty_function_sitename',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.metadata.php','function'=>'smarty_function_metadata',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_stylesheet.php','function'=>'smarty_function_cms_stylesheet',),));
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo smarty_function_title(array(),$_smarty_tpl);?>
 - <?php echo smarty_function_sitename(array(),$_smarty_tpl);?>
</title>
    <?php echo smarty_function_metadata(array(),$_smarty_tpl);?>


    <link rel="shortcut icon" href="assets/images/ikona.png">
    
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Style szablonu -->
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="assets/css/main.css">
    
        <?php echo smarty_function_cms_stylesheet(array(),$_smarty_tpl);?>


    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="assets/js/html5shiv.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head><?php }
}
