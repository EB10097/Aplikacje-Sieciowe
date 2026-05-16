<?php
/* Smarty version 4.2.1, created on 2026-05-16 13:41:45
  from 'tpl_body:1' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a0857f94dd0a1_30244575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '763e63b089e7c52bfafe4a16588e3defdf19eb95' => 
    array (
      0 => 'tpl_body:1',
      1 => '1778931702',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
    'cms_template:a_page_header' => 1,
    'cms_template:a_page_foot' => 1,
  ),
),false)) {
function content_6a0857f94dd0a1_30244575 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.root_url.php','function'=>'smarty_function_root_url',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.title.php','function'=>'smarty_function_title',),));
?>
<body class="<?php if ($_smarty_tpl->tpl_vars['page_alias']->value == 'home') {?>home<?php }?>">
    <!-- Pasek nawigacji -->
    <div class="navbar navbar-inverse navbar-fixed-top headroom" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
"><img src="assets/images/logo.png" alt="Schronisko dla zwierząt"></a>
            </div>
            <div class="navbar-collapse collapse">
                
                                <?php echo Navigator::function_plugin(array('template'=>'a_page_menu'),$_smarty_tpl);?>

                
            </div>
        </div>
    </div> 
    <!-- /.navbar -->

        <?php if ($_smarty_tpl->tpl_vars['page_alias']->value == 'home') {?>
        <?php $_smarty_tpl->_subTemplateRender('cms_template:a_page_header', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php } else { ?>
        <!-- Pusty header dla podstron (daje odpowiedni odstęp od menu) -->
        <header id="head" class="secondary"></header>
    <?php }?>

    <!-- GŁÓWNY KONTENER TREŚCI -->
    <div class="container">
        <div class="row">
            <article class="col-md-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title"><?php echo smarty_function_title(array(),$_smarty_tpl);?>
</h1>
                </header>
                
                                <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array(),$_smarty_tpl); ?>
                
            </article>
        </div>
    </div>  
    <!-- /container -->
    
        <?php $_smarty_tpl->_subTemplateRender('cms_template:a_page_foot', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- Skrypty JS -->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"><?php echo '</script'; ?>
>
   <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/headroom.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/jQuery.headroom.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/template.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
