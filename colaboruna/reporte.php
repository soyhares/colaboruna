<?php


include('../php/sesion.php');

session_start();

if (! empty($_SESSION["usuario"])) 
  {
      }else{
    echo "<script> alert('No ha iniciado sesión!'); </script>";
    header('Location: ../index.html');
  }

$key = $_SESSION['usuario'];


$conexion = mysqli_connect("mysql.hostinger.es","u864262604_hares","hares08","u864262604_hares");

$row = "SELECT fecha, sede, actividad, diasColabora, horaInicio, horaFinal, horasTotal FROM tb_registroHoras  WHERE identificador = '".$key."' ORDER BY fecha asc";
$resp= mysqli_query($conexion, $row);
$resps= $resp;
$rowcount=mysqli_num_rows($resp);



if(mysqli_fetch_array($resp) < 0) {
   
   echo ' <script> 

   alert("No tienes registros!");

  </script> ';
  
  }

$row2 = "SELECT cedula, nombreCompleto FROM tb_usuarios WHERE usuario = '".$key."'";
$resp2 = mysqli_query($conexion, $row2);
$result2= mysqli_fetch_assoc($resp2);


 
 
     
 
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>COLABORUNA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link  rel="stylesheet" href="../css/style.css" >
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <script src="../js/jquery.js"></script> 
  <script src="../js/jquery.js"></script> 
  <script src="../js/bootstrap.js"></script> 
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <script src="../js/funtions.js"></script> 
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 <link href="../img/colabouna-ICON.png" rel="icon" type="image/png"  /><!--Define un icono a la página web-->

<script type="text/javascript">
  function recargar(){
         window.location.reload();
        }
</script>

</head>
  <body>
    <div class="header">

      <p> HARES </p>
    

  </div>
        <br/>
       <nav class="navbar navbar-inverse" style="font-family:Georgia;">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#" onclick="recargar()">COLABORUNA</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="../colaboruna/registro.php">Principal</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tablero<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../colaboruna/registro.php">Registrar Horas</a></li>
                  <li><a href="../colaboruna/reporte.php">Mis Horas</a></li>
                  <li><a href="../colaboruna/exportar.php">Exportar PDF</a></li>
        
                </ul>
              </li>
          
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../colaboruna/perfil.php"><span class="glyphicon glyphicon-user"></span> Mi Perfil</a></li>
              <li><a href="../php/cerrarsesion.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
            </ul>
          </div>
        </div>
      </nav>


  <div class="container">

     <div class="jumbotron ">
     <div class="georgia">
        <h1 style="color:black;">Reporte</h1>
       
       </div>
        <br/>
        <div class="positionInfo">                            
                       
              <p style="font-size:12px;">  <?php echo 'Cédula: '.$result2['cedula']; ?>         </p>
              <p style="font-size:12px;">  <?php echo 'Nombre: '.$result2['nombreCompleto']; ?> </p>
              <p style="font-size:12px;">  <?php echo 'Usuario: '.$_SESSION['usuario'];  ?>     </p>                      

                 
        </div>
    
   
     <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>

              <th>Fecha</th>
              <th>Sede</th>
              <th>Actividad</th>
              <th>Día</th>
              <th>Hora Incial</th>
              <th>Hora Final</th>
              <th>Colaboradas</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $total=0; 
       
                while ($result = mysqli_fetch_assoc($resp)){ 

                     $total = $total + $result['horasTotal']; 
                 ?>
                
                <tr>
                  <td><?php echo $result['fecha']; ?>
                  </td>
                  <td>
                    <?php echo $result['sede']; ?>
                  </td>
                  <td>
                    <?php echo $result['actividad']; ?>
                  </td>
                   <td>
                    <?php echo $result['diasColabora']; ?>
                  </td>
                  <td>
                    <?php echo $result['horaInicio']; ?>
                  </td>
                  <td>
                    <?php echo $result['horaFinal']; ?>

               
                  </td>
                   <td>
                    <?php echo $result['horasTotal']."h"; ?>

               
                  </td>
                </tr>
           <?php } ?>
          </tbody>
        </table>
      </div>

      <h4>Total de Horas: 
            <?php 

            echo " ".$total; 


            ?> 
      </h4>
        </div>
     </div>



      <div class="footer">

      <p> Desarollado y diseñado por: Harley Espinoza, Rio Claro, Golfito, Puntarenas, Costa Rica.</p>
    

  </div>
  
  </body>
</html>