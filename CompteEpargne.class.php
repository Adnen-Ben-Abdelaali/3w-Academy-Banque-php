<?php

  class CompteEpargne extends CompteBancaire 
  {
    const INTERET = 0.05;

    public function calculBenifices()
    {

      return $this->solde * INTERET; 
    }
  }


?>