

<?php
session_start();
$fecha=date('d-m-Y');

 if (! empty($_SESSION["usuario"])) 
  {
      }else{
    echo "<script> alert('No ha iniciado sesión!'); </script>";
    header('Location: ../index.html');
  }
 




?>
<!DOCTYPE html5>
<html lang="en">
<head>
  <title>COLABORUNA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link  rel="stylesheet" href="../css/style.css" >
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <script src="../js/funtions.js"></script> 
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="../img/colabouna-ICON.png" rel="icon" type="image/png"  /><!--Define un icono a la página web-->
<!-- CALENDARIO -->
  <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.7.2.custom.css" />
  
  <script type="text/javascript">
    

        $(document).ready(function() {
           $("#datepicker").datepicker();
        });
</script>
<!-- CALENDARIO FIN-->
<!-- HORA-->
 
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/jquery.timepicker.css" />
  <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker.css" />
  <script type="text/javascript" src="../js/site.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/site.css" />
<!-- HORA FIN-->


<script type="text/javascript">
       

      function reporte(){       
          
          $.mobile.changePage( "#page3", { transition: "slideup", role:"page"});
        }

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

        <div class="jumbotron">
         <div class="georgia">
            <h1 style="color:black;">Registrar Horas</h1> 
             </div>  

                <p></p>
               <br/>


          <form class="form-horizontal" role="form" action="../php/registroHoras.php" method="POST">
      
             
             <div class="form-group">
              <label class="control-label col-sm-2" for="id">Seleccionar Fecha:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" maxlength="10" placeholder="Ingresé la fecha" name="datepicker" id="datepicker" readonly="readonly" size="12"  
                  style="background-color:white;" required />
              </div>
            </div>

           
            <div class="form-group">
              <label class="control-label col-sm-2" for="lugar" >Dependencia/Sede:</label>
              <div class="col-sm-10">
                <select class="form-control" id="sel1" name= "lugar" required /> 
                  <option>Campus Coto.</option>
                  <option>Campus Pérez Zeledón.</option>
                  <option>Campus Liberia.</option>
                  <option>Campus Nicoya.</option>
                  <option>Campus Benjamín Núñez</option>
                  <option>Recinto Sarapiquí</option>
                 <option>Interuniversitaria de Alajuela.</option>
               </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="id">Actividad:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="input" maxlength="25" placeholder="Ingresé la actividad" name="actividad" 
                 required />
              </div>
            </div>

              <div class="form-group">
              <label class="control-label col-sm-2" for="sel1">Día de colaboración:</label>

              <div class="col-sm-10">
              
               <select class="form-control" id="sel1" name="dia" >
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

                <label class="control-label col-sm-2" for="sel1">Hora Inicial:</label>

                <div class="col-sm-10">
            
                  <div class="demo">
                          <input id="scrollDefaultExample1" type="text" class="form-control" name= "horaInicio"  size="12"  
                 style="background-color:white;" placeholder="Indiqué la hora inicial" maxlength="6"  required/>
                      
            
                  </div>

               <script>
                  $(function() {
                      $('#scrollDefaultExample1').timepicker({ 'scrollDefault': 'now' });
                  });
              </script>
            </div>   
          </div>

          <div class="form-group">

            <label class="control-label col-sm-2" for="sel1">Hora Final:</label>

              <div class="col-sm-10">
            
                  <div class="demo">
                          <input id="scrollDefaultExample2" type="text" class="form-control" name= "horaFin" size="12"  
         style="background-color:white;" placeholder="Indiqué la hora final"  maxlength="6"  required />
                    
                      </p>
                  </div>

               <script>
                  $(function() {
                      $('#scrollDefaultExample2').timepicker({ 'scrollDefault': 'now' });
                  });
              </script>
            </div>   

        </div>


          

            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
              
              <div class="centrado"> 
                
                <button type="submit" class="btn btn-default btn-lg" style="background-color:#000; color:white;">Listo!</button>
               
                
              </div>
              
                 </div> 
            </div>
      </form>

    </div> 


      </div>


   
  <div class="footer">

      <p> Desarollado y diseñado por: Harley Espinoza, Rio Claro, Golfito, Puntarenas, Costa Rica.</p>
    

  </div>
  

</body>

</html>   