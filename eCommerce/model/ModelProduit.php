<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelProduit extends Model {

    protected static $object = "produit";
    protected static $primary = "idProduit";
    private $idProduit;
    private $libProduit;
    private $prixProduit;
    private $stockProduit;
    private $photoProduit;

    //getters
    public function getIdProduit() {
        return $this->idProduit;
    }

    public function getLibProduit() {
        return $this->libProduit;
    }

    public function getPrixProduit() {
        return $this->prixProduit;
    }

    public function getStockProduit() {
        return $this->stockProduit;
    }

    public function getPhotoProduit() {
        return $this->photoProduit;
    }

    //setters
    public function setId($newId) {
        $this->id = $newId;
    }

    public function setLibProduit($newLibProduit) {
        $this->libProduit = $newLibProduit;
    }

    public function setprixProduit($newPrixProduit) {
        $this->prixProduit = $newPrixProduit;
    }

    public function setstockProduit($newstockProduit) {
        $this->stockProduit = $newstockProduit;
    }

    public function setPhotoProduit($newphotoProduit) {
        $this->photoProduit = $newphotoProduit;
    }

    //constructeur
    public function __construct($i = NULL, $n = NULL, $p = NULL, $s = NULL, $img = NULL) {
        if (!is_null($i) && !is_null($n) && !is_null($p) && !is_null($s) && !is_null($img)) {
            $this->idProduit = $i;
            $this->libProduit = $n;
            $this->prixProduit = $p;
            $this->stockProduit = $s;
            $this->photoProduit = $img;
        }
    }

}
