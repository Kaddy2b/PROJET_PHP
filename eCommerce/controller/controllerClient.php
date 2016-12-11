<?php

require_once File::build_path(array('model', 'ModelClient.php'));

class controllerClient {

    public static function connexion() {
        $controller = "client";
        $view = "connexion";
        $pagetitle = "Se connecter";
        $action = "connexion";
        require File::build_path(array('view', 'view.php'));
    }

    public static function connected() {
        $_SESSION['message'] = '';
        $pagetitle = '';
        if (empty($_POST['login']) || empty($_POST['mdp'])) { //Oublie d'un champ
            $_SESSION['message'] = '<h3> Il faut remplir tout les champs. </h3>';
        }
        $values = $_POST['login'];
        $valRet = ModelClient::checkData($values);
        if ($valRet != false) {
            $mdp = controllerClient::chiffrer($_POST['mdp']);
            if ($valRet['mdpClient'] == $mdp) {  //Connexion ok
                $_SESSION['login'] = $valRet['loginClient'];
                $_SESSION['nom'] = $valRet['nomClient'];
                $_SESSION['id'] = $valRet['idClient'];
                $_SESSION['prenom'] = $valRet['prenomClient'];
                $_SESSION['email'] = $valRet['email'];
                $_SESSION['isAdmin'] = $valRet['isAdmin'];
                $_SESSION['message'] = '<h3> Bienvenue ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . '</h3>';
                $pagetitle = "Bienvenue !";
            } else {
                $_SESSION['message'] = '<h3> Mot de passe incorrect. </h3>';
                $pagetitle = "Mot de passe incorrect";
            }
        } else {
            $_SESSION['message'] = '<h3> Login inconnu.</h3> ';
            $pagetitle = "Probleme login";
        }
        /* $to = $_SESSION['email'];
          $subject = 'Inscription ';
          $message = 'Bonjour ' . $_SESSION['prenom'] . '. Votre inscription a bien été enregistré\n. Pour finaliser votre inscription veuillez cliquer sur ce lien:\n';
          $headers = 'From : lesiteduswag@hotmail.fr';
          mail($to, $subject, $message, $headers); */
        $controller = "client";
        $view = "estConnecte";
        require File::build_path(array('view', 'view.php'));
    }

    public static function create() {
        $controller = "client";
        $view = "createClient";
        $pagetitle = "Inscription";
        $action = 'create';
        require File::build_path(array('view', 'view.php'));
    }

    public static function created() {
        $message = '';
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
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $message = "Adresse email invalide";
        }
        if ($mdp == $confMDP) {
            $c = ModelClient::save($data);
            if ($c == false) {
                $message = "Ce client existe déjà";
            }
        } else {


            $message = "Les champs mot de passe et confirmation du mot de passe doivent être les mêmes.";
        }
        $controller = "client";
        $view = "estConnecte";
        require File::build_path(array('view', 'view.php'));
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

    static function chiffrer($texte_en_clair) {
        $texte_chiffre = hash('sha256', $texte_en_clair);
        $complement = hash('sha256', "securite");
        $texte_chiffre = $texte_chiffre . $complement;
        return $texte_chiffre;
    }

}

?>