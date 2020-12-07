
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

    echo '<pre>'.print_r($_POST,true).'</pre>';





            // INSTANCIATION D'UN NOUVEL OBJET POUVANT FAIRE APPEL AU FORMULAIRE DEFINI DANS LA CLASSE FORMADMIN
            $ceform = new formadmin();
            


            //CONNEXION A LA BASE DE DONNEE FORMADMIN
          //  $ceform->connecte_toiBdformadmin();




            // remplissage du formulaire en fonction des critères de recherche
            $dateinsc=$categoryid=$id=$action=$nom=$prenom=$adresse=$tel1=$tel2=$tel3=$tel4=$email=$prevnom=$prevprenom=$prevadresse=$prevcpville=$prevetel=$category=$infocomp='';
          
if (isset($_POST['creation']))
        {
            if ($_POST['creation']=="Créer une fiche") 
            {
                extract($_POST);
                $id=$_POST['hidden'];
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $adresse=$_POST['adresse'];
                $tel1=$_POST['telephone1'];
                $tel2=$_POST['telephone2'];
                $tel3=$_POST['telephone3'];
                $tel4=$_POST['telephone4'];
                $email=$_POST['email'];
                $category=$_POST['type_cours'];
                $infocomp=$_POST['infocomp'];
                $categoryid=$_POST['hiddencategorie'];


                $idee=$_POST['hidden'];
                

                $bdd=$ceform->baseDeDonnee();
                $res=$bdd->exec ("
                    
                INSERT INTO t_eleve 
                (
                dinscriptionEleve,
                nomEleve,
                prenomEleve,
                naissanceEleve,
                adresseEleve,
                telephone1Eleve,
                telephone2Eleve,
                telephone3Eleve,
                telephone4Eleve,
                emailEleve,
                informationEleve,
                idTuteur,
                idQuestioninstr,
                idCpville,
                idConnupar,
                idCategorie)
        
                VALUES
                (
                '2020-11-01',
                '".$nom."', 
                '".$prenom."',
                '1977-01-27',
                '".$adresse."',
                '".$tel1."',
                '".$tel2."',
                '".$tel3."',
                '".$tel4."',
                '".$email."',
                '".$infocomp."',
                2,
                4,
                2,
                5,
                4
                )");
            
            print_r($bdd->errorinfo());

            }                
            

        }


            


    

        

            //Je donne un nom à mon formulaire
            $titre="CREATION D'UNE NOUVELLE FICHE";


            //avec ma classe personnalisée formadmin, j'attribue "affichage" comme valeur à mon paramètre $type pour que le champs catégorie apparaissent
            //en champ input et non en un champ de selection (le champs de selection sera visible pour le formulaire en mode création avec "creation" en 
            //attribution de valeur)
            $type="creation";




            //le submit du bouton créer une fiche redirige vers le formulaire nvformulaireconcret.php
            $action="nvformulaire.php";


?>

    <!-- $ceform->afficher_formulaire fait appel au formulaire grace à l'appel de la classe formadmin (include) puis de l'instanciation de $ceform  -->
    <div id="contenir">

        <div id="le_formulaire">
            <?php 
            $ceform->afficher_formulaire($dateinsc,$categoryid,$id,$titre,$action,$nom,$prenom,$adresse,$tel1,$tel2,$tel3,$tel4,$email,$prevnom,$prevprenom,$prevadresse,$prevcpville,$prevetel,$category,$infocomp,$type);
            ?>

        </div>

    </div>


</body>
</html> 