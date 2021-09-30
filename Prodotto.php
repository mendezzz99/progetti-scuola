<?php

class Prodotto {
    private $codice;
    private $descrizione;
    private $iva;
    private $prezzo;

    public function __construct($codice, $descrizione, $iva, $prezzo){
        $this->codice = $codice;
        $this->descrizione = $descrizione;
        $this->iva = $iva;
        $this->prezzo = $prezzo;
    }


    public function setCodice($codice){
        $this->codice=$codice;
    }

    public function setDescrizione($descrizione){
        $this->descrizione=$descrizione;
    }

    public function setIva($iva){
        $this->iva=$iva;
    }

    public function setPrezzo($prezzo){
        $this->prezzo=$prezzo;
    }


    public function getCodice(){
        return $this->codice;
    }

    public function getDescrizione(){
        return $this->descrizione;
    }

    public function getIva(){
        return $this->iva;
    }

    public function getPrezzo(){
        return $this->prezzo;
    }

    public function toString(){
        return "Codice prodotto:".$this->codice."<br>"."Descrizione:".$this->descrizione."<br>"."IVA:".$this->iva."<br>"."Prezzo:".$this->prezzo."<br>";
    }
}

?>