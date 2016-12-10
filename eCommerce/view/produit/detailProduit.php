<main>
	<h2>Page du produit</h2>
	<div class="mainDetail">
            <?php
            $v_photoProduit = htmlspecialchars($p->getPhotoProduit());
            $v_prixProduit = htmlspecialchars($p->getPrixProduit());
            $v_libProduit = htmlspecialchars($p->getLibProduit());
            $v_stockProduit = htmlspecialchars($p->getStockProduit());
            $v_idProduit = urlencode($p->getIdProduit());
            //htmlspecialchars();
		echo '<div class = "containerDetail"><div><img class="imageProduit" alt="photo du produit" src="' . $v_photoProduit . '"></div>';
		echo '<div><ul><li>' . $v_prixProduit . ' €</li>';
		echo '<li>' . $v_libProduit . '</li>';
		echo '<li>En stock: ' . $v_stockProduit . '.</li>';
		echo '<li><a href="./index.php?action=addPanier&id=' . $v_idProduit . '">Ajouter au Panier</a></li>'; 
            echo '<li><a href="./index.php?action=delete&id=' . $v_idProduit . '">Supprimer le produit</a></li>';
            echo '<li><a href="./index.php?action=update&id=' . $v_idProduit . '">Modifier le produit</a></li></ul></div></div>';
            ?>             
	</div> 
</main>