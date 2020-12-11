<?php

class formadmin
{
//déclaration du ou des attributs:
private $bdd;
public $nomCategorie;
public $category;
public $prevnom;
public $champtab=array();



    //éventuelle initialisation de mes attributs pour pouvoir les utiliser lors de l'instanciation d'un objet.
    public function __construct() 
    {
        $this->champtab=array();
    }


    /* A SOLUTIONNER PLUS TARD POUR QUE CETTE FONCTION MARCHE DANS LA CLASSE
    public function affichagerequete() 
    {
        $action=$nom=$prenom=$adresse=$tel1=$tel2=$tel3=$tel4=$email=$prevnom=$prevprenom=$prevadresse=$prevcpville=$prevetel=$category=$infocomp='';
        //FONCTION DE RECHERCHE
        if (isset ($_POST['rechnom']))
        {
            
                if ($_POST['rechnom']!=''||$_POST['rechprenom']!=""||$_POST['rechemail']!=""||$_POST['rechadresse']!=""||$_POST['rechinscrip']!=""||$_POST['rechcodepostal']!="") 
                {
                    //AU SUBMIT, mon formulaire est celui ci si je clique sur recherche
                    $action="formulaire.php";
                    include ('inc/inconnex.php'); 
                    $req=$this->afficherequetesql();
                    $resultat=$bdd->query($req) or die("Aucun résultat"); 
                    $ligne=$resultat->Fetch(PDO::FETCH_ASSOC);
                    $nbligne=$resultat->rowCount();


                    if ($nbligne==1) 
                    {
                        $nom=$ligne['nomEleve'];
                        $prenom=$ligne['prenomEleve'];
                        $adresse=$ligne['adresseEleve'];
                        $tel1=$ligne['telephone1Eleve'];
                        $tel2=$ligne['telephone2Eleve'];
                        $tel3=$ligne['telephone3Eleve'];
                        $tel4=$ligne['telephone4Eleve'];
                        $email=$ligne['emailEleve'];
                        $infocomp=$ligne['informationEleve'];

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
                        


                    }

                    else 

                    {
                        echo $ligne['informationEleve'];
                    }


                }


        }
    }

*/


    //déclaration des méthodes : 
    // '.$this->typeaffichage($type).' == je fais appel à la méthode typeaffichage qui modifie ma catégorie en fonction de ce que je veux
    // avec en paramètre le $type (mode "creation" transforme le champs en select et mode "affichage" transforme le champs en input normal )

