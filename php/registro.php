
<?php  
	
	
	
	require('../php/conexion.php');

	//Obtener valores del formulario
	$cedula= $_POST['cedula'];
	$nombreCompleto= $_POST['nombreCompleto'];
	$email= $_POST["email"];
	$diaFrecuente = $_POST["diaFrecuente"];
	$usuario= $_POST['usuario'];
	$password= $_POST['password'];
	$confpassword= $_POST['confpassword'];



	//Datos a checar Usuario 
	$conexion = mysqli_connect("mysql.hostinger.es","u864262604_hares","hares08","u864262604_hares");
	$row = ("SELECT * FROM tb_usuarios WHERE usuario = '".$usuario."'");
	$check =  mysqli_query($conexion, $row);

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

	if ($actualiza !=true) {
		 echo ' <script> alert("Ya existe una cuenta con tu email"); </script> ';
	}else{



			if(mysqli_fetch_array($check) > 0) {
			 
			 echo ' <script> alert("Ya existe este nombre de usuario!"); </script> ';
			
			}else{
					
					//confirma password's
					//Encripta password
					
					if($password != $confpassword){
						echo '<script> alert("Las password no coinciden!"); </script>';
						
					}
					
					else{//$password = md5($password);

					//guardar en la base de datos, tabla tb_usuarios

					$query = "INSERT INTO tb_usuarios (cedula, nombreCompleto, email, diaFrecuente, usuario, password) 
						VALUES ('$cedula', '$nombreCompleto', '$email','$diaFrecuente', '$usuario', '$password')" or die(' <script> alert("Error en envio!"); </script> ');
				       
					$resultado=$mysqli->query($query);

					}
			}
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
                        <p> Registrado correctamente!</p>
                        <div class="centrado"> 
			        <button type="button" 
                                 class="btn btn-danger btn-lg" style="background-color:#000; color:white;" 
                                 onclick="location.href = 'http://www.hares.esy.es' ">Ingresar</button>
                         <div class="centrado"> 
		<?php }else{ ?>
                        <p> Error al registrar!</p>
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
	

    

    

	












				