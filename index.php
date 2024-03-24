<?php
	require_once("config.php");
	require_once("controllers/adminPanel_Controller.php");
	//Comprobamos si existe un método get activo. De lo contrario, nos envía de vuelta al la función index de AdminControlador
	if(isset($_GET['act'])){
		if(method_exists("AdminControlador", $_GET['act'])){ AdminControlador::{$_GET['act']}(); }
	}
	else{
		AdminControlador::index();
	}
?>