    public function afficher_formulaire($dateinsc,$categoryid,$id,$titre,$action,$nom,$prenom,$adresse,$tel1,$tel2,$tel3,$tel4,$email,$prevnom,$prevprenom,$prevadresse,$prevcpville,$prevetel,$category,$infocomp,$type)
    {

    
        
        echo '
        <form action="'.$action.'" method="POST" name="formulaire_admin" enctype="application/x-www-form-urlencoded">
                                    
        <legend class="legend-global-formulaire">'.$titre.'</legend>
                
                    <div id="mesblocs">      
                        
                            <div id="part1">

                                <div class="divfieldset">
                                    <fieldset>        
                                        <legend class="legendeleve">Catégorie:</legend>

                                            '.$this->typeaffichage($type,$category,$categoryid).'
                                                
                                    </fieldset>        
                                </div>

                                <div class="divfieldset">
                                    <fieldset>
                                        <legend class="legendeleve">Elève</legend>
                                            
                                            <div class="a1">
                                                <label for="nom">Nom</label>    
                                                <input type="text" name="nom" id="nom" value="'.$nom.'">
                                                <input type="hidden" name="hidden" id="hidden" value="'.$id.'">

                                                <select name="titre" id="titre">
                                                        <option value="Monsieur">Mr</option>
                                                        <option value="Madame">Mme</option>
                                                        <option value="Mademoiselle">Mlle</option>
                                                        <option value="Enfant">Enfant</option>
                                                </select>                                            
                                            </div>
                                            


                                            <div class="a">
                                            <label for="prenom">Prénom</label>
                                            <input type="text" name="prenom" id="prenom" value="'.$prenom.'">
                                            </div>
                                            
                                            <div class="b">
                                            <label for="naissance">Naissance</label>
                                            <input type="date   " name="naissance" id="naissance">
                                            <input type="number" name="calcage" id="calcage" placeholder="Age"/>
                                            </div>

                                            <div class="c">
                                            <label for="adresse">Adresse</label>
                                            <input type="text" name="adresse" id="adresse" value="'.$adresse.'">
                                            </div>


                                            <div class="d">
                                            <label for="cpville">CPville</label>
                                            <select name="cpville" id="cpville">

                                            '.$this->cpville_in_formu().'
                                            
                                            
                                            </select>
                                            </div>


                                            <div class="e">
                                            <label for="telephone">Téléphone</label>
                                            <input type="text" name="telephone1" id="telephone1" value="'.$tel1.'">
                                            <input type="text" name="telephone2" id="telephone2"value="'.$tel2.'">
                                            <label for="telephone2"></label>
                                            <input type="text" name="telephone3" id="telephone3"value="'.$tel3.'">
                                            <input type="text" name="telephone4" id="telephone4"value="'.$tel4.'">
                                            </div>


                                            <div class="g">
                                            <label for="email">E.mail</label>
                                            <input type="email" name="email" id="email" value="'.$email.'"></label>
                                            </div>

                                    </fieldset>
                                </div>
                                

                                <div class="divfieldset">
                                    <fieldset>
                                        <legend class="legendeleve">Personnes à prévenir</legend>
                                            <div class="boutonscreer">
                                            <label for="prevnom">Nom</label>    
                                            <input type="text" name="prevnom" id="prevnom" value="'.$prevnom.'"><br>
                                            <label for="prevprenom">Prénom</label>
                                            <input type="text" name="prevprenom" id="prevprenom" value="'.$prevprenom.'"><br>
                                            <label for="prevadresse">Adresse</label>
                                            <input type="text" name="prevadresse" id="prevadresse"  value="'.$prevadresse.'"><br>
                                            <label for="prevcpville">CP/Ville</label>
                                            <input type="text" name="prevcpville" id="prevcpville"  value="'.$prevcpville.'"><br>
                                            <label for="prevtel">Téléphone</label>
                                            <input type="text" name="prevtel" id="prevtel"  value="'.$prevetel.'">
                                    </fieldset>
                                </div>
                            </div>

                            <div id="part2">

                                <div class="divfieldset">
                                    <fieldset>
                                        <legend class="legendeleve">Date d\'inscription</legend>
                                        <input type="date" name="dateinscription" id="dateinscription" value="'.$dateinsc.'"><br>
                                            
                                    </fieldset>
                                </div>
                                
                                
                                <div class="divfieldset">
                                
                                    <fieldset>
                                        <legend class="legendeleve">Instrument</legend>
                                            <div class="instr1">
                                            <p class="pinstrument">Avez-vous déjà des connaissances musicales ?</p>
                                            <label class="labelquestion" for="niveau">Si oui quel niveau ?</label>
                                            <input type="text" name="niveau" id="niveau">
                                            </div>
                                            
                                            <div class="instr1">
                                            <p class="pinstrument">Pratiquez-vous un instrument ?</p>
                                            <label class="labelquestion" for="niveau">Si oui lequel ?</label>
                                            <input type="text" name="niveau" id="niveau">
                                            </div>

                                            <div class="instr1">
                                            <p class="pinstrument">Possédez-vous un instrument ?</p>
                                            <label class="labelquestion" for="possede">Si oui lequel ?</label>
                                            <input type="text" name="possede" id="possede">
                                            </div>

                                            <div class="instr1">
                                            <p class="pinstrument">Quel instrument souhaiteriez-vous posséder ?</p>
                                            <input type="text" name="souhaiter" id="souhaiter">
                                            </div>

                                    </fieldset>

                                </div>
                        

                        

                                <div class="divfieldset">
                                    <fieldset>
                                        <legend class="legendeleve">Connu par</legend>
                                            
                                            <p class="pinstrument">Comment avez-vous connu notre école ?</p> 
                                            <select name="mode">
                                                <option value="tract">Tract</option>
                                                <option value="internet">Internet</option>
                                                <option value="connaissance">Connaissance</option>
                                            </select>
                                            

                                            <label class="connuautre" for="possede">Autre</label>
                                            <input type="text" name="connuautre" id="connuautre">

                                    </fieldset>
                                </div>
                            </div>


                            <div id="part4">
                                <div class="divfieldset">
                                    <fieldset>
                                        <legend class="legendeleve">Informations supplémentaires</legend>
                                        <textarea name="infocomp" id="infocomp" cols="47" rows="32" value="infocomp" maxlenght="500">'.$infocomp.'</textarea>
                                        
                                    </fieldset>
                                </div>

                            </div>

                    </div>

                
</div>            
</div>
</div>



<div id="part3">

<details>
    <summary><legend class="legendeparametres">MON APPLICATION</legend></summary>
        <div class="divfieldsetp">
            <fieldset>
            <a href="theme.php">CHOISIR UN THEME</a>
            </fieldset>
        </div>
</details>


<details>
    <summary><legend class="legendeparametres">MODE AFFICHAGE</legend></summary>
        <div class="divfieldsetp">
            <fieldset>

            
            <div>
            <div id="mode_liste"><a style="text-align:center;" href="liste.php">Mode liste</a></div>
            <div id="mode_form"><a style="text-align:center;" href="liste.php">Mode formulaire</a></div>
            </div>

            </fieldset>
        </div>
</details>

            


<details>
    <summary><legend class="legendeparametres">ACTIONS</legend></summary>
        <div class="divfieldsetp">
            <fieldset>

            <!-- class boutonscreer dans input qui permet de modifier ces boutons de manière personnalisée -->
            <div class="action_submit">
                <a href="nvformulaire.php">AJOUTER UN ELEVE</a>
                <input class="b1" type="submit" name="creation" id="toutselec" value="Valider"></br>
                
                <a href="formulaire.php?p='.$id.'">SUPPRIMER CET ELEVE</a>
            </div>

            </fieldset>
        </div>
</details>



<details>
    <summary><legend class="legendeparametres">CREER ET ENVOYER</legend></summary>
        <div class="divfieldsetp">
            <fieldset>
                
                    
                    <!-- class boutonscreer dans input qui permet de modifier ces boutons de manière personnalisée -->
                    <div class="boutonscreer">
                        <input class="lettre" type="button" name="lettre" id="lettre" value="Lettre">
                        <input class="courriel" type="submit" name="courriel" id="courriel" value="Courriel">
                        <input class="enveloppe" type="button" name="enveloppe" id="enveloppe" value="Enveloppe">
                        <input class="sms" type="button" name="sms" id="sms" value="SMS">
                    </div>
            </fieldset>
        </div>
</details>




<details>
    <summary><legend class="legendeparametres">RECHERCHER</legend></summary>   
        <div class="divfieldsetp">
            <fieldset>    
        

                <a href="formulaire.php">RECHERCHER UNE FICHE</a><br>
                
                            <div class="gridendeux">
                                <div class="a1">
                                    <div>
                                    <label class="rechnom" for="rechnom">Nom</label>
                                    <input type="search" name="rechnom" id="rechnom" size="30%">
                                    </div>  
                                    
                                    <div>
                                    <label class="rechprenom" for="rechprenom">Prénom</label>
                                    <input type="search" size="30%" name="rechprenom">
                                    </div>

                                    <div>
                                    <label class="rechadresse" for="rechadresse">Adresse</label>
                                    <input type="search" size="30%" name="rechadresse">
                                    </div>
                                </div>

                                <div class="b1">
                                    <div>
                                    <label class="rechinscrip" for="rechinscrip">Date d\'inscription</label>
                                    <input type="search" size="30%" name="rechinscrip">
                                    </div>

                                    <div>
                                    <label class="rechemail" for="rechemail">Courriel</label>
                                    <input type="search" size="30%" name="rechemail">
                                    </div>

                                    <div>
                                    <label class="rechcodepostal" for="rechcodepostal">Code postal</label>
                                    <input type="search" size="30%" name="rechcodepostal">
                                    </div>
                                </div>
                            </div>
                                <div class="width60">
                                    <div class="c1">
                                        <div>
                                        
                                        <input type="submit" name="recherche" id="maRecherche" value="RECHERCHER">
                                        
                                        
                                        </div>
                                        
                                        <div class="suivprec">
                                        // <input type="button" name="precedent" id="precedent" value="Précédent">
                                        <input type="button" name="suivant" id="suivant" value="Suivant">
                                        </div>
                                    </div>
                                </div>
                            
                    
                            
                </div>
                
            </fieldset>
        </div> 
</details>

    </form>

    ';

    }




