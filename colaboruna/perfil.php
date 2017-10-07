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

$row = "SELECT  horasTotal FROM tb_registroHoras  WHERE identificador = '".$key."' ORDER BY fecha asc";
$resp= mysqli_query($conexion, $row);
$resps= $resp;
$rowcount=mysqli_num_rows($resp);

  $total=0; 
       
   while ($result = mysqli_fetch_assoc($resp)){ 
    
      $total = $total + $result['horasTotal'];

  }

$row2 = "SELECT cedula, nombreCompleto, email, diaFrecuente FROM tb_usuarios WHERE usuario = '".$key."'";
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
          <h1 style="color:black;">COLABORUNA</h1>  
             <p></p> 
          <h3 style="color:black; paddding:3%;"><?php echo "Usuario: ".$key ?></h3>   

  
       </div>
          <label style="color:black; paddding:3%;"><?php echo "Horas Registradas: ".$total."h" ?></label>
                 
                   
                      <h4 style="color:black; padding:3%; margin:1%;">Datos Personales:</h4>
                     
                        <form class="form-horizontal" role="form" action="../php/actualizaPerfil.php" method="POST">

                              <div class="form-group">
                                <label class="control-label col-sm-2" for="id">Cédula:</label>
                                <div class="col-sm-10">
                                  <input type="tel" class="form-control" id="input" maxlength="12" placeholder="Cambiar su cédula" name="cedula" value="<?php echo $result2['cedula']; ?> " required />
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-2" for="id">Nombre Completo:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="input" maxlength="50" placeholder="Cambiar nombre y apellidos" name="nombreCompleto"  value="<?php echo $result2['nombreCompleto']; ?> " required/>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-2" for="id">Email:</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="email" maxlength="50" placeholder="example@mail.com" name="email" value="<?php echo $result2['email']; ?> " required/>
                                </div>
                              </div>


                              <div class="form-group">
                                <label class="control-label col-sm-2" for="sel1">Dia Frecuente:</label>

                                <div class="col-sm-10">
                                
                                 <select class="form-control" id="sel1" name="diaFrecuente" >
                                    <option><?php echo $result2['diaFrecuente']; ?></option>
                                    <option>Lunes</option>
                                    <option>Martes</option>
                                    <option>Miércoles</option>
                                    <option>Jueves</option>
                                    <option>Viernes</option>
                                    <option>Sábado</option>
                                 </select>
                                 
                                </div>
                              </div>                         
                              

                              
                              <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10">

                                <div class="centrado"> 
                                
                                  <button type="submit" class="btn btn-default btn-lg" style="background-color:#000; color:white;">MODIFICAR</button>
                              
                                </div>
                                   </div> 
                              </div>

                          </form>

                 
                     

                       

                  </div>



                </div> 


</div>
     



      <div class="footer">

      <p> Desarollado y diseñado por: Harley Espinoza, Rio Claro, Golfito, Puntarenas, Costa Rica.</p>
    

      </div>
  
  </body>
</html>