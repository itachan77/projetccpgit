
<?php

//code pour connaitre les erreurs spécifiques : $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//code pour changer un tableau associatif sous forme d'objet  : 
// $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);



session_start();

// pour le cryptage du mot de passe, voir Bcrypt, fonction utilisée par symfony


//CONTIENT LE TEMPLATE HTML ET LE INCLUDE DE LA CLASSE FORMADMIN
include("inc/template.php");
?>

<title>Connexion à l'Espace Eleve</title>



</head>

<?php
$cxeleve=new formadmin();
$bdd=$cxeleve->baseDeDonnee();

// appel à la fonction de protection des données avec htmlentities -transforme les balises html- et strip_tags -qui supprime les balises-
include('inc/fonction_protection.php');

// requête autorisant une connexion si et seulement si le login et le mot de passe correspondent


	//Lorsque je vais cliquer sur le bouton d'envoi, je rentre dans cette condition.
	if (ISSET($_POST['envoi']))
	{
		//Je mets en place mes règles de sécurité
		if(empty($_POST['login']))
        {
            $error_login_empty = "Le login est obligatoire.";
		}
		else if (!preg_match('/^[a-zA-Z0-9-\'\_]+$/', $_POST['login']) )
		{
			$error_name_wrong =  "Veuillez entrer un login valide.";
		}
		else 
		{
            $login=protection($_POST['login']);
		}
		


		if(empty($_POST['mdp']))
        {
            $error_mdp_empty = "Le mot de passe est obligatoire.";
		} 
		else if (strlen($_POST['mdp']) < 8) 
		{
            $error_mdp_min = "Le mot de passe doit comporter au minimum 8 caractères.";
		} 
		else 
		{
            $mdp = protection($_POST['mdp']);
        }
		


		if(isset($login) && isset($mdp))
        {
            if(!empty($login) && !empty($mdp) )
            {
				$login_clean = htmlspecialchars(strip_tags(trim($login)));
				$mdp_clean = htmlspecialchars(strip_tags(trim($mdp)));
				//SUPER:  $password_hash = password_hash($password_clean, PASSWORD_BCRYPT);

				$rqt="SELECT * FROM user WHERE login_user='".$login_clean."' AND mdp_user='".$mdp_clean."'";
				$rst=$bdd->query($rqt);
				$ligne=$rst->fetch(); 
				$nbligne=$rst->rowCount(); //retourne 1 (revient à dire que le mot de passe et le login sont bons)
				if ($nbligne==1) //si la base de donnée a trouvé un résultat, c'est que le mot de passe et le login sont bons. 
				{

					session_destroy();
					session_start();    //puisque la condition est remplie, j'ouvre une session
					$_SESSION['auth']="yes";
					//$_SESSION['role_user']=$ligne['role_user'];

					//il faut que toutes les données de l'enregistrement venant de la base de données de l'utilisateur soient dans le tableau session pour une utilisation sur toutes les 
					//pages d'après. Je crée donc un foreach qui parcours tous les champs d'un enregistrement et j'attribue chaque valeur de mon enregistrement au tableau session 
					//puis une autodirection se fait vers la page index.php
					foreach($ligne as $champs=>$valeur) 
						{
						$_SESSION["$champs"]=$valeur;
						}
						
					header("location:espace_membre.php");
				}	
			}

		}

	}

?>






<body>


<div id="boite">

<div id="precedent">
		<a href="javascript:history.back()">Précédent</a>
</div>

<div class="attention">
		<p>
		<span>CONNEXION A L'ESPACE ELEVES</span><br><br>
		Attention ! votre <span>"Login"</span> n'est pas votre email.<br>
		</p>
</div>

<div class="form">
		<form action="cxeleve.php"  method="post">
				<input type="text" name="login" placeholder="Login">
				<?php if(isset($error_login_empty)){ echo "<div style='color:red;'>".$error_login_empty."</div>"; } ?>
                <?php if(isset($error_login_wrong)){ echo "<div style='color:red;'>".$error_login_wrong."</div>"; } ?>
				
				<input type="password" name="mdp" placeholder="Mot de passe">
				<?php if(isset($error_mdp_empty)){ echo "<div style='color:red;'>".$error_mdp_empty."</div>"; } ?>
                <?php if(isset($error_mdp_min)){ echo "<div style='color:red;'>".$error_mdp_min."</div>"; } ?>

				<input type="submit" name="envoi" value="ENVOYER">
		</form>
	</div>
	<div class="boutons">
		<p><a href="oublimdp.php">Vous avez oublié votre mot de passe</a></p>
	</div>


</div>



</body>




</html>
