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
    
    public function setstockProduit($newstockProduit){
        $this->stockProduit = $newstockProduit;
    }

    public function setPhotoProduit($newphotoProduit){
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
    
     public static function getAllProduits() {
        $sql = "SELECT * FROM produits";
        $req_prep = Model::$pdo->query($sql);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');

        $tab_prod = $req_prep->fetchAll();
        return $tab_prod;
    }

    public static function getProduitById($idProduit) {
<<<<<<< HEAD
        $sql = "SELECT * from produits WHERE id=:nom_tag";
        // Préparation de la requête
=======
        $sql = "SELECT * FROM produits WHERE idProduit=:LibProduit_tag";

>>>>>>> 90aef3078ccbce75b61ce37ee5b0a1b5a28aae02
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $id,
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }
    
     public static function getAllProduits() {
        $sql = "SELECT * FROM Produits";
        $req_prep = Model::$pdo->query($sql);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');

        $tab_prod = $req_prep->fetchAll();
        return $tab_prod;
    }
}