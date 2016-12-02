<?php

class ModelClient extends Model{

    private $idC;
    private $nomC;
    private $prenomC;
    private $adresse;
    private $ville;
    private $login;
    private $mdp;

    //getters
    public function getIdC() {
        return $this->idC;
    }

    public function getNomC() {
        return $this->nomC;
    }

    public function getPrenomC() {
        return $this->prenomC;
    }
    
    public function Adresse() {
        return $this->adresse;
    }
    
    public function getVille() {
        return $this->ville;
    }
    
    public function getLogin() {
        return $this->login;
    }
    
    public function getMdp() {
        return $this->mdp;
    }

    //setters
    public function setId($newId) {
        $this->idC = $newId;
    }

    public function setNomC($newNom) {
        $this->nomC = $newNom;
    }

    public function setPrenomC($newPrenom) {
        $this->prenomC = $newPrenom;
    }
    
    public function setAdresse($newAdresse) {
        $this->adresse = $newAdresse;
    }
    
    public function setVille($newVille) {
        $this->ville = $newVille;
    }
    
    public function setLogin($newLogin) {
        $this->login = $newLogin;
    }
    public function setMdp($newMdp) {
        $this->mdp = $newMdp;
    }

    //constructeur
    public function __construct($i = NULL, $n = NULL, $p = NULL) {
        if (!is_null($i) && !is_null($n) && !is_null($p)) {
            $this->id = $i;
            $this->nom = $n;
            $this->prix = $p;
        }
    }

    //functions
    public static function getAllProduits() {
        $sql = "SELECT * FROM Produits";
        $req_prep = Model::$pdo->query($sql);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');

        $tab_prod = $req_prep->fetchAll();
        return $tab_prod;
    }
    
    public static function getProduitById($idProduit) {
        $sql = "SELECT * from produits WHERE id=:nom_tag";
        // Préparation de la requête
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

}
