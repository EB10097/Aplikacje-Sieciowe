{extends file="main.tpl"}

{block name="content"}

<div style="max-width: 500px; margin: 50px auto; padding: 30px; background:  white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

	<h1 style="text-align: center; margin-bottom: 30px; color: #2c3e50;">
		📝 Rejestracja nowego konta
	</h1>

	{* Formularz rejestracji *}
	<form action="{$conf->action_url}register" method="post">
		
		{* Login *}
		<div style="margin-bottom: 20px;">
			<label style="display:  block; font-weight: bold; margin-bottom: 5px; color: #34495e;">
				Login:  <span style="color: red;">*</span>
			</label>
			<input type="text" 
			       name="login" 
			       required
			       minlength="3"
			       maxlength="50"
			       placeholder="Wybierz login (min.  3 znaki)"
			       style="width: 100%; padding: 10px; border:  1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

		{* Email *}
		<div style="margin-bottom:  20px;">
			<label style="display: block; font-weight: bold; margin-bottom:  5px; color: #34495e;">
				Email: <span style="color: red;">*</span>
			</label>
			<input type="email" 
			       name="email" 
			       required
			       placeholder="twoj@email.com"
			       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

		{* Imię *}
		<div style="margin-bottom: 20px;">
			<label style="display:  block; font-weight: bold; margin-bottom: 5px; color: #34495e;">
				Imię: <span style="color: red;">*</span>
			</label>
			<input type="text" 
			       name="imie" 
			       required
			       minlength="2"
			       maxlength="50"
			       placeholder="Twoje imię"
			       style="width: 100%; padding:  10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

		{* Nazwisko *}
		<div style="margin-bottom: 20px;">
			<label style="display: block; font-weight:  bold; margin-bottom: 5px; color: #34495e;">
				Nazwisko: <span style="color: red;">*</span>
			</label>
			<input type="text" 
			       name="nazwisko" 
			       required
			       minlength="2"
			       maxlength="50"
			       placeholder="Twoje nazwisko"
			       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

		{* Hasło *}
		<div style="margin-bottom: 20px;">
			<label style="display: block; font-weight: bold; margin-bottom: 5px; color: #34495e;">
				Hasło: <span style="color: red;">*</span>
			</label>
			<input type="password" 
			       name="password" 
			       required
			       minlength="6"
			       placeholder="Min. 6 znaków"
			       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

		{* Powtórz hasło *}
		<div style="margin-bottom: 30px;">
			<label style="display: block; font-weight:  bold; margin-bottom: 5px; color: #34495e;">
				Powtórz hasło: <span style="color: red;">*</span>
			</label>
			<input type="password" 
			       name="password2" 
			       required
			       minlength="6"
			       placeholder="Powtórz hasło"
			       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

		{* Przycisk rejestracji *}
		<button type="submit" 
		        style="width: 100%; background: #27ae60; color: white; padding: 12px; border: none; border-radius: 5px; font-size: 1.1em; font-weight: bold; cursor: pointer; transition: background 0.2s;"
		        onmouseover="this.style. background='#229954'" 
		        onmouseout="this.style.background='#27ae60'">
			✅ Zarejestruj się
		</button>

		{* Link do logowania *}
		<div style="text-align: center; margin-top: 20px; color: #7f8c8d;">
			Masz już konto? 
			<a href="{$conf->action_url}login" style="color: #3498db; text-decoration: none; font-weight: bold;">
				Zaloguj się
			</a>
		</div>
	</form>

</div>

{/block}