<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Onebit Framework</title>
	<base href="<?=base_url()?>" />
	<link rel="stylesheet" href="public/css/reset.css" type="text/css" media="screen" /> 
	<link rel="stylesheet" href="public/css/text.css" type="text/css" media="screen" /> 
	<link rel="stylesheet" href="public/css/960.css" type="text/css" media="screen" /> 
	<link rel="stylesheet" href="public/css/styles.css" type="text/css" media="screen" />
	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/jquery-ui.min.js"></script>
	<script src="public/js/application.js"/></script>
</head>
<body>
	<div class="container_12">
		<header class="grid_12">
		</header>
		<div class="clear"></div>
		
		<section  class="grid_12">
			<?=$contents?>
		</section>
		<div class="clear"></div>
		
		<footer class="grid_12">
		</footer>
		<div class="clear"></div>
	</div>
</body>
</html>