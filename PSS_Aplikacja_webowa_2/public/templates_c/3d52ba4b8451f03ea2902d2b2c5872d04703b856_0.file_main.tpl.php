<?php
/* Smarty version 5.4.5, created on 2026-04-02 13:45:53
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69ce56f1876345_48889630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d52ba4b8451f03ea2902d2b2c5872d04703b856' => 
    array (
      0 => 'main.tpl',
      1 => 1768602562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_69ce56f1876345_48889630 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\mydla\\app\\views\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!  doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <html class=""> <![endif]-->    
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Naturalne Mydła Jana - Sklep internetowy" ?? null : $tmp);?>
</title>

	<meta name="description" content="">
	<meta name="author" content="">

	<!--[if lt IE 9]> 
		<?php echo '<script'; ?>
 src="http://html5shiv.googlecode. com/svn/trunk/html5.js"><?php echo '</script'; ?>
> 
	<![endif]-->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/whhg.css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/grid.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/styles.css">

	<!-- TODO: uncomment skin styles.  
	     Note, you can use another skin found in the "css" folder, or create your own one --> 
	<!-- <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/skin-dark.css"> -->

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/ie.css">
	<![endif]-->

	<link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/images/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/images/apple-touch-icon-114x114.png">

</head>
<body>
	
	<!--  LOGOTYPE LINE  -->
	<!--  TODO: Change domain name and call to action message below -->
	<div id="Head" class="container">
		<div class="row">
			<div class="col span_24">
				<h1 id="Domain">🧼 Naturalne Mydła Jana<br>
					<span>Ręcznie robione, ekologiczne mydła naturalne</span></h1>
			</div>
		</div>
	</div>
	<!-- END OF LOGOTYPE LINE  -->

	<!-- CONTENT -->
	<!-- TODO: Change content in the rows/columns below 
	     Please note, 24-columns grid is used in the template, so you can reorder the blocks 
	     to make, for example, 2-columns layout (use a pair of col span_12) or 4-column one
	     (use 4 copies of col span_6) -->
	<div id="Content" class="container">
	
				<div class="row">
			<div class="col span_24">
				<?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
			</div>
		</div>

				<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_170430882469ce56f1874b78_76945004', 'content');
?>

		
	</div>
	<!-- END OF CONTENT -->

	<div id="Content-end" class="container"></div>

		<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_174606928869ce56f18755f2_75555698', 'footer');
?>


<!-- TODO: In order to track visits, insert google analytics code here -->


<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<?php echo '<script'; ?>
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/js/main.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
/* {block 'content'} */
class Block_170430882469ce56f1874b78_76945004 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\mydla\\app\\views\\templates';
?>

		
		<div class="row special">
			<div class="col span_24">
				<h3 class="align-center">Witaj w sklepie z naturalnymi mydłami!</h3>
				<p class="align-center">Zapoznaj się z naszą ofertą ręcznie robionych, ekologicznych mydeł. </p>
			</div>
		</div>

		<h2 class="align-center margin">Dlaczego warto wybrać nasze mydła? </h2>
		<div class="row padding">
			<div class="col span_8">
				<div class="circle"><i class="icon icon-heart"></i></div>
				<h3 class="align-center">100% Naturalne składniki</h3>
				<p class="align-center">Nasze mydła wykonane są wyłącznie z naturalnych składników, bez chemicznych dodatków i konserwantów.</p>
			</div>

			<div class="col span_8">
				<div class="circle"><i class="icon icon-leaf"></i></div>
				<h3 class="align-center">Ekologiczne</h3>
				<p class="align-center">Dbamy o środowisko na każdym etapie produkcji - od pozyskiwania składników po opakowanie.</p>
			</div>

			<div class="col span_8">
				<div class="circle"><i class="icon icon-thumbup"></i></div>
				<h3 class="align-center">Ręczna robota</h3>
				<p class="align-center">Każda kostka mydła jest tworzona ręcznie z dbałością o najdrobniejsze detale.</p>
			</div>
		</div> <!-- end of row -->

		<?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_174606928869ce56f18755f2_75555698 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\mydla\\app\\views\\templates';
?>

	<div id="Footer" class="container">
		<div class="row top">
			<div class="col span_16">Naturalne Mydła Jana &copy; 2026. Wszelkie prawa zastrzeżone.</div>
			<div class="col span_8 align-right">Design: <a href="http://www.gettemplate.com/">GetTemplate</a></div>
		</div>
	</div>
	<?php
}
}
/* {/block 'footer'} */
}
