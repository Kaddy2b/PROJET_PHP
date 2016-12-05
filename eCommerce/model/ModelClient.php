<?php

class ModelClient extends Model{
    
    protected static $object = "client";
    protected static $primary = "idC";

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
    public static function getAllClients() {
        $sql = "SELECT * FROM clients";
        $req_prep = Model::$pdo->query($sql);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');

        $tab_client = $req_prep->fetchAll();
        return $tab_client;
    }
    
    public static function getClientById($idProduit) {
        $sql = "SELECT * FROM clients WHERE id=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $idProduit,
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelClient');
        $tab_client = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_client))
            return false;
        return $tab_client[0];
    }

}
