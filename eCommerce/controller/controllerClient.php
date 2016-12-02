<?php

//require_once File::build_path(array('model', 'ModelClient.php'));

class controllerClient {

	public static function connexion(){
		$controller = "client";
        $view = "connexion";
        $pagetitle = "Connexion";
        require File::build_path(array('view', 'view.php'));
	}
}
?>