<main>
    <h2>Page du Compte</h2>

    <?php
    var_dump($c->getIdClient());
    ?>

    <div class="mainDetail">
        <?php
        $v_idClient = urlencode($c->getIdClient());
        $v_nomClient = htmlspecialchars($c->getNomClient());
        $v_prenomClient = htmlspecialchars($c->getPrenomClient());
        $v_villeClient = htmlspecialchars($c->getVilleClient());
        $v_codePostaleClient = htmlspecialchars($c->getCodePostaleClient());
        $v_loginClient = htmlspecialchars($c->getLoginClient());
        echo '<li>id : ' . $v_idClient . '</li>';
        echo '<li>login : ' . $v_loginClient . '</li>';
        echo '<li>nom : ' . $v_nomClient . '</li>';
        echo '<li>prenom : ' . $v_prenomClient . '</li>';
        echo '<li>habite à : ' . $v_villeClient . '</li>';
        echo '<li>code postale : ' . $v_codePostaleClient . '</li>';

        echo '<li><a href="./index.php?action=delete&controller=Client&id=' . $v_idClient . '">Supprimer le client</a></li>';
        echo '<li><a href="./index.php?action=update&controller=Client&id=' . $v_idClient . '">Modifier le client</a></li>';
        ?>

    </div> 
</main>

