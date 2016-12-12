<main>
    <form method="post" action="index.php?action=created">
        <fieldset>
            <legend>Creer un produit</legend>
            <p>
                <label for="nom_id">Id du produit</label> :
                <input type="text" placeholder="Ex : 124gk8" name="idProduit" id="p_id" required/>
                <br />

                <label for="label_id">Label du produit</label> :
                <input type="text" placeholder="Ex : huile d'olive" name="labelProduit" id="lp_id" required/>
                <br />

                <label for="prix_id">Prix du produit</label> :
                <input type="text" placeholder="Ex : 10€" name="prixProduit" id="pp_id" required/>
                <br />

                <label for="qstock_id">Quantité en stock</label> :
                <input type="text" placeholder="Ex : 100" name="quantiteStock" id="qsp_id" required/>
                <br />

                <label for="photo_id">Photo du produit</label> :
                <input type="text" name="photoProduit" id="ip_id required"/>
                <br />

            </p>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset> 
    </form>
</main>