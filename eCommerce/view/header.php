<header>
	<div id="supNav">
		<ul>
			<li><img src="./lib/photos/swag_logo.png"></li>
			<li><h1>Site eCommerce</h1></li>
			<?php
			if (!isset($_SESSION['login'])) {
				echo "<li><a href=\"./index.php?controller=client&action=connexion\">Se connecter</a> / <a href=\"./index.php?controller=client&action=create\">S'inscrire</a></li>";
			}
			else {
				echo "<li><a href=\"./index.php?controller=client&action=readCompte\">Mon compte</a> / <a href=\"./index.php?controller=client&action=deconnected\">Déconnexion</a></li>";
			}
			?>
		</ul>
	</div>
	<nav>	
		<ul>
			<li><a href="./index.php">Nos produits</a></li>
			<li><a href="./index.php?action=lala">Assistance</a></li>
			<li><a href="./index.php?action=readPanier">Mon panier</a></li>
			<!--<li><a href="./index.php?action=removePanier">Retirer tous les articles du panier</a></li>-->
		</ul>
	</nav>
</header>