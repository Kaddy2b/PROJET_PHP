<?php

require_once File::build_path(array("controller" , "controllerProduit.php"));
require_once File::build_path(array("controller" , "controllerClient.php"));

if (!isset($_GET['controller'])) {
	if (!isset($_GET['action'])) {
		ControllerProduit::readAll();
	}
	else {
		$action = $_GET['action'];
		ControllerProduit::$action();
	}
}
else {
	$controller = $_GET['controller'];
	$controller_class = "Controller" . ucfirst($controller);

	if (!isset($_GET['action'])) {
		$controller_class::readAll();
	}
	else {
		$action = $_GET['action'];
		$controller_class::$action();
	}
}

?>