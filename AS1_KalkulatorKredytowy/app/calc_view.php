<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator Kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_kwotaKredytu">Kwota Kredytu </label>
	<input id="id_kwotaKredytu" type="text" name="kwotaKredytu" value="<?php isset($kwotaKredytu)?print($kwotaKredytu):print(""); ?>" /><br />
	<label for="id_lataKredytu"> Lata kredytu: </label>
	<select name="lataKredytu" id="id_lataKredytu">
    <?php
    for ($i = 1; $i <= 30; $i++) {
        echo "<option value='$i'>$i</option>";
    }
	
    ?> 	

</select><br />
	<label for="id_oprocentowanie">Oprocentowanie </label>
	<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php isset($oprocentowanie)?print($oprocentowanie):print(""); ?> " /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; 
		border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata kredytu: '.$result; ?>
</div>
<?php } ?>

</body>
</html>