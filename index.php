<!DOCTYPE html>
<?php
require 'config/biblio.php';
?>
<html>
<head>
	<title>Gamery video</title>
	<meta charset="utf-8">
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
<nav class="menu">
	<a href="about">A propos </a>
	<a href="#inscription">Inscription </a>
	<a href="#connection">Connection</a>
</nav>
<div class="content">
	<p> Crée vos propres série et partager la avec plein de personnes </p>
	<div id="connection">
		<span> Connection </span>
		<form class="ap" action="" method="post">
			<input type="hidden" name="type" value="connection">
			<input type="email" name="mail" placeholder="email">
			<input type="password" name="password" placeholder="mot de passe">
			<button type="submit"><i>Connection</i></button>
		</form>
	</div>
		<div id="inscription">
		<span> Inscription </span>
		<form class="ap" action="" method="post">
			<input type="hidden" name="type" value="connection">
			<input type="email" name="mail" placeholder="email">
			<input type="password" name="password" placeholder="mot de passe">
			<button type="submit"><i>Inscription</i></button>
		</form>
	</div>
	</div>
</body>
</html>