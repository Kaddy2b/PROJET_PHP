<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <link rel="stylesheet" type="text/css" href="./style/style.css">
    </head>
    <body>
        <?php include File::build_path(array("view", "header.php")); ?>

        <div class="sousBody">
            <?php

            //var_dump($_SESSION['login']);
            //var_dump($_GET['action']);

            if ((!isset($_SESSION['login']) OR $_SESSION['isAdmin'] != 1) AND (isset($_GET['action']) AND ($_GET['action'] == 'create' OR $_GET['action'] == 'update' OR $_GET['action'] == 'delete'))) {
                require File::build_path(array("view", "error.php"));
            } else {
                //Si il y a un message a afficher
                if (isset($message)) {
                    echo "<h3>" . $message . "</h3>";
                }
                //Si il y a un controller
                if (isset($controller)) {
                    $filepath = File::build_path(array("view", $controller, "$view.php"));
                    require $filepath;
                } else {
                    $filepath = File::build_path(array("view", "$view.php"));
                    require $filepath;
                }
            }

            include File::build_path(array("view", "footer.php"));
            ?>
        </div>
    </body>
</html>