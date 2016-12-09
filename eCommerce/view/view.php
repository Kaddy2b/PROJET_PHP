<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $pagetitle; ?></title>
	<link rel="stylesheet" type="text/css" href="./style/style.css">
</head>
<body>
	<?php
	include File::build_path(array("view", "header.php"));
        
        if(isset($message)){
            echo '$message';
            echo "BITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITEBITE";
        }
        
	$filepath = File::build_path(array("view", $controller, "$view.php"));
	require $filepath;
        
   

	include File::build_path(array("view", "footer.php"));
	?>
</body>
</html>