<!DOCTYPE html>
<html>

<head>
	
	<title>Mot de passe oublié</title>
	<meta name="description" content="Mot de passe oubli">
<?php
include ('inc/entete.html');

?>


</head>



<body>


<div id="boite">

	<div id="precedent">

		<a href="javascript:history.back()">Précédent</a>
			
	</div>

	<div class="instruction2">
			<p>
			 <span>Entrez votre adresse mail</span> et nous vous enverrons un lien pour recréer un mot de passe.
			</p>
	</div>

	<div class="form3">
		<form action="mail.php" name="login" method="post">

				<input type="email" placeholder="Adresse mail">
				<input type="submit" value="Valider">
		</form>
	</div>


</div>



</body>










</html>
