<?php
class Formulaire {
private $nom;
private $formulaire=array();
private $decor;


public function __construct($nom,$formulaire,$decor) {
$this->nom=$nom;
$this->formulaire=$formulaire;
$this->decor=$decor;

if($this->decor==$decor)
{echo '<body style="background-color:'.$decor.'"></body>';
}


}

public function display() 
{
    echo '<p style="color:blue;text-align:center;font-size:30px;">';
    echo $this->nom;
    
    echo '</p>
    <br><br>
    <form action="form_reception.php" method="POST">';

    foreach ($this->formulaire as $label)
    {
        echo '
        <label style="display:inline-block;width:80px;" for="'.$label.'">
        '.$label.'</label>';
        
        echo '<input type="text" name="'.$label.'" id="'.$label.'" /><br>';
        
        

    }
    echo '<br><input type="submit" value="ENVOYER"/>';
    echo '</form>';

}

public function couleur($color) {
if($this->decor==$color)
{echo '<body style="background-color:'.$color.'"></body>';
}

}

}


$tableau=array('Nom','Prenom','Adresse','Telephone','Ville');
$monobjet=new Formulaire('Mon nouveau formulaire',$tableau,'yellow');
$monobjet->display();




?>
