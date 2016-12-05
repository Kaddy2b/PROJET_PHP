<?php

//require_once File::build_path(array('model', 'ModelClient.php'));

class controllerClient {

	public static function connexion(){
        $controller = "client";
        $view = "connexion";
        $pagetitle = "Connexion";
        require File::build_path(array('view', 'view.php'));
	}
        
        public static function created() {
        $c = new ModelClient($_POST['idClient'], $_POST['nomClient'], $_POST['prenomClient'], $_POST['codePostalClient'], $_POST['villeClient'], $_POST['loginClient'], $_POST['mdpClient']);
        if ($c->save() == false) {
            echo'Le client est déjà existant';
        } else {
            $c->save();
        }
        ControllerVoiture::readAll();
    }
}
?>