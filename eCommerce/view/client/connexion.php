<main>
    <div class="mainConnexion">
        <div class="containerConnexion">
        <form method="post" action="index.php?controller=client&action=create">
                <fieldset class="fieldConnex">
                    <legend>Connexion</legend>
                    <div>
                        <label for="login">Login</label> :
                        <input type="text" placeholder="graciag" name="nomClient" id="nom_id" required/>
                    </div>
                    <div>
                        <label for="mdp">Mot de passe</label> :
                        <input type="text" placeholder="gg" name="prenomClient" id="prenom_id" required/>
                    </div>
                    <div>
                        <input type="submit" value="Se connecter" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</main>