    public function baseDeDonnee() //MARCHE****se connecte à la base de données bdformadmin
    {    
        
        $this->bdd=new PDO('mysql:host=localhost;dbname=bdformadmin;charset=utf8','root','');
        return $this->bdd;

    }



    public function connecte_toiBdformadmin () //MARCHE****se connecte à la base de données bdformadmin
    {    

        //pour moins de lourdeur, j'aurais pu remplacer $this->bdd par $this->baseDeDonnee
        try{
        $this->bdd=new PDO('mysql:host=localhost;dbname=bdformadmin;charset=utf8','root','');
        }
        catch (Exception $e) {
            die($e->getMessage());
        }

    }




    // type correspond au type de catégorie |piano,violon..| qu'on veut voir s'afficher (en mode select si formulaire en mode creation et/ou modification)
    // (en mode input text si formulaire en mode affichage)
    // $categoryid:2ème mise. je crée un input de type hidden que je nomme "hiddencategorie" et qui sera donc visible sur mon $_POST pour récupérer 
    // via ce tableau $_POST l'id de la catégorie de ma table t_eleve (idCategorie)
    private function typeaffichage($type,$category,$categoryid) {
        
        if ($type=="affichage") 
        {
            $montype='<input type="text" name="type_cours" id="type_cours" value="'.$category.'">';
        }


        elseif ($type=="creation" | $type=="modification") 
        {
            $montype=
            '<input type="hidden" name="hiddencategorie" id="hiddencategorie" value="'.$categoryid.'">
            
            
            
            <select name="type_cours">

            '.$this->categorie_in_formu($category,$categoryid).'
            
            </select>';
        }

        return $montype;

    }




