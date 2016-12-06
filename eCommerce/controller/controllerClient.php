<?php

require_once File::build_path(array('model', 'ModelClient.php'));
$controller = "Client";

class controllerClient {

    public static function connexion() {
        $controller = "client";
        $view = "connexion";
        $pagetitle = "Se connecter";
        require File::build_path(array('view', 'view.php'));
    }

    public static function create() {
        $controller = "client";
<<<<<<< HEAD
        $view = "create.php";
=======
        $view = "createClient";
        $pagetitle = "Inscription";
>>>>>>> ba44c64a49018e9a2cab9776698374e2fe13a7df
        $action = 'create';
         require File::build_path(array('view', 'view.php'));
    }

    public static function created() {
<<<<<<< HEAD
        
=======

>>>>>>> ba44c64a49018e9a2cab9776698374e2fe13a7df
        $nom = $_POST['nomClient'];
        $prenom = $_POST['prenomClient'];
        $codePostal = $_POST['codePostalClient'];
        $ville = $_POST['villeClient'];
        $login = $_POST['loginClient'];
        $mdp = $_POST['mdpClient'];
        $mdp = controllerClient::chiffrer($mdp);
        $confMDP = $_POST['confMDPClient'];
        $confMDP = controllerClient::chiffrer($confMDP);
        $data = array(
            "nomC" => $nom,
            "prenomC" => $prenom,
            "codePostal" => $codePostal,
            "ville" => $ville,
            "login" => $login,
            "mdp" => $mdp
        );

        if ($mdp == $confMDP) {
            $v = ModelClient::save($data);
            
        } else {
            if ($v == false) {
                echo "Ce client existe déjà";
            }
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
        $v = ModelClient::getClientById($a);
        if ($v == false) {
            require File::build_path(array("view", "Client", "error.php"));
        } else {
            require File::build_path(array("view", "Client", "detail.php"));
        }
    }

    function chiffrer($texte_en_clair) {
        $texte_chiffre = hash('sha256', $texte_en_clair);
        $complement = hash('sha256', "securite");
        $texte_chiffre = $texte_chiffre . $complement;
        return $texte_chiffre;
    }

    /*
      public static function created() {
      $c = new ModelClient($_POST['idClient'], $_POST['nomClient'], $_POST['prenomClient'], $_POST['codePostalClient'], $_POST['villeClient'], $_POST['loginClient'], $_POST['mdpClient']);
      if ($c->save() == false) {
      echo'Le client est déjà existant';
      } else {
      $c->save();
      }
      ControllerVoiture::readAll();
      }
     */
}

?>