<main>
	<h2>Tous les produits</h2>
	<div class="mainList">
		<?php
                echo $tab_p;
		foreach ($tab_p as $key => $value) { ?>
		<ul class="containerProduit"> <?php
                        
                        $v_imageProduit = htmlspecialchars($p->getPhotoProduit());
                        $v_idProduit = htmlspecialchars($p->getIdProduit());
			echo "<li><img class=\"imageProduit\" src=\"$v_imageProduit\"></li>";
			echo "<li><a href=\"./index.php?action=read&id=$v_idProduit\">> voir l'article</a></li>"; ?> 
		</ul> <?php } ?>
	</div>
</main>