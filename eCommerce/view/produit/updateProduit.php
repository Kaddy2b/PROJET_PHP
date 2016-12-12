<main>
    <form method="post" action="index.php?action=updated">
        <fieldset>
            <legend>Modification produit</legend>
            <p>
                <label for="nom_id">Id du produit</label> :
                <input type="text" placeholder="Ex : 124gk8" name="idProduit" id="p_id"/>
                <br />

                <label for="prenom_id">Label du produit</label> :
                <input type="text" placeholder="Ex : huile d'olive" name="labelProduit" id="lp_id"/>
                <br />

                <label for="codePostal_id">Prix du produit</label> :
                <input type="text" placeholder="Ex : 10€" name="prixProduit" id="pp_id"/>
                <br />

                <label for="ville_id">Quantité en stock</label> :
                <input type="text" placeholder="Ex : 100" name="quantiteStock" id="qsp_id"/>
                <br />

                <label for="login_id">Image du produit</label> :
                <input type="file" name="imageProduit" id="ip_id"/>
                <br />

            </p>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset> 
    </form>
</main>