<?php
require_once File::build_path(array("controller" , "controllerProduit.php"));
require_once File::build_path(array("controller" , "controllerClient.php"));


/*
if (!isset($_GET['controller'])) {
/*if (!isset($_GET['controller'])) {
	if (!isset($_GET['action'])) {
		controllerProduit::readAll();
	}
	else {
		$action = $_GET['action'];
		controllerProduit::$action();
	}
}
else {
	$controller = $_GET['controller'];
	$controller_class = "controller" . ucfirst($controller);

	if (!isset($_GET['action'])) {
		$controller_class::readAll();
	}
	else {
		$action = $_GET['action'];
		$controller_class::$action();
	}
}
 */




//Vérifie tout les cas pour le controller
 if (isset($_GET['controller'])) {   // si le controller est mis dans l'url
     
     $controller = $_GET['controller'];
    
  }
  else if(isset($_POST['controller'])){        //Si le controller est dans une URl
       $controller = $_POST['controller'];
  }
  else{
      $controller = "Produit";
  }

  
  //Pareil pour l'action
 if (isset($_GET['action'])) {   // si l'action est mis dans l'url
     $action = $_GET['action'];
 }
 else if (isset($_POST['action'])){ // si l'action n'est pas dans un formulaire
    $action = $_POST['action'];
 }
   else{   //si l'action est transmis dans un formulaire
          $action = "readAll";
 }
  
  $controller_class = "controller" . ucfirst($controller); //on concatene pour avoir le nom du controller final

  if(class_exists($controller_class)){ // Si le controller existe
       if(method_exists($controller_class,$action)){ // Si la méthode existe dans le controller
           $controller_class::$action();
       }
       else{  //si la méthode n'existe pas dans le controller
           if($controller_class == "controllerProduit"){ //on configure de base un read all si le controller est Produit
               $controller_class::readAll();
           }
           else{
               echo "L'action effectuee n'existe pas";   //Message d'erreur à modifier avec un page erreur si on a le temps
           }
       }
 } 
  else{
     controllerProduit::readAll();   //de base on met un read all en produit
  }
 
?>