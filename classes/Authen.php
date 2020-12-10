<?php

class Authen 
{
    //déclaration de mes attributs
    private $nom;
    private $prenom;
    private $age;
    private $adresse;
    private $CPville;
    private $telephone1;
    private $telephone2;
    private $telephone3;
    private $telephone4;
    private $email;

    //initialisation de mes attributs pour pouvoir les utiliser
    public function __construct($nomEleve,$prenomEleve,$adresseEleve) 
    {
    $this->nom=$nomEleve;
    $this->prenom=$prenomEleve;
    $this->naissanceEleve;
    $this->age;
    $this->adresse=$adresseEleve;
    $this->CPville;
    $this->telephone1;
    $this->telephone2;
    $this->telephone3;
    $this->telephone4;
    $this->email;
    }

    public function afficherAdresse ()
    {
    echo 'L\'adresse de '.$this->prenom.' est '.$this->adresse.'<br>';
    }

    public function afficherAge()
    {
    echo 'L\'âge de '.$this->prenom.' est ' .$this->age.' ans <br>';    
    }

    

}




?>