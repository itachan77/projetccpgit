
<?php

session_start();

//CONTIENT LE TEMPLATE HTML ET LE INCLUDE DE LA CLASSE FORMADMIN
include("inc/template.php");
include("classes/Courriel.php");
?>

<title>Formulaire administrateur</title>
</head>


<body>

<?php

echo '<pre>'.print_r($_POST,true).'</pre>';

        // INSTANCIATION D'UN NOUVEL OBJET POUVANT FAIRE APPEL AU FORMULAIRE DEFINI DANS LA CLASSE FORMADMIN
        $ceform = new formadmin();
        

        
        


        // CONNEXION A MA BASE DE DONNEE FORMADMIN GRACE A MA CLASSE FORMADMIN
        $bdd=$ceform->baseDeDonnee();


        // MODELE DE REQUETE TRIPLE (REQUETE SQL - RECHERCHE OU EXECUTION DE LA REQUETE - AFFICHAGE DE LA LIGNE DE RESULTAT)

        // $reqsql="SELECT * FROM t_eleve WHERE nomEleve='MANETTE'";
        // $res=$bdd->query($reqinsert) or die('impossible');  
        // $ligne=$rech->Fetch(PDO::FETCH_ASSOC);



    //    echo '<pre>'.print_r($_POST,true).'</pre>';
    //    echo '<pre>'.print_r($_GET,true).'</pre>';



        // remplissage du formulaire en fonction des critères de recherche
        $dateinsc=$categoryid=$id=$action=$nom=$prenom=$adresse=$tel1=$tel2=$tel3=$tel4=$email=$prevnom=$prevprenom=$prevadresse=$prevcpville=$prevetel=$category=$infocomp='';
            


        
        // lorsque je clique sur un submit, plutot que de me diriger sur une page de modification, je préfère pour des questions de confort 
        // pour l'utilisateur, que dès qu'une nouvelle modification d'information est saisie sur la page d'affichage du formulaire, que cette 
        // modification soit d'emblée effectuée. 

        // pour ce faire, dès qu'on appuye sur n'importe quel autre bouton, les données du $_POST sont transmises vers la base de donnée au moyen
        // de update. Il y a deux tours de passe-passe pour plus de sécurité : 
        // exemple: $_POST ('telephone1') donne sa valeur à $tel1 
        // puis  $tel1 donne sa valeur à telephone1Eleve, champs de la base de données.




        if (isset($_POST['courriel']))
        {
            if (isset($_POST['email']))
            {
                $email=$_POST['email'];
            }
            
        // INSTANCIATION D'UN NOUVEL OBJET FORMULAIRE DE COURRIEL
        $formcourriel = new Courriel('raphael.italiano@wanadoo.fr',$email);
        }

        if (isset($_GET['i']))
        {

            $recupid=$_GET['i'];
            $bdd=$ceform->baseDeDonnee();
            $reqget="SELECT * FROM t_eleve WHERE idEleve=$recupid";
            $rst=$bdd->query($reqget) or die('modification impossible');
            $ligne=$rst->Fetch(PDO::FETCH_ASSOC);
            $nb=$rst->rowCount();


            if ($nb>0) 
            {
                $id=$ligne['idEleve'];
                $nom=$ligne['nomEleve'];
                $prenom=$ligne['prenomEleve'];
                $adresse=$ligne['adresseEleve'];
                $tel1=$ligne['telephone1Eleve'];
                $tel2=$ligne['telephone2Eleve'];
                $tel3=$ligne['telephone3Eleve'];
                $tel4=$ligne['telephone4Eleve'];
                $email=$ligne['emailEleve'];
                $infocomp=$ligne['informationEleve'];
                $categoryid=$ligne['idCategorie'];
                $dateinsc=$ligne['dinscriptionEleve'];
            }

        }




        if (isset($_POST))
        {
            if (!empty($_POST['hidden'])) 
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
                $dateinsc=$_POST['dateinscription'];


                $idee=$_POST['hidden'];
                

                $reqinsert="UPDATE t_eleve SET 
                informationEleve='$infocomp',
                nomEleve='$nom', 
                prenomEleve='$prenom',
                adresseEleve='$adresse',
                telephone1Eleve='$tel1',
                telephone2Eleve='$tel2',
                telephone3Eleve='$tel3',
                telephone4Eleve='$tel4',
                idCategorie=$categoryid,
                emailEleve='$email',
                dinscriptionEleve='$dateinsc'
                
                
                

                WHERE idEleve=$idee";
                $bdd=$ceform->baseDeDonnee();
                $res=$bdd->query($reqinsert) or die('modification impossible');  

            }

        }





