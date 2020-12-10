<?php

            echo '<pre>'.print_r($_POST,true).'</pre>';
            echo '<pre>'.print_r($_GET,true).'</pre>';



            //MODIFICATION DE LA BASE DE DONNEE
            if (isset($_POST['modifierFiche'])) //on appuye sur le bouton "modifier cette fiche" pour activer la modification d'informations destinées à aller dans la base de données
            {
                $idee=$_GET['p'];

                extract($_POST);
                $reqinsert="UPDATE t_eleve SET informationEleve='$infocomp' WHERE idEleve=$idee";
                $bdd=$ceform->baseDeDonnee();
                $res=$bdd->query($reqinsert) or die('impossible');
            
            }





?>