    public function afficherequetesql() //MARCHE**** superfonction affichant les données d'un élève dans le formulaire en fonction des divers critères 
    //de recherche $name devra prendre la valeur de spostrechnom
    {
        if (isset($_POST)) 
        {
            extract($_POST);

            if ($rechnom !="")
            {
                $and="AND";
                $rjnom=$rechnom!="" ? "nomEleve='".$rechnom."' "                   :""; 
                $rjprenom=$rechprenom!="" ?  $and. " prenomEleve='".$rechprenom."' "    :"";
                $rjemail=$rechemail!=""    ? $and. " emailEleve='".$rechemail."' "      :"";
                $rjadresse=$rechadresse!="" ? $and. " adresseEleve='".$rechadresse."' "  :"";
                $rjdinscrip=$rechinscrip!="" ? $and. " dinscriptionEleve='".$rechinscrip."' " :"";
                global $rec;
                $rec='SELECT * FROM t_eleve WHERE '.$rjnom .$rjprenom .$rjemail .$rjadresse .$rjdinscrip.'';
            }

            elseif ($rechprenom !="")
            {
                $prenomand=""; $and="AND";$rechnom=isset($rechnom)?$rechnom:'';
                $rjnom=$rechnom!="" ? "nomEleve='".$rechnom."' "                   :""; 
                $rjprenom=$rechprenom!="" ?  $prenomand. " prenomEleve='".$rechprenom."' "    :"";
                $rjemail=$rechemail!=""    ? $and. " emailEleve='".$rechemail."' "      :"";
                $rjadresse=$rechadresse!="" ? $and. " adresseEleve='".$rechadresse."' "  :"";
                $rjdinscrip=$rechinscrip!="" ? $and. " dinscriptionEleve='".$rechinscrip."' " :"";
                global $rec;
                $rec='SELECT * FROM t_eleve WHERE '.$rjnom .$rjprenom .$rjemail .$rjadresse .$rjdinscrip.'';

            }

            elseif ($rechemail !="")
            {
                $emailand=""; $and="AND";$rechnom=isset($rechnom)?$rechnom:'';
                $rjnom=$rechnom!="" ? "nomEleve='".$rechnom."' "                   :""; 
                $rjprenom=$rechprenom!="" ?  $and. " prenomEleve='".$rechprenom."' "    :"";
                $rjemail=$rechemail!=""    ? $emailand. " emailEleve='".$rechemail."' "      :"";
                $rjadresse=$rechadresse!="" ? $and. " adresseEleve='".$rechadresse."' "  :"";
                $rjdinscrip=$rechinscrip!="" ? $and. " dinscriptionEleve='".$rechinscrip."' " :"";
                global $rec;
                $rec='SELECT * FROM t_eleve WHERE '.$rjnom .$rjprenom .$rjemail .$rjadresse .$rjdinscrip.'';

            }

            elseif ($rechadresse !="")
            {
                $adresseand=""; $and="AND";$rechnom=isset($rechnom)?$rechnom:'';
                $rjnom=$rechnom!="" ? "nomEleve='".$rechnom."' "                   :""; 
                $rjprenom=$rechprenom!="" ?  $and. " prenomEleve='".$rechprenom."' "    :"";
                $rjemail=$rechemail!=""    ? $and. " emailEleve='".$rechemail."' "      :"";
                $rjadresse=$rechadresse!="" ? $adresseand. " adresseEleve='".$rechadresse."' "  :"";
                $rjdinscrip=$rechinscrip!="" ? $and. " dinscriptionEleve='".$rechinscrip."' " :"";
                global $rec;
                $rec='SELECT * FROM t_eleve WHERE '.$rjnom .$rjprenom .$rjemail .$rjadresse .$rjdinscrip.'';

            }

            elseif ($rechinscrip !="")
            {
                $inscripand=""; $and="AND";$rechnom=isset($rechnom)?$rechnom:'';
                $rjnom=$rechnom!="" ? "nomEleve='".$rechnom."' "                   :""; 
                $rjprenom=$rechprenom!="" ?  $and. " prenomEleve='".$rechprenom."' "    :"";
                $rjemail=$rechemail!=""    ? $and. " emailEleve='".$rechemail."' "      :"";
                $rjadresse=$rechadresse!="" ? $and. " adresseEleve='".$rechadresse."' "  :"";
                $rjdinscrip=$rechinscrip!="" ? $inscripand. " dinscriptionEleve='".$rechinscrip."' " :"";
                global $rec;
                $rec='SELECT * FROM t_eleve WHERE '.$rjnom .$rjprenom .$rjemail .$rjadresse .$rjdinscrip.'';
            }

            return $rec;

        }

    }




