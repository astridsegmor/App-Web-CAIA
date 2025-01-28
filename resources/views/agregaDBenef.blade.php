<x-app-layout>

<script type="text/javascript">
window.onload=function(){
	Objeto=document.getElementsByTagName("a");
	for(a=0;a<Objeto.length;a++){
		Objeto[a].onclick=function(){
			location.replace(this.href);
			return false;
		}
	}
}
</script>
<script>
	function mayuscul(field) { field.value = field.value.toUpperCase() }
</script>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
	<title>Aplicación WEB Departamento CAIA - UMO TRUJILLO</title>
	<link rel="stylesheet" href="../public/styles.css">
    <link href="../public/styleNunito.css" rel="stylesheet">
	<script language="JavaScript" type="text/javascript" src="../public/readValid.js"></script>
	<script language="JavaScript" type="text/javascript" src="../public/ajax.js"></script>
</head>
<body style="padding:8px; font-family: 'Nunito', sans-serif;">
	<?php
		if(!function_exists("verificar_exist")) {
			function verificar_exist($tabla,$campo1="",$dato1="",$campo2="",$dato2="") {
			require 'openBD.php';
			//$dbconB = mysqli_connect("localhost", "root", "root", "caia_ipasme");

			$expsql= "select * from ".$tabla." where ".$campo1." = '".$dato1."' and ".$campo2." = '".$dato2."'";
//			echo $expsql;
			$consulB=mysqli_query($dbcon,$expsql);
			if (mysqli_num_rows($consulB)!=0) {
				return true;}
			else {
				return false;}
			}
		}

		if(!function_exists("guardarDatosB")) {
			function guardarDatosB(){
			require 'openBD.php';
			//$conexion = mysqli_connect("localhost", "root", "root","caia_ipasme");
			$cedula = trim($_POST["CedulaAForm"]);
			$queryInsert = "INSERT INTO beneficiarios VALUES ('".$_POST['apellNombB']."','".$_POST['cedulaB']."','".$_POST['FecNacB']."','".$_POST['sexoB']."',
							'".$_POST['edoCivilB']."','".$_POST['parentescoB']."', '".$cedula."', idBenef);";

			$resultInsert = mysqli_query($dbcon, $queryInsert); 

			if($resultInsert)
			{
				echo "<strong>Se ingresaron los datos del Beneficiario con exito...</strong>. <br>";
			}
			else
			{
				echo "No se ingresaron los datos.... <br>";
			}
		 
			}
		}

		?>
    <nav>
        <img src="../../img/cintilloIpas.jpg" alt="fondo">
        <div class="sp">
            <ul>
                <li>
					<a href="{{ url('dashboard') }}"><h4 style="font-size:16px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">← Regresar</h4></a>
                </li>
            </ul>
        </div>
    </nav>
    <div style="padding-bottom: 0px;">
	<?php
	require 'openBD.php';
	//session_start();
	//$conexion = mysqli_connect("localhost", "root", "root", "caia_ipasme");
	if (isset($_POST)) {
		$_SESSION["cedA"] = $_POST["CedulaAForm"];
	} else if (isset($_GET)){
		$_SESSION["cedA"] = $_GET["CedulaAForm"];
		dd('sirvio....');
	}
	$cedula = $_SESSION["cedA"];
	$query = "SELECT * FROM afiliado WHERE CedulaA='$cedula'";
	$resultBuscar = mysqli_query($dbcon,$query) or die('Consulta fallida: '); //. mysqli_error($conexion));
	if (mysqli_num_rows($resultBuscar)!=0) 
	//if ($resultBuscar)
	{
		$row = mysqli_fetch_array($resultBuscar,MYSQLI_ASSOC);
		$cedula = " ".$cedula." ";
		$nombreA = " ".$row["PriApellido"]." ".$row["SegApellido"].", ".$row["PriNombre"]." ".$row["SegNombre"];
		echo '
		<hr>
		<table border="0px" cellpadding="0px" cellspacing="0px">
			<tr>
				<td>
					<strong><h3 style="color:blue">AFILIADO:  '.$nombreA.'
				</td>
			</tr>
		</table>';
	}
	?>
	</div>
    <div style="padding-bottom: 0px;">
        <center>
		<h1 style="font-size:24px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">Registro de Beneficiarios</h1>
       </center>
    </div>
    <div style="padding-bottom: 0px;">
        <center>
		<form action="" method="post" id="DatosB">
		@csrf
		<hr>
		<table border="3px">
		<thead>
			<tr>
				<th>
				 Cédula Afiliado
				</th>
				<th>
				 Cédula Beneficiario
				</th>
				<th>
				 Apellidos y Nombres
				</th>
				<th>
				 Fecha Nacimiento
				</th>
				<th>
				 Sexo
				</th>
				<th>
				 Estado Civil
				</th>
				<th>
				 Parentesco
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
				 <?php echo '<input type="text" name="CedulaAForm" style="height: 35px;font-size:13px" value="'.trim($cedula).'" readonly>'; ?>
				</td>
				<td>
				 <input type="text" name="cedulaB" id="cedulaB" title="Ej.-> V-04.333.555, V-21.222.333"
						pattern="[V|E]-[0-9]{2}.[0-9]{3}.[0-9]{3}" style="height: 35px;font-size:13px" placeholder="V-99.999.999">
				</td>
				<td>
				 <input type="text" name="apellNombB" id="apellNombB" size="45" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)" required>
				</td>
				<td>
				 <?php
				 $FecAct = date('Y-m-d');
				 $FecAct = date( "Y-m-d", strtotime( "$FecAct -1 day" ) );
