<?php require_once 'highLight/highLight.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Haml Documentation</title>
	<link rel="stylesheet" href="highLight/highLight.css">
	<link rel="stylesheet" href="style/style.css">
    </head>
    <body>
	<div class="main-wrapper">
	    <div class="title">
		<h1>Zend Haml Extension</h1><h4>by Gérard toko</h4>
		<hr>
	    </div>
	    <br>
	    <div class="description">
		<p>Documentation Haml sur <a  TARGET="_blank" href="http://haml.info/tutorial.html">http://haml.info/tutorial.html</a></p>
		<p>Require Zend Framework 1.11 </p>
		<p><a href="http://haml.info/tutorial.html"  TARGET="_blank">On Github</a></p>
		<hr>
	    </div>
	    <br>
	    <div class="docs">		
		<?php echo HighLight::dump('docs/lib.install.txt') ?>
		<br>
		<?php echo HighLight::dump('docs/haml.php') ?>
	    </div>
	</div>
	<br>
    </body>
</html>
