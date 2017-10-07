<?php
	
	
	$mysqli=new mysqli("mysql.hostinger.es","u864262604_hares","hares08","u864262604_hares"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo '<script>Alert("Conexion Fallida!" )<script/>';
		exit();
	}
?>