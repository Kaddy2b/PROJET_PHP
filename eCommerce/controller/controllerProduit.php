<?php

require_once File::build_path(array('model', 'ModelProduit.php'));

class ControllerProduit {

    /* ///////////////////////////////////////
      ////             CRUD               ////
      ///////////////////////////////////// */

    public static function readAll() {
        $tab_p = ModelProduit::selectAll();
        $controller = "produit";
        $view = "listProduit";
        $pagetitle = "Liste des produits";
        require File::build_path(array('view', 'view.php'));
    }

    public static function read() {
        if (!isset($_GET['id'])) {
            self::error();
        } else {
            $idProduit = $_GET['id'];
            $p = ModelProduit::getProduitById($idProduit);
            $controller = "produit";
            $view = "detailProduit";
            $pagetitle = "Détail du produit";
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function create() {
        $view = 'createProduit';
        $controller = 'produit';
        $pagetitle = 'Creation de produit';
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $data = array(
            "idProduit" => $_POST["idProduit"],
            "libProduit" => $_POST["labelProduit"],
            "prixProduit" => $_POST["prixProduit"],
            "stockProduit" => $_POST["quantiteStock"],
            "imageProduit" => $_POST["imageProduit"]
        );
        $p = ModelProduit::save($data);
        if ($p == false) {
            echo"Le produit est déjà existant";
        } else {
            echo "Création réussie";
        }
        self::readAll();
    }

    public static function delete() {
        $idProduit = $_GET['id'];
        $test = ModelProduit::delete($idProduit);
        if ($test == true) {
           $view = 'deleteProduit';
           $controller = 'produit';
           $pagetitle = 'Suppression de produit';
           require File::build_path(array("view", "view.php"));
        }
        else {
           $view = 'errorProduit';
           $controller = 'produit';
           $pagetitle = 'Erreur de suppression';
           require File::build_path(array("view", "view.php"));
        }
    }

    public static function update() {
        $view = 'updateProduit';
        $controller = 'produit';
        $pagetitle = 'Modification produit';
        require File::build_path(array("view", "view.php"));
    }

    public static function updated() {
        $data = array(
            "idProduit" => $_POST["idProduit"],
            "libProduit" => $_POST["labelProduit"],
            "prixProduit" => $_POST["prixProduit"],
            "stockProduit" => $_POST["quantiteStock"],
            "photoProduit" => $_POST["imageProduit"]
        );
        $p = ModelProduit::update($data);
        if ($p == false) {
            echo"Echec de mise à jour...";
        } else {
            echo "Modification prise en compte.";
        }
        self::readAll();
    }

    /* ///////////////////////////////////////
      ////             panier             ////
      ///////////////////////////////////// */

    public static function addPanier() {
        //Si le produit n'existe pas
        if (!isset($_GET['id'])) {
            self::error();
        } else {
            $idProduit = $_GET['id'];
            //Si le panier est vide
            if (!isset($_SESSION['panier'])) {
                $stockProduit = 1;
                $_SESSION['panier'] = array('produit' . $idProduit => array('id' => $idProduit,
                        'stock' => $stockProduit),);
            } else {
                //Si le produit n'est pas deja present dans le panier
                if (!isset($_SESSION["panier"]["produit" . $idProduit])) {
                    $stockProduit = 1;
                    $_SESSION["panier"]['produit' . $idProduit] = array('id' => $idProduit,
                        'stock' => $stockProduit);
                } else {
                    $_SESSION["panier"]["produit" . $idProduit]["stock"] ++;
                }
            }
        }
        self::readPanier();
    }

    public static function removeProduitPanier() {
        //Si le produit n'existe pas
        if (!isset($_GET['id'])) {
            self::error();
        } else {
            $idProduit = $_GET['id'];

            $_SESSION["panier"]["produit" . $idProduit]["stock"] --;
            $var = $_SESSION["panier"]["produit" . $idProduit]["stock"];
            if ($var <= 0) {
                unset($_SESSION["panier"]["produit" . $idProduit]);
            }
            if (count($_SESSION["panier"]) == 0) {
                unset($_SESSION["panier"]);
            }
        }
        self::readPanier();
    }

    /* COOKIE
      public static function addPanier() {
      //Si le produit n'existe pas
      if (!isset($_SESSION['id'])) {
      $controller = "produit";
      $view = "errorProduit";
      $pagetitle = "ERREUR1";
      require File::build_path(array('view', 'view.php'));
      }
      else {
      $idProduit = $_GET['id'];
      //Si le panier est vide
      if (!isset($_COOKIE['panierDeProduits'])) setcookie("panierDeProduits", serialize(array()), time()+3600);
      $tab_cookie = unserialize($_COOKIE['panierDeProduits']);
      $tab_cookie[] = array('produit' . $idProduit => $idProduit, );
      setcookie("panierDeProduits", serialize($tab_cookie), time()+3600);
      controllerProduit::readPanier();
      }
      }
     */

    public static function readPanier() {
        $controller = "produit";
        $view = "panier";
        $pagetitle = "Mon Panier";
        require File::build_path(array('view', 'view.php'));
    }

    /* COOKIE
      public static function readPanier() {
      //Si le panier est vide
      if (!isset($_COOKIE['panierDeProduits'])) {
      $controller = "produit";
      $view = "errorProduit";
      $pagetitle = "ERREUR2";
      require File::build_path(array('view', 'view.php'));
      }
      else {
      $controller = "produit";
      $view = "panier";
      $pagetitle = "Panier";
      require File::build_path(array('view', 'view.php'));
      }
      }
     */

    public static function removePanier() {
        //Si le panier est vide
        if (!isset($_SESSION['panier'])) {
            self::error();
        } else {
            session_unset();
            session_destroy();
            setcookie(session_name(), '', time() - 1);
            self::readPanier();
        }
    }

    /* ///////////////////////////////////////
      ////             Autres             ////
      ///////////////////////////////////// */

    public static function URLClear() {
        $urlCourante = $_SERVER["REQUEST_URI"];
        $urlGet = explode("?", $urlCourante);
        return $urlGet[0];
    }

    public static function error() {
        $view = 'errorProduit';
        $controller = 'produit';
        $pagetitle = 'ERREUR';
        require File::build_path(array("view", "view.php"));
    }

    public static function lala() {
        $view = "lala";
        $pagetitle = "Assistance";
        require File::build_path(array('view', 'view.php'));
    }
}
