<main>
	<h2>Tous les clients</h2>
	<div class="mainList">
		<?php
		foreach ($tab_p as $key => $value) { ?>
		<ul class="containerProduit"> <?php
                        $v_idClient = htmlspecialchars($p->getIdClient());
			echo "<li><a href=\"./index.php?action=read&id=$v_idClient\">> détail client</a></li>"; ?> 
		</ul> <?php } ?>
	</div>
</main>