<?php

require_once("Prodotto.php");

class Fattura{
    private $ragione_sociale;
    private $indirizzo;
    private $partita_iva;
    private $prodotti;
    private $quantita;

      public function __construct($ragione_sociale, $indirizzo, $partita_iva){
        $this->ragione_sociale = $ragione_sociale;
        $this->indirizzo = $indirizzo;
        $this->partita_iva = $partita_iva;
        $this->quantita = array();
        $this->prodotti = array();
    }

    public function getProdotto($posizione){
      return $this->prodotti[$posizione];
    }

    public function setProdotto($p, $q){
      array_push($this->prodotti, $p);
      array_push($this->quantita, $q);
    }

    public function delProdotto($codice){
      for($i=0; $i<count($this->prodotti); $i++){
        if($codice == $this->prodotti[$i]->getCodice()){
            unset($this->prodotti[$i]);
        }
      }
    }

    public function toString(){
      for($i=0; $i<count($this->prodotti); $i++){
        echo $this->prodotti[$i]->getCodice().": ".$this->quantita[$i]."<br>";
      }
    }

    public function totaleImponibile(){
      $totImp = 0;
      for($i=0; $i<count($this->prodotti); $i++){
        $totImp += ($this->prodotti[$i]->getPrezzo())*($this->quantita[$i]);
      }
      return $totImp;
    }

    public function importoIva(){
      $totIva = 0;
      for($i=0; $i<count($this->prodotti); $i++){
        $totIva += ($this->prodotti[$i]->getPrezzo())*($this->quantita[$i])*($this->prodotti[$i]->getIva());
      }
      return $totIva;
    }

    public function totaleFattura(){
      $tot = 0;
      $tot = $this->totaleImponibile() + $this->importoIva();
      return $tot;
    }
}

?>