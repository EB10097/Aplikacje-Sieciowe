<?php
/* Smarty version 5.4.5, created on 2026-04-02 14:46:16
  from 'file:MainPage.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69ce6518c745e8_81370848',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '152e80355591b40aac81110565004059c1c60157' => 
    array (
      0 => 'MainPage.tpl',
      1 => 1768674866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69ce6518c745e8_81370848 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\str\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_141837417069ce6518c70ed4_46794660', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_141837417069ce6518c70ed4_46794660 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\str\\app\\views';
?>

<div style="background: linear-gradient(rgba(204, 28, 28, 0.5), rgba(230, 0, 0, 0.5)), url('<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/soap-bg.jpg'); background-size: cover; background-position: center; padding: 120px 20px; text-align: center; color: white;">
    
    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" 
       style="display: inline-block; background: #c0392b; color: white; padding: 18px 40px; font-size: 1.2em; text-decoration: none; border-radius: 5px; font-weight: bold; transition: background 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
       Sprawdź nasze produkty
    </a>
</div>

<div style="display: flex; justify-content: space-around; padding: 60px 10%; background: #ffffff; text-align: center; border-bottom: 1px solid #eee;">
    <div style="max-width: 250px;">
        <h3 style="color: #2c3e50;">🌿 100% Eko</h3>
        <p style="color: #7f8c8d;">Tylko naturalne, certyfikowane składniki roślinne.</p>
    </div>
    <div style="max-width: 250px;">
        <h3 style="color: #2c3e50;">🧼 Ręczna robota</h3>
        <p style="color: #7f8c8d;">Każda kostka jest unikalna i tworzona z pasją.</p>
    </div>
    <div style="max-width: 250px;">
        <h3 style="color: #2c3e50;">🚚 Szybka dostawa</h3>
        <p style="color: #7f8c8d;">Twoje zamówienie wyślemy w ciągu 48h.</p>
    </div>
</div>


<?php
}
}
/* {/block "content"} */
}
