<?php

Class Courriel 
{

    private $de;
    private $a;
    private $objet;
    private $message;

    public function __construct ($de,$a)
    {

        $this->de=$de;
        $this->a=$a;
        $this->objet;
        $this->message;
    


        echo '
            <form action="" method="POST">

            <label for="'.$this->a.'">A : </label>
            <input type="text" name="'.$this->a.'" id="'.$this->a.'" value="'.$this->a.'" placeholder="Saisissez ici l\'adresse email du destinataire">
            
            <label for="'.$this->de.'">De : </label>
            <input type="text" name="'.$this->de.'" id="'.$this->de.'" value="'.$this->de.'" placeholder="Saisissez ici votre adressee email">
            
            <label for="'.$this->objet.'">Objet : </label>
            <input type="text" name="'.$this->objet.'" id="'.$this->objet.'" value="'.$this->objet.'" placeholder="Objet du message">
            
            <label for="'.$this->message.'">Texte : </label>
            <textarea name="'.$this->message.'" id="" cols="30" rows="30" placeholder="Placez ici le contenu de votre message"></textarea>
            
            <input type="submit" value="Envoyer">

        </form>

        ';
    }



}


?>

<!-- $OK = mail($this->a,$this->objet,$this->message,$this->de); -->