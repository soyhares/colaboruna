
<?php  
	
	session_start();

if (! empty($_SESSION["usuario"])) 
  {
      }else{
    echo "<script> alert('No ha iniciado sesión!'); </script>";
    header('Location: ../index.html');
  }

$key = $_SESSION['usuario'];
	
	require('../php/conexion.php');

	//Obtener valores del formulario
	$cedula= $_POST['cedula'];
	$nombreCompleto= $_POST['nombreCompleto'];
	$email= $_POST["email"];
	$diaFrecuente = $_POST["diaFrecuente"];



	$conexion = mysqli_connect("mysql.hostinger.es","u864262604_hares","hares08","u864262604_hares");
	$row2 = "SELECT id FROM tb_usuarios WHERE usuario = '".$key."'";
	$resp2 = mysqli_query($conexion, $row2);
	$result2=mysqli_fetch_assoc($resp2);
	$id= $result2['id'];
	

	$row3 = "SELECT id, email FROM tb_usuarios ";
	$resp3 = mysqli_query($conexion, $row3);

	$actualiza = false;
	while ($result3=mysqli_fetch_assoc($resp3)) {
		if ($email != $result3['email']) {
			$actualiza = true;
		}else{
			if ($email == $result3['email'] && $id == $result3['id']) {
				$actualiza = true;
			}else{
				$actualiza = false;
			}
		}
	}

	if($actualiza != true) {
	 
	 echo ' <script> alert("Ya existe el email ingresado!"); </script> ';
	
	}else{
			
					

			$query = "UPDATE tb_usuarios SET cedula='$cedula', nombreCompleto='$nombreCompleto', email='$email', diaFrecuente='$diaFrecuente' 
				WHERE usuario ='$key' " or die(' <script> alert("Error en envio!"); </script> ');
		       
			$resultado=$mysqli->query($query);

		}
?>
	<html>
	<head>
           <title>COLABORUNA</title>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link  rel="stylesheet" href="../css/style.css" >
          <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
          <script src="../js/funtions.js"></script>
	</head>
	<body>
	   <div class="container">
           <div class="jumbotron colorRojoClaro">
                <h1 style="color:black; font-family:Georgia;">COLABORUNA</h1>


		<?php if($resultado>0){ ?>
                        <p> Actualizado correctamente!</p>
                        <div class="centrado"> 
			        <button type="button" 
                                 class="btn btn-danger btn-lg" style="background-color:#000; color:white;" 
                                 onclick="location.href = 'http://www.hares.esy.es/colaboruna/perfil.php' ">Aceptar</button>
                         <div class="centrado"> 
		<?php }else{ ?>
                        <p> Error al Actualizar!</p>
	                <div class="centrado"> 
			     <button type="button" 
                             class="btn btn-danger btn-lg" style="background-color:#000; color:white;" 
                             onclick="location.href = 'javascript:history.back(-1);' ">Regresar</button>
                         <div class="centrado"> 		
		<?php	} ?>		
			
			</div>
		</div>
		
	</body>
	</html>	
	

    

    

	












				