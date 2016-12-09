<main>
	<h2>Tous les produits</h2>
	<div class="mainList">
		<?php
		foreach ($tab_p as $key => $value) { ?>
		<ul class="containerProduit"> <?php
                        //$p inexistant, changer $p par $value car on doit accéder à l'objet de la classe, voir la condition de foreach plus haut
                        $v_imageProduit = htmlspecialchars($value->getPhotoProduit());
                        $v_idProduit = htmlspecialchars($value->getIdProduit());
			echo "<li><img class=\"imageProduit\" src=\"$v_imageProduit\"></li>";
			echo "<li><a href=\"./index.php?action=read&id=$v_idProduit\">> voir l'article</a></li>"; ?> 
		</ul> <?php } ?>
	</div>
</main>