// SUPPRIMER UNE FICHE EN RECUPERANT L'ID DE L'ELEVE

        if (isset($_GET['p'])) 
        {
            $lid=$_GET['p'];
            $reqsupp="";
            echo $reqsupp;  
            $bdd=$ceform->baseDeDonnee();
            
            $res=$bdd->exec("
            
            DELETE FROM t_eleve WHERE idEleve=$lid
            
            ");


            print_r($bdd->errorinfo());

        //    header('formulaire.php');
        
        }



        

            //Je donne un nom à mon formulaire
            $titre="RECHERCHER UNE FICHE";




            //le submit du bouton rechercher redirige vers ce meme formulaire.php
            



            //avec ma classe personnalisée formadmin, j'attribue "affichage" comme valeur à mon paramètre $type pour que le champs catégorie apparaissent
            //en champ input et non en un champ de selection (le champs de selection sera visible pour le formulaire en mode création avec "creation" en 
            //attribution de valeur)
            $type="modification";



            //FONCTION DE RECHERCHE GRACE A LA METHODE "afficherequetesql()" ($req=$ceform->afficherequetesql();)
            if (isset ($_POST['rechnom']))
            {
                

                    if ($_POST['rechnom']!=''||$_POST['rechprenom']!=""||$_POST['rechemail']!=""||$_POST['rechadresse']!=""||$_POST['rechinscrip']!=""||$_POST['rechcodepostal']!="") 
                    {
                        
                        $action="formulaire.php";//AU SUBMIT, mon formulaire est celui ci si je clique sur recherche
                        
                        //  include ('inc/inconnex.php'); 
                        $bdd=$ceform->baseDeDonnee(); //remplace le include. $bdd est défini dans la méthode baseDeDonnee() dans la classe formadmin

                        $req=$ceform->afficherequetesql();   //cette méthode se trouve dans la classe formadmin et sans cette méthode, ma requete de recherche ne peut fonctionner car $req serait alors indéfinie
                        $resultat=$bdd->query($req) or die("Aucun résultat"); 
                        $ligne=$resultat->Fetch(PDO::FETCH_ASSOC);
                        $nbligne=$resultat->rowCount();


                        if ($nbligne>0) 
                        {
                            $id=$ligne['idEleve'];
                            $nom=$ligne['nomEleve'];
                            $prenom=$ligne['prenomEleve'];
                            $adresse=$ligne['adresseEleve'];
                            $tel1=$ligne['telephone1Eleve'];
                            $tel2=$ligne['telephone2Eleve'];
                            $tel3=$ligne['telephone3Eleve'];
                            $tel4=$ligne['telephone4Eleve'];
                            $email=$ligne['emailEleve'];
                            $infocomp=$ligne['informationEleve'];
                            $categoryid=$ligne['idCategorie'];
                            $dateinsc=$ligne['dinscriptionEleve'];
                            



                            //AFFICHAGE DES INFOS SUR LE TUTEUR TUTEUR
                            if ($prevnom=="") 
                            {
                            $req="SELECT * FROM t_eleve, t_tuteur WHERE t_eleve.idTuteur=t_tuteur.idTuteur AND nomEleve='$nom'"; include ('inc/res.php');if ($nbligne==1) {foreach ($tabenreg as $valeur){if ($valeur==$nomTuteur){$prevnom=$tabenreg['nomTuteur'];echo $prevnom;}}}}

                            if($prevprenom=="")
                            {
                            $req="SELECT * FROM t_eleve, t_tuteur WHERE t_eleve.idTuteur=t_tuteur.idTuteur AND nomEleve='$nom'"; include ('inc/res.php');if ($nbligne==1) {foreach ($tabenreg as $valeur){if ($valeur==$prenomTuteur){$prevprenom= $tabenreg['prenomTuteur'];echo $prevprenom;}}}
                            }

                            if($prevadresse=="")
                            {
                            $req="SELECT * FROM t_eleve, t_tuteur WHERE t_eleve.idTuteur=t_tuteur.idTuteur AND nomEleve='$nom'"; include ('inc/res.php');if ($nbligne==1) {foreach ($tabenreg as $valeur){if ($valeur==$adresseTuteur){$prevadresse= $tabenreg['adresseTuteur'];echo $prevadresse;}}}
                            }

                            if($prevcpville=="")
                            {
                            $req="SELECT * FROM t_eleve, t_tuteur, cpville WHERE t_eleve.idTuteur=t_tuteur.idTuteur AND nomEleve='$nom' AND cpville.idCpville=t_tuteur.idCpville"; include ('inc/res.php');if ($nbligne==1) {foreach ($tabenreg as $valeur){if ($valeur==$libCpville){$prevcpville= $tabenreg['libCpville'];echo $prevcpville;}}}

                            }


                            if($prevetel=="")
                            {
                            $req="SELECT * FROM t_eleve, t_tuteur WHERE t_eleve.idTuteur=t_tuteur.idTuteur AND nomEleve='$nom'"; include ('inc/res.php');if ($nbligne==1) {foreach ($tabenreg as $valeur){if ($valeur==$telTuteur){$prevetel= $tabenreg['telTuteur'];echo $prevetel;}}}

                            }


                            //AFFICHER LA CATEGORIE CONCERNEE
                            if ($category=="")
                            {
                            $req="SELECT nomCategorie FROM t_eleve, t_categorie WHERE t_eleve.idCategorie=t_categorie.idCategorie AND nomEleve='$nom'"; include ('inc/res.php');if ($nbligne==1) {foreach ($tabenreg as $valeur){if ($valeur==$nomCategorie){$category=$tabenreg['nomCategorie'];echo $category;}}}
                            }


                            
                            //RECUPERATION DE l'ID DE LA CATEGORIE

                            //$categoryid : 1ère mise. J'ai constaté que l'information sur la catégorie n'était pas stockée et ce parce que l'idCategorie correspondait à un chiffre et non à un string. 
                            // il fallait donc récupérer la valeur de l'idCategorie (dans le $_POST pour que la valeur puisse ensuite être modifiée dans la base de donnée).
                            // J'ai donc mis dans un champs hidden dans la méthode typeaffichage() l'idCategorie qui est transmise grace à la requete ci-dessous à la variable $categorieid.
                            
                            
                            if ($category=="")
                            {
                            $req="SELECT idCategorie FROM t_eleve, t_categorie WHERE t_eleve.idCategorie=t_categorie.idCategorie AND nomEleve='$nom'"; include ('inc/res.php');if ($nbligne==1) {foreach ($tabenreg as $valeur){if ($valeur==$idCategorie){$categoryid=$tabenreg['idCategorie'];echo $categoryid;}else{$categoryid="";}}}
                            }
                            


                        }
                    }
                    

            }


            ?>




    <div id="contenir">

        <div id="le_formulaire">
            <?php 
            
            
            $ceform->afficher_formulaire($dateinsc,$categoryid,$id,$titre,$action,$nom,$prenom,$adresse,$tel1,$tel2,$tel3,$tel4,$email,$prevnom,$prevprenom,$prevadresse,$prevcpville,$prevetel,$category,$infocomp,$type);

            ?>

        </div>

    </div>


</body>
</html>