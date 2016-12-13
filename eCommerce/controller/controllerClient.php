<?php

require_once File::build_path(array('model', 'ModelClient.php'));

class controllerClient {
    /* ///////////////////////////////////////
      ////       Gestion de Compte        ////
      ///////////////////////////////////// */

    public static function connexion() {
        $controller = "client";
        $view = "connexion";
        $pagetitle = "Se connecter";
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
            if ($valRet['mdpClient'] == $mdp  && $valRet['nonce']=='') {  //Connexion ok
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
        $controller = "client";
        $view = "estConnecte";
        require File::build_path(array('view', 'view.php'));
        // self::read();
    }

    public static function deconnected() {
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time() - 1);
        controllerProduit::readAll();
    }

    public function validate() {
        $login = $_GET['login'];
        $nonce = $_GET['nonce'];
        try {
            $sql = "SELECT loginClient FROM clients WHERE loginClient = :login; ";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array("login" => $login);
            $req_prep->execute($values);
            $data = $req_prep->fetch();
        } catch (Exception $e) {
            $data = false;
        }
        if (($data) != false) {
            try {
                $sql2 = "SELECT nonce FROM clients WHERE loginClient = :login; ";
                $req_prep2 = Model::$pdo->prepare($sql2);
                $values2 = array("login" => $data['loginClient']);
                $req_prep2->execute($values2);
                $data2 = $req_prep2->fetch();
            } catch (Exception $e) {
                $data2 = false;
            }
            if ($data2 != false)
                if (strcmp($data2[0],$nonce)==0) {
                    try{
                    $sql = "UPDATE clients SET nonce='' WHERE loginClient = :login; ";
                    $req_prep = Model::$pdo->prepare($sql);
                    $values = array("login" => $data[0]);
                    $req_prep->execute($values);
                    }catch (Exception $e){
                        return false;
                    }
                    $view = "estConnecte";
                    $controller = "client";
                    $pagetitle = "Bienvenue";
                    $_SESSION['message'] = "Vous etes bien inscrit !";
                    require File::build_path(array('view', 'view.php'));
                } else {
                    $view = "estConnecte";
                    $controller = "client";
                    $pagetitle = "Probleme d'authentification.";
                    $_SESSION['message'] = "Il y a un probleme lors de votre confirmation de mail";
                    require File::build_path(array('view', 'view.php'));
                }
            else{
                 $view = "estConnecte";
                 $controller = "client";
                 $pagetitle = "Probleme d'authentification.";
                 $_SESSION['message'] = "Il y a un probleme avec votre code de confirmation.";
                 require File::build_path(array('view', 'view.php'));
            }
        }
    }

    static function chiffrer($texte_en_clair) {
        $texte_chiffre = hash('sha256', $texte_en_clair);
        $complement = hash('sha256', "securite");
        $texte_chiffre = $texte_chiffre . $complement;
        return $texte_chiffre;
    }

    static function generateRandomHex() {
        // Generate a 32 digits hexadecimal number
        $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
        $bytes = openssl_random_pseudo_bytes($numbytes);
        $hex = bin2hex($bytes);
        return $hex;
    }

    /* ///////////////////////////////////////
      ////             CRUD               ////
      ///////////////////////////////////// */

    public static function readAll() {
        $tab_c = ModelClient::selectAll();
        $controller = "client";
        $view = "listClient";
        $pagetitle = "Liste des Clients";
        require File::build_path(array('view', 'view.php'));
    }

    public static function read() {
        if (isset($_GET['id'])) {
            $idClient = $_GET['id'];
            $c = ModelClient::select($idClient);
            $controller = "client";
            $view = "detailClient";
            $pagetitle = "Mon Compte";
            require File::build_path(array('view', 'view.php'));
        } else {
            $controller = "client";
            $view = "errorClient";
            $pagetitle = "ERREUR";
            require File::build_path(array('view', 'view.php'));
        }
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
        $confMDP = self::chiffrer($confMDP);
        $nonce = self::generateRandomHex();
        $data = array(
            "nomClient" => $nom,
            "prenomClient" => $prenom,
            "codePostalClient" => $codePostal,
            "emailClient" => $email,
            "villeClient" => $ville,
            "loginClient" => $login,
            "mdpClient" => $mdp,
            "isAdmin" => 0,
            "nonce" => $nonce
        );

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $message = "Adresse email invalide";
            $pagetitle = "Erreur email";
        }
        if ($mdp == $confMDP) {
            $c = ModelClient::save($data);
            $mail = 'Bonjour, pour finaliser votre inscription veuillez cliquer sur ce lien  <a href="index.php?controller=client&action=validate&login=' . $login . '&nonce=' . $nonce . '">ici</a>';          
            mail($email,"Inscription",$mail);
            $message = "Vous avez du recevoir un mail pour confirmer votre inscription."; 
            $pagetitle = "Inscription";
            if ($c == false) {
                $message = "Ce client existe déjà";
                $pagetitle = "Erreur";
            }
        } else {
            $message = "Les champs mot de passe et confirmation du mot de passe doivent être les mêmes.";
            $pagetitle = "Erreur de mot de passe";
        }
        $controller = "client";
        $view = "estConnecte";
        require File::build_path(array('view', 'view.php'));
    }

    public static function update() {
        $idClient = $_GET['id'];
        $c = ModelClient::select($idClient);
        if ($c != false) {
            $view = 'updateClient';
            $controller = 'client';
            $pagetitle = 'Modification informations client';
            require File::build_path(array("view", "view.php"));
        }
        else {
           self::error();
        }
    }

    public static function updated() {
        $nom = $_POST['nomClient'];
        $prenom = $_POST['prenomClient'];
        $codePostal = $_POST['codePostalClient'];
        $ville = $_POST['villeClient'];
        $email = $_POST['emailClient'];
        $login = $_POST['loginClient'];
        $mdp = $_POST['mdpClient'];
        $mdp = controllerClient::chiffrer($mdp);
        $confMDP = $_POST['confMDPClient'];
        $confMDP = self::chiffrer($confMDP);
        $data = array(
            "nomClient" => $nom,
            "codePostalClient" => $codePostal,
            "villeClient" => $ville,
            "email" => $email,
            "login" => $login,
            "mdpClient" => $mdp       
        );
        var_dump($data);
        if ($mdp == $confMDP) {
            
            $c = ModelClient::update($data);
            if ($c == false) {
                self::error();
            } else {
                $view = 'detailClient';
                $controller = 'client';
                $pagetitle = 'Informations du client';
                require File::build_path(array("view", "view.php"));
                echo "Modifications prise en compte.";
            }
        }
    }

    public static function delete() {
        $idClient = $_GET['id'];
        $test = ModelClient::delete($idClient);
        if ($test == true) {
           $view = 'deleteClient';
           $controller = 'client';
           $pagetitle = 'Suppression du client';
           require File::build_path(array("view", "view.php"));
        }
        else {
           self::error();
        }
    }

    
    public static function error() {
        $view = 'errorClient';
        $controller = 'client';
        $pagetitle = 'ERREUR';
        require File::build_path(array("view", "view.php"));
    }

}

?>