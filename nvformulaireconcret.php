<?php
include("classes/formadmin.php");
$nvform = new formadmin();

//CONNEXION A LA BASE DE DONNEE FORMADMIN


try{
    $bdd=new PDO('mysql:host=localhost;dbname=bdformadmin;charset=utf8','root','');
    }
    catch (Exception $e) {
        die($e->getMessage());
    }

echo '<pre>'.print_r($_POST,true).'</pre>';

if (isset($_POST))
            {
                extract($_POST);

                $insert="
                INSERT INTO t_eleve (
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
                    idTuteur,
                    idQuestioninstr,
                    idCpville,
                    idCategorie,
                    idConnupar)
                    
                    VALUES (
                    '".$nom."',
                    '".$nom."',
                    '".$prenom."',
                    '".$adresse."',
                    '".$telephone1."',
                    '".$telephone2."',
                    '".$telephone3."',
                    '".$telephone4."',
                    '".$email."'
                    )

                ";
            }


            




            echo $insert;

            $resultat=$bdd->exec($insert) or die("Aucune insertion"); 

    $insert = $bdd->exec("
    INSERT INTO animal
    (espece, sexe, date_naissance, nom)
    VALUES (
        '".$espece."',
        '".$sexe."',
        '".$date."',
        '".$nom."'
    )
");         


?>