    public function categorie_in_formu($category,$categoryid) //MARCHE**** Affiche toutes les catégories de ma base de données dans un formulaire de type liste
    {
        
        $this->connecte_toiBdformadmin ();
        
        //RECHERCHE DE LA CATEGORIE A PARTIR DE LA TABLE CATEGORIE
        $req="SELECT nomCategorie, idCategorie FROM t_categorie"; 
        $resultat=$this->bdd->query($req); 
        $tabcategorie=$resultat->fetch(PDO::FETCH_ASSOC) or die('requete impossible');
        







        $html='';

            // while ($tabcategorie=$resultat->fetch(PDO::FETCH_ASSOC) ) 
            // {
            //     extract($tabcategorie);
            //     $html.='<option value="'.$nomCategorie.'">'.$nomCategorie.'</option>';
            // }
            

            while ($tabcategorie=$resultat->fetch(PDO::FETCH_ASSOC) ) 
            {

                $nomCategorie=$tabcategorie['nomCategorie'];
                $idCategorie=$tabcategorie['idCategorie'];

                if ($idCategorie==$categoryid){$selected="selected";}
                else {$selected="";}
//$html.='<option value="'.$nomCategorie.'"'.$selected.'>'.$idCategorie.' '.$nomCategorie.'</option>';

//lors du post, c'est la valeur qu'il ya  écrit dans l'attribut value qui va être prise en compte. 
//Puisqu'on  ne peut faire autrement que d'attribuer uen valeur numérique à idCatégorie de la table t_eleve, il faut donc que 
// value soit une valeur numérique et non alpha sinon il y aura toujours une erreur (car un id ne peut être alphabétique)
                        $html.='<option value="'.$idCategorie.'"'.$selected.'>'.$nomCategorie.'</option>';
                    

                
            }

        return $html;
    }

