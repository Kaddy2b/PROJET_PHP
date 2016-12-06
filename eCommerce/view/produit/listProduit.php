<main>
	<h2>Tous les produits</h2>
	<div class="mainList">
		<?php

		foreach ($tab_p as $key => $value) { ?>
		<ul class="containerProduit"> <?php
			echo "<li><img class=\"imageProduit\" src=\"$value[4]\"></li>";
			echo "<li><a href=\"./index.php?action=read&id=$value[0]\">> voir l'article</a></li>"; ?> 
		</ul> <?php } ?>
	</div>
</main>