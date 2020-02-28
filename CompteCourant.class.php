<?php
  
  class CompteCourant extends CompteBancaire 
  {

    public function retirerArgent(float $mont) {

      if( ($mont > 0) && ($mont < $this->solde) ) 
      {

        echo "Vous avez retiré : " .$mont ." TND \n" ;

        $this->solde -= $mont;

        array_push($this->tracesCompte, array("-", date('r'), $mont, $this->solde));
      
      }else 
      {
        echo "ERROR : try again later";
      }
    }

  }



?>