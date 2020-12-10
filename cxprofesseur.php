
<?php
//CONTIENT LE TEMPLATE HTML ET LE INCLUDE DE LA CLASSE FORMADMIN
include("inc/template.php");
?>
<title>Connexion à l'espace professeur</title>
</head>

<body>

<?php
//echo '<pre>'.print_r($_POST,true).'</pre>';
// INSTANCIATION D'UN NOUVEL OBJET POUVANT FAIRE APPEL AU FORMULAIRE DEFINI DANS LA CLASSE FORMADMIN
$ceform = new formadmin();


// CONNEXION A MA BASE DE DONNEE FORMADMIN GRACE A MA CLASSE FORMADMIN
$bdd=$ceform->baseDeDonnee();


// Appel à la fonction de protection des données avec htmlentities -transforme les balises html- et strip_tags -qui supprime les balises-
include('inc/fonction_protection.php');


// requête autorisant une connexion si et seulement si le login et le mot de passe correspondent

$mauvais="";
$errorslogin=$errorsmdp="";
if (ISSET ($_POST['login']) AND ($_POST['mdp'])) 
	{
		if ($_POST['login']!="" AND $_POST['mdp']!="" )
		{
				$login=protection($_POST['login']);		//appel à la fonction protection crée et située dans le fichier fonction_protection.php
    			$mdp=protection($_POST['mdp']);		//idem
			
				$rqt="SELECT * FROM user WHERE login_user='".$login."' AND mdp_user='".$mdp."'";
				$rst=$bdd->query($rqt);
				$nbligne=$rst->rowCount();
				if ($nbligne==1) 
					{
						header('location:formulaire.php');
					}
				else 
				{
					$mauvais='<span style="color:red;margin-bottom:20px;margin-top:-40px;">Votre mot de passe et/ou votre login sont incorrects</span><br>';
					
				}
	
		}	

			elseif (empty($_POST['login']) || ($_POST['mdp']))
			{
			
				if (empty($_POST['mdp']))
				{
					$errorsmdp='<span style="color:red;">Veuillez entrer votre mot de passe</span>'; 
				}
			
				if (empty($_POST['login']))
				{
					$errorslogin='<span style="color:red;">Veuillez entrer votre login</span>'; 
					
				}
			}

	}	





?>



	<div id="boite">

		<div id="precedent">
			<a href="javascript:history.back()">Précédent</a>
		</div>
			

		<div class="attention">
				<p>
				<?php echo $mauvais; ?>
				
				<span>CONNEXION A L'ESPACE PROFESSEUR</span><br><br> <?php echo $errorslogin; ?>
				
				Attention ! votre <span>"Login"</span> n'est pas votre email.<br>
				
				
				</p>
		</div>

		<div class="form">
			<form action="cxprofesseur.php"  method="post">
					<input type="text" name="login" placeholder="Login"/>
					<?php echo $errorslogin; ?>
					<input type="password" name="mdp" placeholder="Mot de passe"/>
					<?php echo $errorsmdp; ?>
					<input type="submit">
			</form>
		</div>

		<div class="boutons">
			<p><a href="oublimdp.php">Vous avez oublié votre mot de passe</a></p>
		</div>


	</div>

</body>

</html>
