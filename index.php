<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: zawartość.php');
		exit();
	}

?>

<?php require_once('views/partials/header.php'); ?>

<div class="container">
<h3>Logowanie do galerii</h3>
<p>podaj swój login i hasło:</p>

<form action="zaloguj.php" method="post">
	
	Login: <br /> <input type="text" name="login" /> <br />
	Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
	<input type="submit" value="Zaloguj się" />
	
</form>

<p>Poprawna nazwa użytkownika: <strong>Grzes</strong> i hasło: <strong>Gpass</strong> </p>

</div>

<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

<?php require_once('views/partials/footer.php'); ?>
