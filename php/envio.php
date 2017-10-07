
<?
	session_start();

	if (! empty($_SESSION["usuario"])) 
	  {
	      }else{
	    echo "<script> alert('No ha iniciado sesión!'); </script>";
	    header('Location: ../index.html');
	  }



	  $var= date("w");
		switch($var) {
			case 1: $key = "Domingo";
			break;
			case 2: $key = "Lunes";
			break;
			case 3:	$key = "Martes";
			break;
			case 4: $key =  "Miércoles";
			break;
			case 5: $key =  "Jueves";
			break;
			case 6: $key = "Viernes";
			break;
			case 7: $key =  "Sábado";
			break;
		}

		echo "El dia de hoy es: ".utf8_decode($key);
		echo "\n";
	?>


	<script type="text/javascript">

	//hacer funcion para pasar enlace por variable a php
	

	</script>


	<?
	$de="COLABORUNA";
	$sitio=" <script> document.write('<a href=http://www.hares.esy.es> COLABORUNA </a>') </script> ";  
	/*From: Datos del emisor
	To: datos receptor
	date:fecha/hora
	sibject:contenido	*/


	$cabecera = "Mine-Version: 1.0\r\n";
	$cabecera .= "Content_type: text/html; Charset= UTF-8 \r\n";
	$cabecera .= "From: $de \r\n";
	$asunto = "DÍA DE HORAS COLABORACIÓN";


	$conexion = mysqli_connect("mysql.hostinger.es","u864262604_hares","hares08","u864262604_hares");
	$row 	= "SELECT nombreCompleto, email, diaFrecuente FROM tb_usuarios  WHERE diaFrecuente = '".$key."' ";
	$resp	= mysqli_query($conexion, $row);
	

	  while ($result = mysqli_fetch_assoc($resp)){ 

		$nombreCompleto =	$result['nombreCompleto'];
		echo " Nombre: ".$nombreCompleto;

		$correoDestino 	= 	$result['email'];
		echo " Email: ".$correoDestino;

		$diaFrecuente 	=	$result['diaFrecuente'];
		echo " Dia: " .utf8_decode($diaFrecuente);

		$cuerpo = "Saludos ".$nombreCompleto."!";
		$cuerpo .= " HARES COLABORUNA le recuerda llevar su control digital de horas colaboración hoy ".$diaFrecuente.".";
		$cuerpo .= " Visite su cuenta en ".$sitio. " para registrar sus nuevas horas. ";
			
		mail($correoDestino, $asunto, $cuerpo, $cabecera);
		echo "\n";
	
	}

	

?>

<!--<a href="javascript:history.back(-1);" title="Ir la página anterior">Volver</a> -->

<?php
//header('Location:' . getenv('HTTP_REFERER'));

?>



