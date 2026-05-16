<?php
/* Smarty version 4.2.1, created on 2026-05-16 14:04:12
  from 'cms_template:a_page_header' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a085d3cb6d4e0_74162950',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24180f5ac84db36901ddd3c2e85ff3c7e6cc9964' => 
    array (
      0 => 'cms_template:a_page_header',
      1 => '1778933051',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a085d3cb6d4e0_74162950 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_selflink.php','function'=>'smarty_function_cms_selflink',),));
?>
<!-- Header -->
<header id="head">
    <div class="container">
        <div class="row">
            <h1 class="lead text-outline">SCHRONISKO DLA ZWIERZĄT</h1>
            <p class="tagline">Znajdź prawdziwego przyjaciela i odmień jego życie.</p>
            <p> <a class="btn btn-action btn-lg" role="button" href="<?php echo smarty_function_cms_selflink(array('href'=>'koty'),$_smarty_tpl);?>
">ADOPTUJ</a></p>
        </div>
    </div>
</header>
<!-- /Header --><?php }
}
