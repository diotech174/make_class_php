<!DOCTYPE html>
<html>
<head>
	<title>MAKECLASSPHP</title>
	<meta charset="utf-8" >
	<link rel="icon" href="app/img/icon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boostrap (css) -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	<!-- Jquery (java script) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="app/js/global_function.js"></script>

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="width: 100%">
		<a class="navbar-brand" href="index.php">MAKE CLASS PHP 1.1</a>
	</nav>
	<div class="container-fluid">
		<?php require_once("js/MessageBox.html"); # Função para mostrar caixa de menságem ?>
		<?php require_once("actions.php"); # Controlador da URL ?>
	</div>

</body>
</html>