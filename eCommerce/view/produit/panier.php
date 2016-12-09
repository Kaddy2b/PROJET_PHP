<main>
	<div class="mainPanier">
		<h2>Mon Panier</h2>

		<?php
		if(!isset($_COOKIE['panierDeProduits'])) {
			echo "<h3>Votre panier est vide !</h3>";
		}
		else {
			$tab_cookie = unserialize($_COOKIE['panierDeProduits']);

			echo "<div class=\"barrePanier\"><h4>Photo</h4><h4>Libellé</h4><h4>Prix</h4></div>";
			foreach ($tab_cookie as $produit) {
				foreach ($produit as $key) {
					$p = ModelProduit::getProduitById($key);
					echo "<div class=\"containerProduit\">";
					echo "<img src=" . $p->getPhotoProduit() . ">";
					echo "<h4>" . $p->getLibProduit() . "</h4>";
					echo "<h4>" . $p->getPrixProduit() . " €</h4></div>";
				}
			}
		}
		?>

		<a href="./index.php?action=removePanier">Retirer tous les articles du panier</a>
	</div>
</main>