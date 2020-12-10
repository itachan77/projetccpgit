<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace membre</title>
</head>
<body>


    <?php session_start(); 



if (isset($_GET['d']))
{
    if ($_GET['d']=="destroy")
        {
            session_destroy();
            echo 'Vous avez été déconnectée';
        }

}

if (isset($_SESSION['nom_user']))
{

    echo '<pre>'.print_r($_SESSION, true).'</pre>';

    if ($_SESSION['auth']=="yes")

    {
        if ($_SESSION['role_user']=="USER")
        {


            echo '<a href="espace_membre.php?d=destroy">Se déconnecter</a>';
            echo '<p>BONJOUR utilisateur '.$_SESSION['nom_user'].' '.$_SESSION['prenom_user'].' BIENVENUE DANS VOTRE ESPACE MEMBRE</p>';
            echo $_SESSION['role_user'];
            
        }

        elseif ($_SESSION['role_user']=="ADMIN")

        {
            echo '<script>alert("Vous êtes administrateur, vous ne pouvez pas accéder à cette page");</script>';

        }

    }
}
else 
{
echo 'vous ne pouvez pas accéder à cette page';
}
    




    ?>
</body>
</html>