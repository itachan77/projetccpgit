
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style_perso.css">

	<?php
    include("classes/formadmin.php");
    ?>
    
</head>

<body>

<?php
//LES INFOS DE LA PAGE PRECEDENTES SONT RECUPERES GRACE A L'ID INDIQUE EN PARAMETRE DE L'URL QUAND JE CLIQUE SUR MODIFIERE CETTE FICHE ET 
// (J'AI INSTANCIE CET ID DANS LA CLASSE FORMADMIN)









            echo '<pre>'.print_r($_POST,true).'</pre>';
            echo '<pre>'.print_r($_GET,true).'</pre>';


            // INSTANCIATION D'UN NOUVEL OBJET POUVANT FAIRE APPEL AU FORMULAIRE DEFINI DANS LA CLASSE FORMADMIN
            $ceform = new formadmin();
            


            //CONNEXION A LA BASE DE DONNEE FORMADMIN
            $ceform->connecte_toiBdformadmin();








            
           

//            if (isset($_POST['modifierFiche'])) //on appuye sur le bouton "modifier cette fiche" pour activer la modification d'informations destinées à aller dans la base de données
//            {
//            }

            // remplissage du formulaire en fonction des critères de recherche
            $id=$action=$nom=$prenom=$adresse=$tel1=$tel2=$tel3=$tel4=$email=$prevnom=$prevprenom=$prevadresse=$prevcpville=$prevetel=$category=$infocomp='';
            



            //MODIFICATION DE LA BASE DE DONNEE
            $bdd=$ceform->baseDeDonnee();
            $idee=$_GET['p'];
            echo $idee;
            





            
            extract($_POST);
            $reqinsert="UPDATE t_eleve SET informationEleve='$infocomp' WHERE idEleve=$idee";
            
            $res=$bdd->query($reqinsert) or die('impossible');



            //Je donne un nom à mon formulaire
            $titre="VEUILLEZ MODIFIER VOTRE FICHE";            


            //avec ma classe personnalisée formadmin, je fais appel à la méthode afficher_formulaire et j'attribue "modification" comme valeur 
            //à mon paramètre $type pour que le champs catégorie apparaisse
            //en un champ de selection et non en champ input (où il faut mettre plutot "affichage")
            $type="modification";




            //le submit du bouton créer une fiche redirige vers le formulaire nvformulaireconcret.php
            $action="updateformulaire.php?p=".$idee;


?>

    <!-- $ceform->afficher_formulaire fait appel au formulaire grace à l'appel de la classe formadmin (include) puis de l'instanciation de $ceform  -->
    <div id="contenir">

        <div id="le_formulaire">
            <?php 
            $ceform->afficher_formulaire($categoryid,$id,$titre,$action,$nom,$prenom,$adresse,$tel1,$tel2,$tel3,$tel4,$email,$prevnom,$prevprenom,$prevadresse,$prevcpville,$prevetel,$category,$infocomp,$type);
            ?>

        </div>

    </div>


</body>
</html> 