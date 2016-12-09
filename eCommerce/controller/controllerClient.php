<?php

require_once File::build_path(array('model', 'ModelClient.php'));

class controllerClient {

    public static function connexion() {
        $controller = "client";
        $view = "connexion";
        $pagetitle = "Se connecter";
        require File::build_path(array('view', 'view.php'));
    }

    public static function connected() {
        $erreur = '';
        if (empty($_POST['pseudo']) || empty($_POST['password'])) { //Oublie d'un champ
            $erreur = '<p> Il faut remplir tout les champs. </p>';
        }
        $values = $_POST['login'];
        $valRet = ModelClient::checkData($values);
        if (valRet != false) {
            $_POST['password'] = controllerClient::chiffrer($_POST['password']);
            if ($data['mdpClient'] == $_POST['password']) {  //Connexion ok
                $_SESSION['login'] = $valRet['loginClient'];
                $_SESSION['nom'] = $valRet['nomClient'];
                $_SESSION['id'] = $valRet['idClient'];
                $_SESSION['prenom'] = $valRet['prenomClient'];
                $message = ' Bienvenue';               
            }
            else{
                $message = "Mot de passe incorrect.";
            }
        }
        else{
            $message = "Login inconnu.";
        }
        ControllerProduit::readAll();
    }

    public static function create() {
        $controller = "client";
        $view = "createClient";
        $pagetitle = "Inscription";
        $action = 'create';
        require File::build_path(array('view', 'view.php'));
    }

    public static function created() {
        $nom = $_POST['nomClient'];
        $prenom = $_POST['prenomClient'];
        $codePostal = $_POST['codePostalClient'];
        $ville = $_POST['villeClient'];
        $email = $_POST['emailClient'];
        $login = $_POST['loginClient'];
        $mdp = $_POST['mdpClient'];

        $mdp = controllerClient::chiffrer($mdp);
        $confMDP = $_POST['confMDPClient'];
        $confMDP = controllerClient::chiffrer($confMDP);
        $data = array(
            "nomClient" => $nom,
            "prenomClient" => $prenom,
            "codePostalClient" => $codePostal,
            "email" => $email,
            "villeClient" => $ville,
            "loginClient" => $login,
            "mdpClient" => $mdp
        );
        //faire un trycatch pour gerer le cas où les infos sont déjà rentrées dans la bdd
        if ($mdp == $confMDP) {
            $c = Model::save($data);
            if ($c == false) {
                echo "Ce client existe déjà";
            }
        } else {


            echo "Les champs mot de passe et confirmation du mot de passe doivent etre les mêmes.";
        }
        ControllerProduit::readAll();
    }

    public static function update() {
        $controller = "client";
        $view = "create.php";
        $action = update;
        require_once File::build_path(array('view', 'Client', 'update.php'));
    }

    public static function updated() {
        
    }

    public static function delete() {
        $action = update;
        require_once File::build_path(array('view', 'Client', 'delete.php'));
    }

    public static function deleted() {
        if (isset($_POST['idClient'])) {
            
        }
    }

    public static function readAll() {
        $tab_p = ModelClient::getAllClients();
        require File::build_path(array('view', 'Client', 'list.php'));
    }

    public static function read() {
        $a = $_GET['idC'];
        $c = ModelClient::getClientById($a);
        if ($c == false) {
            require File::build_path(array("view", "Client", "errorClient.php"));
        } else {
            require File::build_path(array("view", "Client", "detailClient.php"));
        }
    }

    function chiffrer($texte_en_clair) {
        $texte_chiffre = hash('sha256', $texte_en_clair);
        $complement = hash('sha256', "securite");
        $texte_chiffre = $texte_chiffre . $complement;
        return $texte_chiffre;
    }

}

?>