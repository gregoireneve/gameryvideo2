<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=videoproject', 'root', '');
if(isset($_SESSION['userinfo'])) {

} else {
	if(isset($_POST['type'])) {
		if($_POST['type'] == "connection") {
			$bdo = $bdd->prepare("SELECT * FROM user WHERE user = ? AND mdp = ?");
			$bdo->execute(array($_POST['mail'], $_POST['password']));
			header('location: dashboard');
			while ($infouser = $bdo->fetch()) {
				$_SESSION['infouser'] = $infouser['id'];
			}
		}
	}
}
?>