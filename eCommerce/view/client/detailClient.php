<main>
	<h2>Page du produit</h2>
	<div class="mainDetail">
		<ul> <?php
                        
                        $v_idClient = urlencode($p->getIdClient());
                        $v_nomClient = htmlspecialchars($p->getNomClient());
                        $v_prenomClient = htmlspecialchars($p->getPrenomClient());
                        $v_villeClient = htmlspecialchars($p->getVilleClient());
                        $v_codePostaleClient = htmlspecialchars($p->getCodePostaleClient());
                        $v_loginClient = htmlspecialchars($p->getLoginClient());
                        //htmlspecialchars();
			echo '<div><li> login : ' . $v_idClient . ' €</li>';
                        echo '<li> login : ' . $v_loginClient . ' €</li>';
			echo '<li> nom : ' . $v_nomClient . '</li>';
			echo '<li> prenom : ' . $v_prenomClient . '.</li>';
			echo '<li> habite à : ' . $v_villeClient . '</li>'; 
                        echo '<li> habite à : ' . $v_codePostaleClient . '</li>';
                        echo '<li><a href="./index.php?action=deleteProduit&id=' . $v_idClient . '">Supprimer le client</a></li>';
                        echo '<li><a href="./index.php?action=updateProduit&id=' . $v_idClient . '">Modifier le client</a></li></div>';
                        ?> 
                        
		</ul>
	</div> 
</main>

