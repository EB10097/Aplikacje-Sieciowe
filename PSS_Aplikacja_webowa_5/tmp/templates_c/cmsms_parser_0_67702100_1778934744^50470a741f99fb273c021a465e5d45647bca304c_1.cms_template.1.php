<?php
/* Smarty version 4.2.1, created on 2026-05-16 14:32:24
  from 'cms_template:1' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a0863d8aadc64_12296535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50470a741f99fb273c021a465e5d45647bca304c' => 
    array (
      0 => 'cms_template:1',
      1 => '1778931702',
      2 => 'cms_template',
    ),
    '24180f5ac84db36901ddd3c2e85ff3c7e6cc9964' => 
    array (
      0 => 'cms_template:a_page_header',
      1 => '1778933051',
      2 => 'cms_template',
    ),
    'aa13751358f4eca05b01a530fbfa18ae919be4fd' => 
    array (
      0 => 'cms_template:a_page_foot',
      1 => '1778783109',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
    'cms_template:a_page_header' => 1,
    'cms_template:a_page_foot' => 1,
  ),
),false)) {
function content_6a0863d8aadc64_12296535 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_get_language.php','function'=>'smarty_function_cms_get_language',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.title.php','function'=>'smarty_function_title',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.sitename.php','function'=>'smarty_function_sitename',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.metadata.php','function'=>'smarty_function_metadata',),4=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_stylesheet.php','function'=>'smarty_function_cms_stylesheet',),5=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.root_url.php','function'=>'smarty_function_root_url',),));
?>
<!DOCTYPE html>
<html lang="<?php echo smarty_function_cms_get_language(array(),$_smarty_tpl);?>
">
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
</head>

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
                
                                
                
            </div>
        </div>
    </div> 
    <!-- /.navbar -->

        <?php if ($_smarty_tpl->tpl_vars['page_alias']->value == 'home') {?>
        <?php
$_smarty_tpl->_subTemplateRender('cms_template:a_page_header', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false, '24180f5ac84db36901ddd3c2e85ff3c7e6cc9964', 'content_6a0863d8aa4121_77928774');
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
                
                                
                
            </article>
        </div>
    </div>  
    <!-- /container -->
    
        <?php
$_smarty_tpl->_subTemplateRender('cms_template:a_page_foot', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false, 'aa13751358f4eca05b01a530fbfa18ae919be4fd', 'content_6a0863d8aad364_32294236');
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
/* Start inline template "cms_template:apageheader" =============================*/
function content_6a0863d8aa4121_77928774 (Smarty_Internal_Template $_smarty_tpl) {
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
<!-- /Header --><?php
}
/* End inline template "cms_template:apageheader" =============================*/
/* Start inline template "cms_template:apagefoot" =============================*/
function content_6a0863d8aad364_32294236 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Kontakt</h3>
						<div class="widget-body">
							<p>+48 123 456 789<br>
								<a href="mailto:#">adres.email@polska.pl</a><br>
								<br>
								adres
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Obserwuj nas</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Text widget</h3>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
							<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2014, Your name. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a> 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer><?php
}
/* End inline template "cms_template:apagefoot" =============================*/
}
