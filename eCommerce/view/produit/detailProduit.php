<main>
	<h2>Page du produit</h2>
	<div class="mainDetail">
		<ul> <?php
			echo '<li><img class="imageProduit" alt="photo du produit" src="' . $p->getPhotoProduit() . '"></li>';
			echo '<div><li>' . $p->getPrixProduit() . ' €</li>';
			echo '<li>' . $p->getLibProduit() . '</li>';
			echo '<li>En stock: ' . $p->getStockProduit() . '.</li>';
			echo '<li><a href="./index.php?action=addPanier&id=' . $p->getIdProduit() . '">Ajouter au Panier</a></li></div>'; ?> 
		</ul>
	</div> 
</main>