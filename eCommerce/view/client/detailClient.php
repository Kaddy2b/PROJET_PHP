<main>
    <h2>Page du Compte</h2>

    <div class="mainDetail">
        <?php
        $v_idClient = urlencode($c->getIdClient());
        $v_nomClient = htmlspecialchars($c->getNomClient());
        $v_prenomClient = htmlspecialchars($c->getPrenomClient());
        $v_villeClient = htmlspecialchars($c->getVilleClient());
        $v_codePostaleClient = htmlspecialchars($c->getCodePostalClient());
        $v_loginClient = htmlspecialchars($c->getLoginClient());
        echo '<ul> <li>id : ' . $v_idClient . '</li>';
        echo '<li>login : ' . $v_loginClient . '</li>';
        echo '<li>nom : ' . $v_nomClient . '</li>';
        echo '<li>prenom : ' . $v_prenomClient . '</li>';
        echo '<li>habite à : ' . $v_villeClient . '</li>';
        echo '<li>code postale : ' . $v_codePostaleClient . '</li> </ul>';

        echo '<a href="./index.php?action=update&controller=Client&id=' . $v_idClient . '">Modifier mes informations</a>';
        ?>

    </div> 
</main>

