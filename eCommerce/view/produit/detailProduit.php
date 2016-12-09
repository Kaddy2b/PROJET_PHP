<main>
	<h2>Page du produit</h2>
	<div class="mainDetail">
		<ul>
			<?php
            $v_photoProduit = urlencode($p->getPhotoProduit());
            $v_prixProduit = urlencode($p->getPrixProduit());
            $v_libProduit = urlencode($p->getLibProduit());
            $v_stockProduit = urlencode($p->getStockProduit());
            $v_idProduit = urlencode($p->getIdProduit());
            //htmlspecialchars();
			echo '<li><img class="imageProduit" alt="photo du produit" src="' . $v_photoProduit . '"></li>';
			echo '<div><li>' . $v_prixProduit . ' €</li>';
			echo '<li>' . $v_libProduit . '</li>';
			echo '<li>En stock: ' . $v_stockProduit . '.</li>';
			echo '<li><a href="./index.php?action=addPanier&id=' . $v_idProduit . '">Ajouter au Panier</a></li>'; 
            echo '<li><a href="./index.php?action=deleteProduit&id=' . $v_idProduit . '">Supprimer le produit</a></li>';
            echo '<li><a href="./index.php?action=updateProduit&id=' . $v_idProduit . '">Modifier le produit</a></li></div>';
            ?>             
		</ul>
	</div> 
</main>