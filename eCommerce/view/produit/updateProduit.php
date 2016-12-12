<?php 
    $v_photoProduit = htmlspecialchars($p->getPhotoProduit());
    $v_prixProduit = htmlspecialchars($p->getPrixProduit());
    $v_libProduit = htmlspecialchars($p->getLibProduit());
    $v_stockProduit = htmlspecialchars($p->getStockProduit());
    $v_idProduit = urlencode($p->getIdProduit());

?>

<main>
    <form method="post" action="index.php?action=updated">
        <fieldset>
            <legend>Modification produit</legend>
            <p>
                <label for="p_id">Id du produit</label> :
                <input type="text" value ="<?php echo $v_idProduit ?>"  name="idProduit" id="p_id"/>
                <br />

                <label for="lp_id">Label du produit</label> :
                <input type="text" value ="<?php echo $v_libProduit ?>" name="labelProduit" id="lp_id"/>
                <br />

                <label for="pp_id">Prix du produit</label> :
                <input type="text" value ="<?php echo $v_prixProduit ?>" name="prixProduit" id="pp_id"/>
                <br />

                <label for="qsp_id">Quantité en stock</label> :
                <input type="text" value ="<?php echo $v_stockProduit ?>" name="quantiteStock" id="qsp_id"/>
                <br />

                <label for="ip_id">Image du produit</label> :
                <input type="text" value ="<?php echo $v_photoProduit ?>" name ="photoProduit" id="ip_id"/>
                <br />

            </p>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset> 
    </form>
</main>