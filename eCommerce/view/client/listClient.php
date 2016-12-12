<main>
    <h2>Tous les clients</h2>
    <div class="mainList">
        <?php foreach ($tab_c as $key => $value) { ?>
            <ul class="containerClient"> <?php
        		$v_idClient = htmlspecialchars($value->getIdClient());
        		$v_nomClient = htmlspecialchars($value->getNomClient());
        		$v_prenomClient = htmlspecialchars($value->getPrenomClient());
        		echo "<ul><li>$v_idClient</li>";
        		echo "<li>$v_prenomClient $v_nomClient</li>";
        		echo "<li><a href=\"./index.php?controller=client&action=read&id=$v_idClient\">détail client</a></li></ul>";
            ?> </ul> <?php } ?>
    </div>
</main>