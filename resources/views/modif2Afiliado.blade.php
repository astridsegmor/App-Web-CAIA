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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
	function mayuscul(field) { field.value = field.value.toUpperCase() }
</script>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<title>Aplicación WEB Departamento CAIA - UMO TRUJILLO</title>
	<link rel="stylesheet" href="../../CaiaIpasme/public/styles.css">
	<?php include "../../proyectoCaia/readValid.php"; ?>
    <link href="../../CaiaIpasme/public/styleNunito.css" rel="stylesheet">
</head>
<body style="padding:8px; font-family: 'Nunito', sans-serif;">
	<?php
		function guardarDatosM(){	
			require 'openBD.php';
	//		$conexion = mysqli_connect("localhost", "root", "root", "caia_ipasme");
		//	mysqli_select_db($dbcon,"caia_ipasme");
			$papellido = $_POST["PapellidoForm"];
			$sapellido = $_POST["SapellidoForm"];
			$pnombre = $_POST["PnombreForm"];
			$snombre = $_POST["SnombreForm"];
			$cedula = $_POST["CedulaAForm"];
			$sexo = $_POST["Sexo"];
			$fecnac = $_POST["FecNac"];
			$edociv = $_POST["EdoCivil"];
			$dirh = $_POST["DirHabForm"];
			$dirt = $_POST["DirTraForm"];
			$edo = $_POST["EstadoForm"];
			$mpcio = $_POST["McpioForm"];
			$parroq = $_POST["ParroquiaForm"];
			$ciudad = $_POST["CiudadForm"];
			$email = $_POST["EmailForm"];
			$tlfcel = $_POST["TlfCelForm"];
			$tlfhab = $_POST["TlfHabForm"];
			$tlftra = $_POST["TlfTraForm"];
			$orgdep = $_POST["OrgDep"];
			$tipocargo = $_POST["TipoCargo"];
			$condemp = $_POST["CondEmp"];
			$fecIng = $_POST["FecIng"];
			$query = "UPDATE afiliado SET PriApellido='$papellido',SegApellido='$sapellido',PriNombre='$pnombre',SegNombre='$snombre',
						CedulaA='$cedula',SexoA='$sexo',FecNacA='$fecnac',EdoCivil='$edociv',DirHab='$dirh',DirTra='$dirt',Estado='$edo',Municipio='$mpcio',Parroquia='$parroq',
						Ciudad='$ciudad',Email='$email',TlfCel='$tlfcel',TlfHab='$tlfhab',TlfTrab='$tlftra',OrgDepende='$orgdep',TipoCargo='$tipocargo',CondEmpleo='$condemp',fecIngA='$fecIng' 
						WHERE CedulaA='$cedula'";
			$resultBuscar = mysqli_query($dbcon,$query); // or die('Consulta fallida: '); // . mysql_error($conexion));
			
			if($resultBuscar)
			{
			echo "<strong>Modificación de datos se realizó con éxito...<br>";
			}
			else
			{
			echo "<strong>Modificación de datos fallida...<br>";
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
		<h1 style="font-size:24px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">Modificar Datos del Afiliado</h1>
    <!-- <h2 style="text-align:center">Modificar Datos del Afiliado</h2> -->
    <div>
        <center>
		<?php	
			require 'openBD.php';
		//	$conexion = mysqli_connect("localhost", "root", "root", "caia_ipasme");
			$cedula = $_POST["CedulaAForm"];
			$query = "SELECT * FROM afiliado WHERE CedulaA='$cedula'";
			$resultBuscar = mysqli_query($dbcon,$query) or die('Consulta fallida: '); //. mysqli_error($conexion));
			$FecAct = date('Y-m-d');
			$FecAct = date( "Y-m-d", strtotime( "$FecAct -18 Year" ) );
			if (mysqli_num_rows($resultBuscar)!=0) 
		//	if ($resultBuscar)
			{
				$row = mysqli_fetch_array($resultBuscar,MYSQLI_ASSOC);
				echo '
				<form action="" method="POST">'?>
				@csrf
				<?php
				echo '<strong><hr>
				<table style="font-size:13px; border:3px; background:white">
					<h3 style="font-size:16px; font-weight:bold; text-align:center;padding-bottom: 5px;">DATOS DEL AFILIADO
					<tr style="padding-bottom: 5px;">
						<td>
						Primer Apellido: <input type="text" name="PapellidoForm" style="height: 35px;text-transform:uppercase;font-size:13px;" value="'.$row["PriApellido"].'" required><p/>
						</td>
						<td>
						Segundo Apellido: <input type="text" name="SapellidoForm" style="height: 35px;text-transform:uppercase;font-size:13px;" value="'.$row["SegApellido"].'" onkeyup="mayuscul(this)"><p/>
						</td>
						<td>
						Primer Nombre : <input type="text" name="PnombreForm" style="height: 35px;text-transform:uppercase;font-size:13px" value="'.$row["PriNombre"].'" onkeyup="mayuscul(this)" required><p/>
						</td>
						<td>
						Segundo Nombre: <input type="text" name="SnombreForm" style="height: 35px;text-transform:uppercase;font-size:13px" value="'.$row["SegNombre"].'" onkeyup="mayuscul(this)"><p/>
						</td>
					</tr>
					<tr>
						<td>
						Cedula Afiliado : <input type="text" name="CedulaAForm" pattern="[V]-[0-9]{2}.[0-9]{3}.[0-9]{3}" title="Ej.-> V-04.333.555, V-21.222.333" 
											style="height: 35px;font-size:13px" value="'.$row["CedulaA"].'" placeholder="V-99.999.999" readonly>
						</td>
						<td>
						Sexo :
						<select name="Sexo" value="selected" style="height: 35px;font-size:13px">
							<option>'.$row["SexoA"].'</option>
							<option>Femenino</option>
							<option>Masculino</option>
						</select>
						</td>
						<td>
						Fecha Nacimiento: <input type="date" max="'.$FecAct.'" name="FecNac" value="'.$row["FecNacA"].'" style="height: 35px;font-size:13px">
						</td>
						<td>
						Estado Civil :
						<select name="EdoCivil" value="selected" style="height: 35px;font-size:13px">
							<option>'.$row["EdoCivil"].'</option>
							<option>Soltero(a)</option> 
							<option>Casado(a)</option>
							<option>Viudo(a)</option>
							<option>Divorciado(a)</option>
						</select>
						</td>
					</tr>
				</table><br>
				<table style="font-size:13px; border:3px; background:white"
					<tr>
						<td>
						Dirección de Habitación : <input type="text" name="DirHabForm" size="140" style="height: 35px;text-transform:uppercase;font-size:13px" value="'.$row["DirHab"].'" onkeyup="mayuscul(this)">
						</td>
					</tr>
					<tr>
						<td>
						Dirección de Trabajo...... : <input type="text" name="DirTraForm" size="140" style="height: 35px;text-transform:uppercase;font-size:13px" value="'.$row["DirTra"].'" onkeyup="mayuscul(this)">
						</td>
					</tr>
				</table><br>
				<table style="font-size:13px; border:3px; background:white">
					<tr>
						<td>
						Estado: <input type="text" name="EstadoForm" value="'.$row["Estado"].'" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)" required> 
						</td>
						<td>
						Ciudad: <input type="text" name="CiudadForm" value="'.$row["Ciudad"].'" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)">
						</td>
						<td>
						Municipio : <input type="text" name="McpioForm" value="'.$row["Municipio"].'" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)" required>
						</td>
						<td>
						Parroquia: <input type="text" name="ParroquiaForm" value="'.$row["Parroquia"].'" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)">
						</td>
					</tr>
					<tr>
						<td>
						Correo Electrónico: <input type="email" name="EmailForm" value="'.$row["Email"].'" style="height: 35px;font-size:13px"> 
						</td>
						<td>
						Teléfono Celular: <input type="tel" name="TlfCelForm" id="tlfX" value="'.$row["TlfCel"].'" pattern="[0-9]{4}-[0-9]{7}" title="Ej.-> 0416-1234567" style="height: 35px;font-size:13px" placeholder="0416-1234567" required>
						</td>
						<td>
						Teléfono Habitación : <input type="tel" name="TlfHabForm" id="tlf2" value="'.$row["TlfHab"].'" pattern="[0-9]{4}-[0-9]{7}" title="Ej.-> 0272-1234567" style="height: 35px;font-size:13px"  placeholder="0272-1234567">
						</td>
						<td>
						Teléfono Trabajo: <input type="tel" name="TlfTraForm" id="tlf3" value="'.$row["TlfTrab"].'" pattern="[0-9]{4}-[0-9]{7}" title="Ej.-> 0416-1234567" style="height: 35px;font-size:13px"  placeholder="0416-1234567">
						</td>
					</tr>
				</table><br><hr>
				<table style="font-size:13px; border:3px; background:white">
					<h3 style="font-size:16px; font-weight:bold; text-align:center;">DATOS ADMINISTRATIVOS
					<tr>
						<td>';
							$FecIng = date('Y-m-d');
							echo 'Fecha de Afiliación: <input type="date" max="'.$FecIng.'" name="FecIng" value="'.$row["fecIngA"].'" id="FecIng" style="height: 35px;font-size:13px">
						</td>
						<td>
						Organismo del cual depende :
						<select name="OrgDep" value="selected" style="height: 35px;font-size:13px">
							<option>'.$row["OrgDepende"].'</option>
							<option>IPASME</option>
							<option>M.P.P.E</option>
							<option>GOBERNACIÓN</option>
							<option>ALCALDÍA</option>
							<option>INSTITUTO DE EDUCACIÓN UNIVERSITARIA</option>
						</select>
						</td>
						<td>
						Tipo de Cargo :
						<select name="TipoCargo" value="selected" style="height: 35px;font-size:13px">
							<option>'.$row["TipoCargo"].'</option>
							<option>Docente</option>
							<option>Asistencial</option>
							<option>Administrativo</option>
							<option>Obrero</option>
						</select>
						</td>
						<td>
						Condición del Empleo :
						<select name="CondEmp" value="selected" style="height: 35px;font-size:13px">
							<option>'.$row["CondEmpleo"].'</option>
							<option>Activo</option>
							<option>Contratado</option>
							<option>Jubilado</option>
							<option>Pensionado</option>
						</select>
						</td>
					</tr>
				</table><br>';
						if(array_key_exists('Guardar', $_POST)) {
									guardarDatosM();
						}
						/*if(array_key_exists('OtroA', $_GET)) {
							// echo '<script type="text/javascript" language="JavaScript">
							// @csrf
							// window.location="../../CaiaIpasme/public/modif1Afiliado";
							// </script>';
						}*/
				echo '
				<input class="boton" type="submit" style="font-size:16px;border-radius:5px;" name="Guardar" value="Guardar datos modificados">
				<a class="boton" style="font-size:16px;border-radius:5px;" name="OtroA" value="Otro Afiliado" href="../../CaiaIpasme/public/modif1Afiliado">Otro Afiliado</a>
			</form>';
			// <input class="boton" type="submit" style="font-size:16px;border-radius:5px;" name="Guardar" value="Guardar datos modificados">
			// <a class="boton" style="font-size:16px;border-radius:5px;" name="OtroA" value="Otro Afiliado" href="../../CaiaIpasme/public/modif1Afiliado">Otro Afiliado</a>
			mysqli_free_result($resultBuscar); 
			mysqli_close($dbcon); 
			}
			else
			{
				echo '<strong>No se encontró al Afiliado de cedula.....'.$cedula.'</strong><br>';
			}
			?>
      </center>
    </div>
	<br>
    <footer2>
        <div class="footer-links2">
                <td><p align="center" style="font-size:14px;">UMO IPASME - TRUJILLO Av. García de Paredes Sector Santa Rosa</p></td>
        </div>
    </footer2>

</body>
</html>
</x-app-layout>
