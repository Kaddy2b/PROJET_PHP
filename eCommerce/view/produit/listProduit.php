<main>
    <h2>Tous les produits</h2>
    <div class="mainList">
        <?php foreach ($tab_p as $key => $value) { ?>
            <ul class="container"> <?php
        $v_imageProduit = htmlspecialchars($value->getPhotoProduit());
        $v_idProduit = htmlspecialchars($value->getIdProduit());
        echo "<li><img class=\"imageProduit\" src=\"$v_imageProduit\"></li>";
        echo "<li><a href=\"./index.php?action=read&id=$v_idProduit\">> voir l'article</a></li>";
            ?> 
            </ul> <?php } ?>
    </div>
</main>