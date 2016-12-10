<main>
	<div class="mainPanier">
		<h2>Mon Panier</h2>

		<?php

		var_dump($_SESSION['panier']);

		if(!isset($_SESSION['panier'])) {
			echo "<h3>Votre panier est vide !</h3>";
		}
		else {
			echo "<div class=\"barrePanier\"><span>Photo</span><span>Libellé</span><span>Quantité</span><span>Prix</span></div>";
			$cpt = count($_SESSION['panier']);

			foreach ($_SESSION['panier'] as $key) {
				$id = $key['id'];
				$stock = $key['stock'];
				//var_dump($id);
				$p = ModelProduit::getProduitById($id);
				echo "<div class=\"containerProduit\">";
				echo "<img src=" . $p->getPhotoProduit() . ">";
				echo "<span>" . $p->getLibProduit() . "</span>";
				echo "<span>" . $stock . "<br><a href=\"./index.php?action=removeProduitPanier&id=" . $id . "\">-</a> | <a href=\"./index.php?action=addPanier&id=" . $id . "\">+</a></span>";
				echo "<span>" . $p->getPrixProduit()*$stock . " €</span></div>";
			}
		}
		?>

		<a href="./index.php?action=removePanier">Retirer tous les articles du panier</a>
	</div>
</main>