    //dupont saxophone
    //manette violon
    // guerin eveil musical




    public function cpville_in_formu() //MARCHE**** Affiche tous les codes postaux et villes de ma base de données
    {
        $this->connecte_toiBdformadmin ();
        $reqcpville="SELECT libCpville FROM cpville"; 
        $resultat=$this->bdd->query($reqcpville); 
        $tabcpville=$resultat->fetch(PDO::FETCH_ASSOC) or die('requete impossible');
        $html='';

            while ($tabcpville=$resultat->fetch(PDO::FETCH_ASSOC) ) 
            {
                extract($tabcpville); 
                $html.='<option value="libCpville">'.$libCpville.'</option>';
            }

        return $html;
    }





    public function connecteToi ($name) //MARCHE****idéal pour tester une connexion de ma base de données bdformadmin  dans un autre fichier que mon projet 
    {    
        try{
        $this->bdd=new PDO('mysql:host=localhost;dbname=bdformadmin;charset=utf8','root','');
        }
        catch (Exception $e) {
            die($e->getMessage());
        }

        $reqsql="
            SELECT * FROM t_eleve WHERE nomEleve='$name'
            ";

        $rech=$this->bdd->query($reqsql) or die('impossible');
        $ligne=$rech->Fetch(PDO::FETCH_ASSOC);
        echo '<pre> '.print_r($ligne, true).'</pre>';

    }



    public function connectegal ($name) //MARCHE****idéal pour tester une connexion de ma base de données bdformadmin  dans un autre fichier que mon projet 
    {
        $this->bdd=new PDO('mysql:host=localhost;dbname='.$name.';charset=utf8','root','');
        return $this->bdd;
    }






}




/********Methode Setage qui ne sera pas utilisée mais utile pour comprendre le setter (cf.COMMENTAIRE1)***/
// public function Setage($age)
// {
// if ($age<=18)
// {echo 'Ma taille est '.$this->taille=$age*2;}
// else
// {echo 'Ma taille est '.$this->taille=$age*10;}
// }
/******Fin de la Methode Setage******************************************************************/


/***COMMENTAIRE1 : si le but de ma fonction est d'afficher le taille en fonction de l'age, mais si j'attribue une valeur à l'attribut 'age' car j'ai oublié
que la taille ne se calculait qu'en fonction d'un calcul spécifique (ici $age*2 ou $age*10 selon qu'on plus de 18 ans ou pas), je vais 'casser' ma fonction. 
c'est pourquoi il est toujours important de mettre que l'attribut est private (plutot que public) pour que j'ai un message d'erreur, m'empechant
ainsi de 'casser' la machine et qu'elle continue à fonctionner.
SI JE VEUX CHANGER QUAND MEME un attribut tout en gardant mon private, il faut utiliser un SETTER (modifier un age en le passant en paramètre ?)
de la facon suivante : 
$champs->age=12; : en private  je ne peux PLUS faire ça
$champs->Setage(12) : en revanche, je peux faire ça.

$champs=new formadmin('monnom','monprenom','monadresse',74,'itachan77@orange.fr');

$champs->AfficheInfos();*/




?>


