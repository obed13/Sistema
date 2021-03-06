<?php
    //Inicializar una sesion de PHP
    include("sesion.php");

    $acta=$_POST['acta'];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon.png">

    <title>Control Escolar</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        function Maestro(Noemp){
                        
            document.getElementById('iframe').src= 'maestro.php?noemp=' + Noemp;
        }
        function Alumno(Matricula){
                        
            document.getElementById('iframe2').src= 'alumno.php?matricula=' + Matricula;
        }
        function Calificacion(calificacion){
                        
            document.getElementById('iframe4').src= 'calificacion.php?calificacion=' + calificacion;
        }
        function materias()
        {
            var id_carrera=document.getElementById("carrera").value;
            window.open('materias.php?id='+id_carrera,'Materias','width=500, height=455, scrollbars=yes, menubar=no');

        }
        function alumno(){
            window.open('alumnos.php','Alumnos','width=350, height=450, scrollbars=no, menubar=no');
        }
        function materia(){
            window.open('materia.php','Materias','width=350, height=450, scrollbars=no, menubar=no');
        }
        function maestro(){
            window.open('maestros.php','Maestros','width=350, height=400, scrollbars=no, menubar=no');
        }
    </script>
  </head>
<body>
	<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">Control Escolar</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Impresion <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pdf/index.php?acta=<?php echo$acta;?>" target="_blank">Generar Oficio</a></li>
                <li><a href="pdf/acta.php?acta=<?php echo$acta;?>" target="_blank">Generar Acta</a></li>
                  <li><a href="../logout.php">salir</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Busquedas <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="">Alumno</a></li>
                <li><a href="">Maestro</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alta <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="" onClick="alumno()">Alumnos</a></li>
                <li><a href="" onClick="maestro()">Maestros</a></li>
                <li><a href="" onClick="materia()" >Materias</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Bienvenido:</a></li>
            <li><a href=""><span class="glyphicon glyphicon-user"></span></a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle user" data-toggle="dropdown"><?php echo $Usuario; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="../logout.php">Cerrar Sesion</a></li>
            </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <div class="jumbotron">
        SISTEMA DE ACTAS COMPLEMENTARIAS
        <div class="container">
        	<div class="col-md-4">
        		<form action="save_acta.php" method="POST" class="form-horizontal" role="form" name="form1">
        			<table class="table">
                        <tr>
                            <td colspan="2">
                                <select name="tipo_examen" class="form-control" id="tipo_examen" required>
                                    <option value="">Selecciona</option>
                                    <?php include('examen.php'); ?>
                                </select>
                            </td>
                        </tr>
        				<tr>
        					<td><label for="unidad"><h5>Unidad:</h5></label></td>
        					<td>
        						<select name="unidad" class="form-control" id="unidad" required>
        							<?php include('uni.php'); ?>
        						</select>
        					</td>
        				</tr>
        				<tr>
        					<td><label for="fecha"><h5>Fecha:</h5></label></td>
        					<td><input type="date" name="fecha" id="fecha" class="form-control" placeholder="Fecha" required></td>
        				</tr>
        				<tr>
        					<td><label for="noemp"><h5>No. Emp:</h5></label></td>
        					<td><input type="text" name="noemp" onblur="Maestro(this.value);" id="noemp" class="form-control" placeholder="No. Empleado" required></td>
        				</tr>
        				<tr>
        					<td><label for="emp"><h5>Maestro:</h5></label></td>
        					<td><input type="text" name="emp" id="nombre_maestro" class="form-control" placeholder="Maestro" required></td>
        				</tr>
        				<tr>
        					<td><label for="carrera"><h5>Carrera:</h5></label></td>
        					<td>
        						<select name="carrera" class="form-control" id="carrera" onChange="materias()" required>
                                    <option value="">Seleccionar</option>
                                <?php include("carrera.php"); ?>
        						</select>
        					</td>
        				</tr>
        				<tr>
        					<td><label for="id_materia"><h5>Clave:</h5></label></td>
        					<td><input type="text" name="id_materia" id="id_materia" class="form-control" placeholder="Clave Materia" required></td>
        				</tr>
        				<tr>
        					<td><label for="nombre_materia"><h5>Materia:</h5></label></td>
        					<td><input type="text" name="nombre_materia" id="nombre_materia" class="form-control" placeholder="Materia" required></td>
        				</tr>
        				<tr>
        					<td><label for="plan"><h5>Plan:</h5></label></td>
        					<td><input type="text" name="plan" id="plan" class="form-control" placeholder="Plan" required></td>
        				</tr>
        				<tr>
        					<td><label for="etapa"><h5>Etapa:</h5></label></td>
        					<td><input type="text" name="etapa" id="etapa" class="form-control" placeholder="Etapa" required></td>
        				</tr>
        				<tr>
        					<td><label for="grupo"><h5>Grupo:</h5></label></td>
        					<td><input type="text" name="grupo" id="grupo" class="form-control" placeholder="Grupo" required></td>
        				</tr>
        				<tr>
        					<td><label for="periodo"><h5>Periodo:</h5></label></td>
        					<td>
        						<select name="periodo" class="form-control" id="periodo" required>
        							<option value="">Selecciona</option>
                                    <?php include('periodo.php'); ?>
        						</select>
        					</td>
        				</tr>
        				<tr>
        					<td><label for="motivo"><h5>Motivo:</h5></label></td>
        					<td>
        						<select name="motivo" class="form-control" id="motivo" required>
        							<option value="">Selecciona</option>
                                    <?php include('motivo.php'); ?>
        						</select>
        					</td>
        				</tr>
                        <?php
                            include('conectar_db.php');

                            if ($_POST['acta'] == null) {
                            $find = mysql_query("SELECT no_acta FROM actas_capturadas");
                                while ($row=mysql_fetch_assoc($find)){
                                    $noActa = $row['no_acta'];
                                    $noActa++;
                                }
                                if ($noActa == null) {
                                    $noActa=0;
                                    $noActa++;
                                }
                            }
                            else{
                                $noActa = $_POST['acta'];
                            }
                            
                        ?>
                        <tr>
                            <td><label for="acta"><h5>No. Acta:</h5></label></td>
                            <td><input type="text" name="acta" id="acta" class="form-control" value="<?php echo $noActa;?>" readonly></td>
                        </tr>
        			</table>
        	</div>
        	<div class="col-md-8">
        			<table class="table">
        				<tr>
        					<td></td>
        					<td></td>
        					<td align="center">
                                <button type="reset" class="btn btn-danger" title="Borrar">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </td>
        					<td align="center">
                                <button type="submit" class="btn btn-primary" title="Agregar">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </td>
        				</tr>
        				<tr>
        					<td><label for="matricula">Matricula</label></td>
        					<td><label for="alumno">Alumno</label></td>
        					<td><label for="calificacion">Calificacion</label></td>
        					<td></td>
        				</tr>
        				<tr>
        					<td>
        						<!--<div class="col-lg-10">-->
        							<input type="text" name="matricula" onblur="Alumno(this.value);" value="" id="matricula" class="form-control" placeholder="Matricula"></td>
        						<!--</div>-->
        					<td>
        						<!--<div>-->
        							<input type="text" name="alumno" readonly="readonly" id="alumno" value="" class="form-control" placeholder="Alumno">
        						<!--</div>-->
        					</td>
        					<td>
								<!--<div class="col-lg-8">-->
        							<input type="text" name="calificacion" onblur="Calificacion(this.value);" id="calificacion" class="form-control" placeholder="Calificacion" required>
        						</div>
        					</td>
        					<td>
        						<!--<div>-->
        							<input type="text" name="nombre_calificacion" readonly="readonly" id="nombre_calificacion" class="form-control" placeholder="Calificacion" required>
        						<!--</div>-->
        					</td>
        				</tr>
        			</table>
        		</form>
                <div style="overflow-y: scroll;">
        		<table class="table">
        			<tr class='active'>
        				<th>Matricula</th>
        				<th>Alumno</th>
        				<th colspan="2">Calificacion</th>
        			</tr>
                    <?php
                        $ver = mysql_query("SELECT * FROM acta_detalles WHERE no_acta=".$_POST['acta']);
                        while ($row=mysql_fetch_assoc($ver)) {
                            
                        
        		        echo "  <tr class='success'>";
        		        echo "  	<td>".$row['matricula']."</td>";
        		        echo "  	<td>".$row['nombre_al']."</td>";
        		        echo "  	<td>".$row['numero']."</td>";
        		        echo "  	<td>".$row['letra']."</td>";
        		        echo "  </tr>";
                    }
                    ?>
        		</table>
                </div>
        	</div>
        </div>
      </div>
    </div> <!-- /container -->
    <iframe id="iframe" src="maestro.php" width="0" height="0" frameborder="0"></iframe>
    <iframe id="iframe2" src="alumno.php" width="0" height="0" frameborder="0"></iframe>
    <iframe id="iframe4" src="calificacion.php" width="0" height="0" frameborder="0"></iframe>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>