<?php

require_once File::build_path(array('model', 'ModelClient.php'));
$controller = "Client";

class controllerClient {

	public static function connexion(){
        $controller = "client";
        $view = "connexion";
        $pagetitle = "Connexion";
        require File::build_path(array('view', 'view.php'));
	}
        
<<<<<<< HEAD
        public static function create(){
    
    $action = 'create';
    require_once File::build_path(array('view','client','create.php'));
}

public static function created(){
   $nom = $_POST['nomClient'];
   $prenom = $_POST['prenomClient'];
   $codePostal = $_POST['codePostalClient'];
   $ville = $_POST['villeClient'];
   $login = $_POST['loginClient'];
   $mdp = $_POST['mdpClient'];
   $mdp = chiffrer($mdp);
   $confMDP = $_POST['confMDPClient'];
   $confMDP = chiffrer($confMDP);
   if ($mdp = $confMDP){
       $v = ModelClient::save($nom,$prenom,$codePostal,$ville,$login,$mdp);
   }
   else{
       if ($save == false) {
           echo "Ce client existe déjà";
       }
   }
}

public static function update(){
    $action = update;
    require_once File::build_path(array('view','Client','update.php'));
   
}

public static function updated(){
    
}

public static function delete(){
    $action = update;
    require_once File::build_path(array('view','Client','delete.php'));
}

public static function deleted(){
    if (isset($_POST['idClient'])){
        
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
            require File::build_path(array("view","Client","error.php"));
        } else {
            require File::build_path(array("view" , "Client" , "detail.php"));
        }
    }
    
    function chiffrer($texte_en_clair) {
  $texte_chiffre = hash('sha256', $texte_en_clair);
  $complement = hash('sha256',securite);
  $texte_chiffre = $texte_chiffre . $complement;
  return $texte_chiffre;
}

=======
        public static function created() {
        $c = new ModelClient($_POST['idClient'], $_POST['nomClient'], $_POST['prenomClient'], $_POST['codePostalClient'], $_POST['villeClient'], $_POST['loginClient'], $_POST['mdpClient']);
        if ($c->save() == false) {
            echo'Le client est déjà existant';
        } else {
            $c->save();
        }
        ControllerVoiture::readAll();
    }
>>>>>>> 90aef3078ccbce75b61ce37ee5b0a1b5a28aae02
}
?>