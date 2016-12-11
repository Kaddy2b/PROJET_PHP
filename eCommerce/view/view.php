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
         if(isset($_SESSION['message'])){
             echo $_SESSION['message'];
             unset($_SESSION['message']);
         }
	$filepath = File::build_path(array("view", $controller, "$view.php"));
	require $filepath;
        
   

	include File::build_path(array("view", "footer.php"));
	?>
    </div>
</body>
</html>