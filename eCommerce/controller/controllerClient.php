<?php
require_once File::build_path(array('model', 'ModelClient.php'));

class controllerClient {

    public static function connexion() {
        $controller = "client";
        $view = "connexion";
        $pagetitle = "Se connecter";
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
        $nom = $_POST['nomClient'];
        $prenom = $_POST['prenomClient'];
        $codePostal = $_POST['codePostalClient'];
        $ville = $_POST['villeClient'];
        $email = $_POST['emailCLient'];
        $login = $_POST['loginClient'];
        $mdp = $_POST['mdpClient'];

        $mdp = controllerClient::chiffrer($mdp);
        $confMDP = controllerClient::chiffrer($confMDP);
        $data = array(
            "nomC" => $nom,
            "prenomC" => $prenom,
            "codePostal" => $codePostal,
            "ville" => $ville,
            "email" => $email,
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