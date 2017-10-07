<?php
include("../php/sesion.php");


session_start();
$_SESSION['usuario']=$_REQUEST['usuario'];



$user = $_POST['usuario'];
$pass = $_POST['password']; 

$colaboruna = new conexion; 
$colaboruna->login($user, $pass);
$colaboruna->cerrar(); 


?>