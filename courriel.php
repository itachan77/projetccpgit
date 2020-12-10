<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


<?php
    include("classes/formadmin.php");
?>

</head>



<body>
    
<?php
$nom='MANETTE';
$prenom='Chantal';
$email='eleve@gmail.com';
if (isset($_POST['courriel']))
{
    extract($_POST);
}

?>


<h1 style="text-align:center;">ENVOYER UN EMAIL A <?php echo strtoupper($nom).' '.strtoupper($prenom);?></h1>
<form>
<h2><?php echo date('d m Y');?></h2>
<input type="text" name="objet" id="objet" value="<?php echo 'Message à l\'intention de '.$nom. ''.$prenom.'';?>"><br><br>
<input type="text" name="de" id="de" value="ecolede@musique.com"><br><br>
<input type="text" name="a" id="a" value="<?php $email?>"><br><br>

<textarea name="message" id="" cols="30" rows="10" placeholder="Saisissez ici votre message"></textarea><br>
<input type="submit" value="ENVOYER LE MAIL" />

</form>




</body>
</html>



