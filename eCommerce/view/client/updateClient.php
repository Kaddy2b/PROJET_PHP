
<main>
    <form method="post" action="index.php?controller=client&action=created">
        <fieldset>
            <legend>Modifier ses informations :</legend>
            <p>
                <label for="nom_id">Nom</label> :
                <input type="text" value="<?php echo $client->getId() ?>" name="nomClient" id="nom_id" readonly required/>
                <br />


                <label for="codePostal_id">Code Postal</label> :
                <input type="text" value= name="codePostalClient" id="codePostal_id" required/>
                <br />

                <label for="ville_id">Ville</label> :
                <input type="text" value= name="villeClient" id="ville_id" required/>
                <br />

                <label for="mdp_id">Mot de passe</label> :
                <input type="password" value="Ex : eafit354" name="mdpClient" id="mdp_id" required/>
                <br />

                <label for="confMDP_id">Confirmation mot de passe</label> :
                <input type="password" value="Ex : eafit354" name="confMDPClient" id="confMDP_id" required/>
                <br />
            </p>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset> 
    </form>
</main>
