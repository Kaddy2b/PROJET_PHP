<main>
<form method="post" action="index.php?action=created">
            <fieldset>
                <legend>Creer un produit</legend>
                <p>
                    <label for="nom_id">Id du produit</label> :
                    <input type="text" placeholder="Ex : 124gk8" name="idProduit" id="p_id" required/>
                    <br />
                    
                    <label for="prenom_id">Label du produit</label> :
                    <input type="text" placeholder="Ex : huile d'olive" name="labelProduit" id="lp_id" required/>
                    <br />
                    
                    <label for="codePostal_id">Prix du produit</label> :
                    <input type="text" placeholder="Ex : 10€" name="prixProduit" id="pp_id" required/>
                    <br />
                    
                    <label for="ville_id">Quantité en stock</label> :
                    <input type="text" placeholder="Ex : 100" name="quantiteStock" id="qsp_id" required/>
                    <br />
                    
                    <label for="login_id">Image du produit</label> :
                    <input type="text" name="imageProduit" id="ip_id"/>
                    <br />
             
                </p>
                <p>
                    <input type="submit" value="Envoyer" />
                </p>
            </fieldset> 
        </form>
</main>