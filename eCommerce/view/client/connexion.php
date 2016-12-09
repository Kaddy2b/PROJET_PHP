
<main>
    <div class="mainConnexion">
        <div class="containerConnexion">
            <form method="post" action="index.php?controller=client&action=connect">
                <fieldset class="fieldConnex">
                    <legend>Connexion</legend>
                    <div>
                        <label for="login">Login</label> :
                        <input type="text" placeholder="graciag" name="login" id="nom_id" required/>
                    </div>
                    <div>
                        <label for="mdp">Mot de passe</label> :
                        <input type="password" placeholder="gg" name="mdp" id="prenom_id" required/>
                    </div>
                    <div>
                        <input type="submit" value="Se connecter" />
                        <a href="index.php?controller=client&action=create">Pas encore inscrit ?</a>

                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</main>