//				 <input type="date" name="fecNacB" id="fecNacB" style="font-size:16px">
				 echo '<input type="date" max="'.$FecAct.'" name="FecNacB" id="FecNacB" style="height: 35px;font-size:13px">';
				 ?>
				</td>
				<td>
				<select name="sexoB" id="sexoB" style="height: 35px;font-size:13px">
					<option selected="selected">Femenino</option>
					<option>Masculino</option>
				</select>
				</td>
				<td>
				<select name="edoCivilB" id="edoCivilB" style="height: 35px;font-size:13px">
					<option selected="selected">Soltero(a)</option>
					<option>Casado(a)</option>
					<option>Viudo(a)</option>
					<option>Divorciado(a)</option>
				</select>
				</td>
				<td>
				<select name="parentescoB" id="parentescoB" style="height: 35px;font-size:13px">
					<option selected="selected">Madre</option>
					<option>Padre</option>
					<option>Hijo(a)</option>
					<option>Esposo(a)</option>
				</select>
				</td>
			</tr>
		</tbody>
		</table>
		<br><br>
			<?php
				if(array_key_exists('Guardar', $_POST)) {
					$cedA=$_POST['CedulaAForm'];
					$cedB=$_POST['cedulaB'];
					$dato2B="CedulaB";
					$fech=false;
					//echo "Cedula....".$cedA;
					//sleep(30);
					if (empty($cedB)) {
						$fech=true;
						$cedB= $_POST["fecNacB"];
						$dato2B="FecNacB";
					}
					if (verificar_exist("beneficiarios","Cedula_A","$cedA","$dato2B","$cedB")) {
						echo "<strong>Existe Beneficiario registrado con esa Cédula:....";
//						echo "Afiliado: ";
//						echo $cedA;
//						echo "</br>Beneficiario: ";
						//echo $_POST['apellNombB'].', ';
						if ($fech) {
							echo date("d-m-Y", strtotime($cedB));
						}
						else {
							echo $cedB;
						}
						//echo "</br>Verifica los datos....";
						}
					else {
						//echo "</br>Guardar los datos....";
						guardarDatosB();
					};
				}
				?>
            <div>
                <hr>
				<input class="boton" type="submit" style="font-size:16px;border-radius: 5px" name="Guardar" value="Guardar">
				<input class="boton" type="reset" style="font-size:16px;border-radius: 5px" name="Limpiar" value="Limpiar">
			</div>
         <br /> <div id="mostrar"> </div>
    </form>
	  <hr>
      </center>
    </div>
	<div>
		<center>
		<!-- <form action="" method="POST">
		@csrf -->
		<table border="3px" cellpadding="5px">
			<h3>BENEFICIARIOS REGISTRADOS
			<thead>
			<tr>
				<th>
				 Cédula
				</th>
				<th>
				 Apellidos y Nombres
				</th>
				<th>
				 Fecha Nacimiento
				</th>
				<th>
				 Sexo
				</th>
				<th>
				 Estado Civil
				</th>
				<th>
				 Parentesco
				</th>
			</tr>
			</thead>
			<?php
				$ced = trim($cedula);
				$query = "SELECT * FROM beneficiarios WHERE Cedula_A='$ced'";
				$result = mysqli_query($dbcon,$query) or die('Consulta fallida: ' . mysql_error($conexion));
				$numB = 0;
				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
					$numB=$row['idBenef'];
					//$idB="idB=".$row['idBenef'];
					//$pCed="'".$row['CedulaB']."'";
					//$pCed="cedA=".$ced;
					//$idB=$idB."&".$pCed; ?>
					<tr bgcolor="white" align="center" style="font-size:13px;">
						<!-- <td><input type="text" name="cedBenef" value="<?//=$row['CedulaB']?>" readonly></td> -->
						<td><?=$row['CedulaB']?></td>
						<td><?=$row['Apellidos_Nombres'] ?></td>
						<td><?=date("d-m-Y", strtotime($row['FecNacB'])) ?></td>
						<td><?=$row['SexoB'] ?></td>
						<td><?=$row['EdoCivilB'] ?></td>
						<td><?=$row['Parentesco'] ?></td>
						<!-- <td> <a type="button" onclick="eliminarBenef()">Borrar</a></td> -->
						<!-- <td> <input type="button" value="Borrar" onclick="eliminarBenef(<?php //echo $numB; ?>)"></td> -->
						<!-- <td> <input type="button" value="Borrar" onclick="return eliminarB(<?php //echo $pCed ?>,<?php //echo $numB ?>)"></td> -->
						</tr>
				<?php 
				$numB++;
				}
				if ($numB==0){
					echo '<tr><strong><h3 style="color:blue;">No tiene Beneficiarios registrados</tr>';}
				mysqli_free_result($resultBuscar); 
				mysqli_close($dbcon); 
			?>
			<script>

				/*connection.connect((err) => {
					if (err) {
						console.error('Error de conexión: ', err.stack);
						return;
					}
					console.log('¡Conexión exitosa a la base de datos MySQL!');
					//alert("Exito...");
				});*/

				function eliminarB(idB,filaB){
					/*const conex = require('mysql');

					const connection = conex.createConnection({
						host: '127.0.0.1',
						port: '3306',
						user: 'root',
						password: '',
						database: 'caiaipasme'
					});*/

					confE=confirm("Desea eliminar al Beneficiario de cédula: "+idB+filaB);
					//console.log('Cedula:'+idB);
					if (confE) {
						filaElim = filaB.parentNode.parentNode;
						filaElim.parentNode.removeChild(filaElim);
					}
					return true;
				}
			</script>
		</table></br>
		<!-- </form> -->
		</center>
	</div>
    <footer2>
        <div class="footer-links2">
                <td><p align="center" style="font-size:14px;">UMO IPASME - TRUJILLO Av. García de Paredes Sector Santa Rosa</p></td>
        </div>
    </footer2>

</body>
</html>
</x-app-layout>
