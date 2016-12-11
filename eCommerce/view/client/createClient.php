
<main>
    <form method="post" action="index.php?controller=client&action=created">
        <fieldset>
            <legend>S'inscrire :</legend>
            <p>
                <label for="nom_id">Nom</label> :
                <input type="text" placeholder="Ex : Dupont" name="nomClient" id="nom_id" required/>
                <br />

                <label for="prenom_id">Prenom</label> :
                <input type="text" placeholder="Ex : Jacques" name="prenomClient" id="prenom_id" required/>
                <br />

                <label for="codePostal_id">Code Postal</label> :
                <input type="text" placeholder="Ex : 26 130" name="codePostalClient" id="codePostal_id" required/>
                <br />

                <label for="ville_id">Ville</label> :
                <input type="text" placeholder="Ex : Saint-Paul-Trois-Chateaux" name="villeClient" id="ville_id" required/>
                <br />
                
                <label for="email_id">Email</label> :
                <input type="email" placeholder="Ex : bonjour@exemple.com" name="emailClient" id="email_id" required/>
                <br />

                <label for="login_id">login</label> :
                <input type="text" placeholder="Ex : Amn3si" name="loginClient" id="login_id" required/>
                <br />

                <label for="mdp_id">Mot de passe</label> :
                <input type="password" placeholder="Ex : eafit354" name="mdpClient" id="mdp_id" required/>
                <br />

                <label for="confMDP_id">Confirmation mot de passe</label> :
                <input type="password" placeholder="Ex : eafit354" name="confMDPClient" id="confMDP_id" required/>
                <br />
            </p>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset> 
    </form>
</main>
