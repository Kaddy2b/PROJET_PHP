<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelClient extends Model {
    protected static $object = "client";
    protected static $primary = "loginClient";

    private $idClient;
    private $nomClient;
    private $prenomClient;
    private $codePostalClient;
    private $email;
    private $villeClient;
    private $loginClient;
    private $mdpClient;

    //getters
    public function getIdClient() {
        return $this->idClient;
    }
    public function getNomClient() {
        return $this->nomClient;
    }
    public function getPrenomClient() {
        return $this->prenomClient;
    }
    public function getCodePostalClient() {
        return $this->codePostalClient;
    }
    public function getVilleClient() {
        return $this->villeClient;
    }
    public function getLoginClient() {
        return $this->loginClient;
    }
    public function getMdpClient() {
        return $this->mdpClient;
    }

    //setters
    public function setIdClient($newId) {
        $this->idClient = $newId;
    }
    public function setNomClient($newNom) {
        $this->nomClient = $newNom;
    }
    public function setPrenomClient($newPrenom) {
        $this->prenomClient = $newPrenom;
    }
    public function setCodePostalClient($newcodePostal) {
        $this->codePostalClient = $newcodePostal;
    }
    public function setVilleClient($newVille) {
        $this->villeClient = $newVille;
    }
    public function setLoginClient($newLogin) {
        $this->loginClient = $newLogin;
    }
    public function setMdpClient($newMdp) {
        $this->mdpClient = $newMdp;
    }

    //constructeur
    public function __construct($i = NULL, $n = NULL, $p = NULL ,$a = NULL, $b = NULL, $c = NULL, $d = NULL) {
        if (!is_null($i) && !is_null($n) && !is_null($p) && !is_null($a) && !is_null($b) && !is_null($c) && !is_null($d)) {
            $this->idClient = $i;
            $this->nomClient = $n;
            $this->prenomClient = $p;
            $this->codePostalClient = $a;
            $this->villeClient = $b;
            $this->loginClient = $c;
            $this->mdpClient = $d;
        }
    }

    public static function getClientById($idProduit) {
        $sql = "SELECT * FROM clients WHERE id=:nom_tag";
        // Préparation de la requête
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
    
        /*public function save() {

        $sql = "INSERT INTO clients (nomClient,prenomClient,codePostalClient,email,villeClient,loginClient,mdpClient) VALUES (:nomC, :prenomC, :)";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
        "couleur" => $this->couleur,
        "marque" => $this->marque,
        "immat" => $this->immatriculation
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, "Voiture"); 
    }*/

}
