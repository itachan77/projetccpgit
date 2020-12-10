<?php


include("inc/template.php");
?>

<title>Liste de tous des élèves</title>

<style>
#menu_rond {border-radius:50px;background-image:url('images/font.jpg');width:300px;border:1px solid black;margin-left:10px;font-family:Arial;}
#menu_rond a {color:white;text-decoration:none;display:block;text-align:center;margin:10px 10px;font-size:30px;}
#menu_rond a:hover {color:red;}
h1{text-align:center;}
table caption{font-size:30px;text-align:center;font-weight:bold;}


</style>

<?php

$liste = new formadmin();

$bdd=$liste->connectegal('bdformadmin');

$reqsql="
SELECT * FROM t_eleve
";
$rech=$bdd->query($reqsql) or die("Aucun résultat"); 
//$ligne=$rech->Fetch(PDO::FETCH_ASSOC);

$reqcag="
SELECT nomCategorie FROM t_eleve, t_categorie WHERE t_eleve.idCategorie=t_categorie.idCategorie
";
$rech2=$bdd->query($reqcag) or die("Aucun résultat"); 
//$lignecag=$rech2->Fetch(PDO::FETCH_ASSOC);


?>


<h1>Espace Administrateur</h1>

<div id="menu_rond">
    <a href="">Accueil</a>
    <a href="">Les élèves</a>
    <a href="">Créez vos groupes</a>
</div>


<table border=1 width="50%" align=center cellpadding=0 cellspacing=0>
    
        <caption>Liste des élèves</caption>
        <tr>
            <th>Nom</th><th>Prénom</th><th>E.mail</th><th>Téléphone</th><th>Activité</th><th>Paramètres</th>
        </tr>

<?php while ($ligne=$rech->Fetch(PDO::FETCH_ASSOC) AND $lignecag=$rech2->Fetch(PDO::FETCH_ASSOC)) : ?>
    
    <?php   extract ($ligne); 
            extract($lignecag);
    ?>
    
        <tr>
            <td><?= $nomEleve; ?></td><td><?= $prenomEleve; ?></td><td><?= $emailEleve; ?></td>
            <td><?= $telephone1Eleve; ?></td><td><?= $nomCategorie; ?></td><td><a href="formulaire.php?i=<?= $idEleve; ?>">Mode formulaire</a></td>
        </tr>
    

<?php endwhile; ?>

</table>











</body>

</html>