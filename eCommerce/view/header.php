<header>
    <div id="supNav">
        <ul>
            <li><img src="./lib/photos/swag_logo.png"></li>
            <li><h1>Site eCommerce</h1></li>
            <?php
            //Si vous etes visiteur
            if (!isset($_SESSION['login'])) {
                echo "<li><a href=\"./index.php?controller=client&action=connexion\">Se connecter</a> / <a href=\"./index.php?controller=client&action=create\">S'inscrire</a></li>";
            }
            //Sinon si vous etes connecté
            else {
                echo "<li>(" . $_SESSION['prenom'] . ") <a href=\"./index.php?controller=client&action=read&id=" . $_SESSION['id'] . "\">Mon compte</a> / <a href=\"./index.php?controller=client&action=deconnected\">Déconnexion</a></li>";
            }
            ?>
        </ul>
    </div>
    <nav>	
        <ul>
            <li><a href="./index.php">Nos produits</a></li>
            <li><a href="./index.php?action=lala">Assistance</a></li>
            <li><a href="./index.php?action=readPanier">Mon panier</a></li>
            <?php 
            if (isset($_SESSION['login']) && $_SESSION['isAdmin'] == 1) { ?>
                <li><a href="./index.php?controller=produit&action=create">Ajouter un article</a></li>
                <li><a href="./index.php?controller=client&action=readAll">Liste des Clients</a></li>
            <?php } ?>
            <!--<li><a href="./index.php?action=removePanier">Retirer tous les articles du panier</a></li>-->
        </ul>
    </nav>
</header>