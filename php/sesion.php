<?php

class conexion{

	private $conexion; 
	private $server = "mysql.hostinger.es"; 
	private $usuario = "u864262604_hares"; 
	private $pass = "hares08";
	private $db = "u864262604_hares"; 
	private $user ; 
	private $password;


	public function __construct(){

		$this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->db);

		if($this->conexion->connect_errno){

			echo "<script> alert('Fallo al conectar!'); </script>";


		}
	}

	public function cerrar(){

		$this->conexion->close();

	}

	public function cuenta(){
		$usuario = $this->user ;
		return $usuario;

	}



	public function login($usuario, $pass){

                           
		$this->user = $usuario;
		$this->password =  $pass; 

		$query = "SELECT nombreCompleto, email from tb_usuarios WHERE usuario = '".$this->user."' and password = '".$this->password."'";

		$consulta = $this->conexion->query($query);


		if($row = mysqli_fetch_array($consulta)){//CONSULTA DE ACCESO Y CAPTURA DE VALORES	

			 $_SESSION["usuario"] = $this->user;

			if (($_SESSION["usuario"]) === "HARES") 
			  {
			  	header('Location: ../php/envio.php');
			      }else{
			    header('Location: ../colaboruna/registro.php');
			  }
			

		}else{

		    echo '<script> alert("Usuario o clave incorrectos!")</script>';
		      header('Location: ../index.html');


		}
	

	}


}


?>	