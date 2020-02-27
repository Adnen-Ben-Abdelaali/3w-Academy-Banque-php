<?php

   class CompteBancaire 
  { 
    private $nom = "";
    private $prenom = "";
    protected $solde = 0;
    private $dateOuverture; 
    protected $tracesCompte = array(); //contient l'historique des transactions
    public static $nCompte = 0;

    public function __construct(string $nom, string $prenom, float $solde) 
    {
      
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->solde = $solde;
      $this->dateOuverture = date('r');
      self::$nCompte++;
      array_push( $this->tracesCompte, array("ouverture",$this->nom, $this->prenom, $this->dateOuverture, $this->solde, self::$nCompte) );

    }

    public function __set($variable, $valeur) 
    {

      $this->$varivble = $valeur; 
    }

    public function __get($variable) 
    {

      return $this->variable;
    }

    public function __toString() 
    {

      return "le compte de Mr/Mme " .$this->tracesCompte[0][1] 
              ." " .$this->tracesCompte[0][2] ." a été crée le " .$this->tracesCompte[0][3] ." \n"; 
    }

    public function verserArgent(float $mont) 
    {

      if($mont > 0) 
      {
        $this->solde += $mont;
        array_push( $this->tracesCompte, array("+", date('r'), $mont, $this->solde) );
      }else 
      {
        "Merci de bien vouloir saisir un montant supérieur à zéro et de type REEL";
      }
    }

    public function afficherExtrait() 
    {
      $extraitCompte = "";

      foreach($tracesCompte as $key => $value) 
      {
        $extraitCompte .= implode(",", $value) ." \n";
      }

      return $extraitCompte;
    }


  }
  

?>