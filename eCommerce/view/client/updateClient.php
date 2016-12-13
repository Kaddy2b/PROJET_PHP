<?php 
    $v_idClient = urlencode($c->getIdClient());
    $v_nomClient = htmlspecialchars($c->getNomClient());
    $v_prenomClient = htmlspecialchars($c->getPrenomClient());
    $v_codePostalClient = htmlspecialchars($c->getCodePostalClient());
    $v_villeClient = htmlspecialchars($c->getVilleClient());
    $v_emailClient = htmlspecialchars($c->getEmail());
    $v_loginClient = htmlspecialchars($c->getLoginClient());
?>


<main>
    <form method="post" action="index.php?controller=client&action=updated">
        <fieldset>
            <legend>Modifier ses informations :</legend>
            <p>
                <label for="id_id">Id</label> :
                <input type="number" value="<?php echo "$v_idClient" ?>" name="idClient" id="id_id" readonly required/>
                <br />
                
                <label for="nom_id">Nom</label> :
                <input type="text" value="<?php echo "$v_nomClient" ?>" name="nomClient" id="nom_id" readonly required/>
                <br />

                <label for="nom_id">Prenom</label> :
                <input type="text" value="<?php echo "$v_prenomClient" ?>" name="prenomClient" id="nom_id" readonly required/>
                <br />

                <label for="codePostal_id">Code Postal</label> :
                <input type="text" value="<?php echo "$v_codePostalClient" ?>" name="codePostalClient" id="codePostal_id" required/>
                <br />

                <label for="ville_id">Ville</label> :
                <input type="text" value="<?php echo "$v_villeClient" ?>" name="villeClient" id="ville_id" required/>
                <br />
                
                 <label for="email_id">Email</label> :
                <input type="email" value="<?php echo "$v_emailClient" ?>" name="emailClient" id="email_id" required/>
                <br />

                <label for="login_id">login</label> :
                <input type="text" value="<?php echo "$v_loginClient" ?>" name="loginClient" id="login_id" required/>
                <br />

                <label for="mdp_id">Mot de passe</label> :
                <input type="password" name="mdpClient" id="mdp_id" required/>
                <br />

                <label for="confMDP_id">Confirmation mot de passe</label> :
                <input type="password" name="confMDPClient" id="confMDP_id" required/>
                <br />
            </p>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset> 
    </form>
</main>
