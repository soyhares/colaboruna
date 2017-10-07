<?php

	 require('../php/sesion.php');
    require('../php/conexion.php');
    session_start();
    if (! empty($_SESSION["usuario"])) 
  {
      }else{
    echo "<script> alert('No ha iniciado sesión!'); </script>";
    header('Location: ../index.html');
  }

    $identificador = $_SESSION['usuario'];//identifacador

	//Obtener valores del formulario
	$lugar = $_POST['lugar'];
	$actividad = $_POST['actividad'];
	$dias = $_POST['dia'];
	$horaInicio = $_POST['horaInicio'];
	$horaFin = $_POST['horaFin'];
	$fecha= $_POST['datepicker'];
	$horasTotal = $_POST['recordar'];


	 function cuenta_horas($horaInicio, $horaFinal, $min1, $min2, $inTime1, $inTime2){
     
      $h1 = conver_24h($horaInicio,$inTime1);
      $h2 = conver_24h($horaFinal,$inTime2);

     
     if ($h2 < $h1) {
       return $total= "8";
     }

      $hTime = $h2 - $h1;
      $mTime = $min1 - $min2;

      if ($mTime >= "60") {
        $mTime = $mTime / 60;
        $hTime = $hTime - $mTime; 
        $total = $hTime;
      }else{
      	if ($mTime > "0") {
      		$total= $hTime -1;
      	}else{
      	$total = $hTime;
      	}     
      }

       
      
      return $total;
    }


    function conver_24h($hora,$inTime){

      if ($inTime == "pm" ) {
     
            switch ($hora) {
                case "01":
                      $hora ="13";
                      break;
                case "02":
                      $hora ="14";
                      break;
                case "03":
                      $hora="15";
                      break;
                case "04":
                      $hora="16";
                      break;
                case "05":
                      $hora="17";
                      break;
                case "06":
                      $hora="18";
                      break;
                case "07":
                      $hora="19";
                      break;
                case "08":
                      $hora="20";
                      break;
                case "09":
                      $hora="21";
                      break;
                case "10":
                      $hora="22";
                      break;
                case "11":
                      $hora="23";
                      break;
                case "12":
                      $hora="12";
                      break;

                  default:
                     echo "conver_24h no pudo resolver!";
            }
      }else{

      	if ($inTime === "am" && $hora === "12") {
      		$hora = "24";
      	}
      }

      return $hora;
    }

    function longH($h){

     if (strlen($h) < 7) {
       $h = "0".$h;
     }

      return $h;
    }

	//confirma 
	if($horaFin == $horaInicio){
		
		echo '<script> alert("La hora de inicio y fin coinciden!") </script>';
	}else{            
                  $horaInicio= longH($horaInicio);
                  $horaFin = longH($horaFin);
                  
                  $h1 = substr($horaInicio, 0,2);
                  $min1= substr($horaInicio, 2,3);
                  $min1 = substr($min1, 1);
                  $inTime1= substr($horaInicio, 5);

                  $h2 = substr($horaFin, 0,2);
                  $min2= substr($horaFin, 2,3);
                  $min2 = substr($min2, 1);
                  $inTime2=  substr($horaFin, 5);

                  $horasTotal = cuenta_horas( $h1, $h2, $min1, $min2, $inTime1, $inTime2); 
                 
                  



	
		//guardar en la base de datos, tabla tb_registroHoras
		$query="INSERT INTO tb_registroHoras (identificador,sede,actividad,diasColabora,horaInicio,horaFinal,fecha,horasTotal) 
			VALUES ('$identificador','$lugar','$actividad','$dias','$horaInicio','$horaFin','$fecha','$horasTotal')"or die('<script> alert("Error de envio!") </script>');
	       
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
                        <p> Horas registradas correctamente!</p>
                       
			        <button type="button" 
                                 class="btn btn-default btn-lg" style="background-color:#000; color:white;" 
                                 onclick="location.href = '../colaboruna/registro.php' ">Aceptar</button>
                        
		<?php }else{ ?>
                        <p> Error al registrar!</p>
	               
			     <button type="button" 
                             class="btn btn-default btn-lg" style="background-color:#000; color:white;"   
                             onclick="location.href = 'javascript:history.back(-1);' ">Regresar</button>
                        	
		<?php	} ?>		
			
			</div>
		</div>
		
	</body>
	</html>	

	