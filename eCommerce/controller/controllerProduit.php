<?php

require_once File::build_path(array('model', 'ModelProduit.php'));

class ControllerProduit{

    public static function lala() {
        $view = "lala";
        $pagetitle = "Assistance";
        require File::build_path(array('view', 'view.php'));
    }

    public static function readAll() {
        $tab_p = ModelProduit::selectAll();
        $controller = "produit";
        $view = "list";
        $pagetitle = "Liste des produits";
        require File::build_path(array('view', 'view.php'));
    }

    public static function read() {
        if (!isset($_GET['id'])) {
            $controller = "produit";
            $view = "error";
            $pagetitle = "ERREUR";
            require File::build_path(array('view', 'view.php'));
        }
        else {
            $idProduit = $_GET['id'];
            $p = ModelProduit::getProduitById($idProduit);
            $controller = "produit";
            $view = "detail";
            $pagetitle = "Détail du produit";
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function addPanier() {
        //Si le produit n'existe pas
        if (!isset($_GET['id'])) {
            $controller = "produit";
            $view = "error";
            $pagetitle = "ERREUR";
            require File::build_path(array('view', 'view.php'));
        }
        else {
            $idProduit = $_GET['id'];
            //Si le panier est vide
            if (!isset($_COOKIE['panierDeProduits'])) {
                $tab_cookie = array('produit' . $idProduit => $idProduit, );
                setcookie("panierDeProduits", serialize($tab_cookie), time()+3600);
            }
            else {
                $tab_cookie = unserialize($_COOKIE['panierDeProduits']);
                $tab_cookie[] = array('produit' . $idProduit => $idProduit, );
                setcookie("panierDeProduits", serialize($tab_cookie), time()+3600);
            }
            $controller = "produit";
            $view = "panier";
            $pagetitle = "Panier";
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function readPanier() {
        //Si le panier est vide
        if (!isset($_COOKIE['panierDeProduits'])) {
            $controller = "produit";
            $view = "error";
            $pagetitle = "ERREUR";
            require File::build_path(array('view', 'view.php'));
        }
        else {
            $controller = "produit";
            $view = "panier";
            $pagetitle = "Panier";
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function removePanier() {
        //Si le panier est vide
        if (!isset($_COOKIE['panierDeProduits'])) {
            $controller = "produit";
            $view = "error";
            $pagetitle = "ERREUR";
            require File::build_path(array('view', 'view.php'));
        }
        else {
            $tab_cookie = unserialize($_COOKIE['panierDeProduits']);
            setcookie("panierDeProduits", serialize($tab_cookie), time() -1);
            $controller = "produit";
            $view = "panier";
            $pagetitle = "Panier";
            require File::build_path(array('view', 'view.php'));
        }
    }
}