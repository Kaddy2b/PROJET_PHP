<form method="post" action="index.php?action=updated.php">
            <fieldset>
                <legend>Changer ses informations :</legend>
                <p>
                    <label for="opwd_id">Ancien mot de passe</label> :
                    <input type="password" name="oldPassword" id="opwd_id" required/>
                    <br />
                    
                    <label for="npwd_id">Nouveau mot de passe</label> :
                    <input type="password" name="newPassword" id="npwd_id" required/>
                    <br />
                    
                    <label for="cpwd_id">Confirmer le nouveau mot de passe</label> :
                    <input type="password" name="confirmation" id="cpwd_id" required/>
                    <br />

                </p>
                <p>
                    <input type="submit" value="Enregistrer" />
                </p>
            </fieldset> 
        </form>