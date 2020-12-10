<!DOCTYPE html>
<html>

<head>
	
	<title>Nouvel utilisateur</title>
	<meta name="description" content="utilisateur nouveau">

	<?php
	include ('inc/entete.html');
	?>

</head>



<body>


<div id="boite">

	<div id="precedent">

		<a href="javascript:history.back()">Précédent</a>
			
	</div>

	<div class="instruction1">
			<p>
			Votre "login" et votre "mot de passe" doit contenir <span>au moins 5 caractères</span>, seulement des <span>lettres, des nombres et aucun espace</span>.
			</p>
	</div>

	<div class="form2">
		<form action="login.php" name="login" method="post">
				<input type="text" placeholder="Login">
				<input type="password" placeholder="Mot de passe">
				<input type="password" placeholder="Vérification du Mot de passe" size="22px">
				<input type="email" placeholder="Adresse mail">
				<input type="submit">
		</form>
	</div>


</div>



</body>










</html>
