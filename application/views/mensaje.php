<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titulo; ?></title>
<link rel="icon" type="image/png" href="<?php echo base_url('img/favicon.png');?> ">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('img/favicon-32x32.png');?> ">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('img/favicon-96x96.png');?> ">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('img/favicon-16x16.png');?> ">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
</head>
<body>
	<div class="container text-center">
		<h3><?php echo $mensaje; ?></h3>
		<a class="btn btn-<?php echo $bt; ?>" href="<?php echo base_url($link); ?>" >continuar</a>
	</div>
</body>
</html>
 