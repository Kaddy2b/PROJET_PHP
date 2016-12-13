<?php
//Si il y a un controller
if (isset($controller)) {
    $filepath = File::build_path(array("view", $controller, "error" . ucfirst($controller) . ".php"));
    require $filepath;
} else {
    ?>
    <main>
    	<h2>Erreur !</h2>
    	<p>Erreur inconnu...</p>
    </main>
    <?php
}
?>