<!DOCTYPE html>
<?php
require 'config/biblio.php';
if(isset($_POST['categorie'])) {
	$seriecreate = $bdd->prepare("INSERT INTO serie(id, user, name, categorie) VALUES (NULL, ?, ?, ?)");
	$seriecreate->execute(array($_SESSION['infouser'],htmlspecialchars($_POST['seriename']), $_POST['categorie']));
}
if(isset($_POST['submit'])) {
$filedir = "upload/";
$poster = "image_front/";
$video = "video/";
	$file_video_name = $_FILES['file_video']['name'];
	$file_poster_name = $_FILES['file_poster']['name'];
	$file_poster_tmp = $_FILES['file_poster']['tmp_name'];
	$file_video_tmp = $_FILES['file_video']['tmp_name'];
	$poster_upload_dir = $filedir.$poster;
	$video_upload_dir = $filedir.$video;
	$videoap = $video_upload_dir .basename($file_video_name);
	$posterap = $poster_upload_dir .basename($file_poster_name);
	move_uploaded_file($file_video_tmp, $video_upload_dir .basename($file_video_name));
	move_uploaded_file($file_poster_tmp, $poster_upload_dir .basename($file_poster_name));
	$docadd = $bdd->prepare("INSERT INTO video(seriesid, upload_file, description, user_upload, picture) VALUES (?, ?, ?, ?, ?)");
	$docadd->execute(array($_POST['selectionserie'], $_SESSION['infouser'], $_POST['description'], $file_video_name, $file_poster_name));
}
?>
<html>
<head>
	<title>Upload des vidéos</title>
	<meta charset="utf-8">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<nav class="menu">
		<a href="dashboard">Menu d'acceuil </a>
	</nav>
	<div class="uploader">
		<form class="createserie" method="post">
			<input type="text" name="seriename" placeholder="nom de la serie" required>
			<select name="categorie">
				<option value="science_fiction">Science fiction </option>
				<option value="horreur">horreur</option>
				<option value="other">other</option>
				<input type="submit" value="crée la serie">
			</select>
		</form>
		<span class="type">Uploader des fichiers </span>
		<form action="" method="post" enctype="multipart/form-data">
			<select name="selectionserie">
				<?php
				$serie = $bdd->prepare("SELECT * FROM serie WHERE user = ?");
				$serie->execute(array($_SESSION['infouser']));
				while ($se = $serie->fetch()) {
					echo "<option value='".$se["id"]."'>".$se['name']."</option>";
				}
				?>
			</select>
			<br>
			<span> Miniature de la serie :</span>
			<input type="file" name="file_poster" placeholder="poster" required>
			<br>
				<span> Vidéo ( format mp4 requis ):</span>
			<input type="file" name="file_video" placeholder="poster" accept="video/mp4" required>
			<br>
			<input  id="with" type="text" name="description" placeholder="description de la vidéo ( 2000 caractère max )" maxlength="2000">
			<input type="submit" name="submit" value="upload">
		</form>
	</div>
</body>
</html>