{extends file="main.tpl"}

{block name=content}
<div class="row padding">
	<div class="col span_8" style="float: none; margin: 0 auto;">
		<div class="l-box">
			<form action="{$conf->action_url}login" method="post">
				<fieldset>
					<legend>Logowanie do systemu</legend>
					
					<label for="id_login">login:</label>
                    <input id="id_login" type="text" name="login" /">
					
					<label for="id_pass">Hasło:</label>
                    <input id="id_pass" type="text" name="pass" /">
					
					<div style="margin-top: 1em;">
						<input type="submit" value="Zaloguj" class="btn"/>
					</div>
				</fieldset>
			</form>	
		</div>
		
		<div style="margin-top: 1em;">
			{include file='messages.tpl'}
		</div>
	</div>
</div>
{/block}
