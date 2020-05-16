<?php
require 'config/biblio.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/serie.css">

</head>
<body>
<nav class="menu">
	<a href="#messeries">Mes séries</a>
	<a href="#other">Les autres séries </a>
	<a href="uploader">Upload</a>
	<form action="search">
		<input type="search" name="query" placeholder="rechercher une serie">
		<input type="submit" value="rechercher">
	</form>
</nav>
<div class="cop">
	</div>
</body>
</html>