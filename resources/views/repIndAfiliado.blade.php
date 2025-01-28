<x-app-layout>

<script type="text/javascript">
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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
<body style="padding:8px;">
    <nav>
        <img src="../../img/cintilloIpas.jpg" alt="fondo"><br>
        <div class="sp">
            <ul>
                <li>
                    <a href="{{ url('dashboard') }}"><h4 style="font-size:16px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">← Regresar</h4></a>
                </li>
            </ul>
        </div>
    </nav>
    <div>
        <h1 style="font-size:30px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">Consulta Individual del Afiliado</h1>
    <tabla>
        <center>
	<?php	
		require 'openBD.php';
	//	$conexion = mysqli_connect("localhost", "root", "root", "caia_ipasme");
		$cedula = $_POST["CedulaAForm"];
	//	$query = "SELECT CedulaA,PriNombre,SegNombre,PriApellido,SegApellido,TlfCel FROM afiliado WHERE CedulaA='$cedula'";
		$query = "SELECT * FROM afiliado WHERE CedulaA='$cedula'";
		$resultBuscar = mysqli_query($dbcon,$query) or die('Consulta fallida: '); //. mysqli_error($conexion));
		if (mysqli_num_rows($resultBuscar)!=0) 
	//	if ($resultBuscar)
		{
			$row = mysqli_fetch_array($resultBuscar,MYSQLI_ASSOC);
			echo '
			<form action="" method="post">
			<strong><hr>
			<table border=3px  style="font-size: 12px">
				<h3 style="font-size:16px; font-weight:bold; text-align:center;padding-bottom: 5px;">DATOS DEL AFILIADO
				<tr>
					<td>
					Primer Apellido: <input type="text" name="PapellidoForm" style="text-transform:uppercase;height: 35px;font-size:13px;" value="'.$row["PriApellido"].'" readonly><p/>
					</td>
					<td>
					Segundo Apellido: <input type="text" name="SapellidoForm" style="text-transform:uppercase;height: 35px;font-size:13px;" value="'.$row["SegApellido"].'" readonly><p/>
					</td>
					<td>
					Primer Nombre : <input type="text" name="PnombreForm" style="text-transform:uppercase;height: 35px;font-size:13px;" value="'.$row["PriNombre"].'" readonly><p/>
					</td>
					<td>
					Segundo Nombre: <input type="text" name="SnombreForm" style="text-transform:uppercase;height: 35px;font-size:13px;" value="'.$row["SegNombre"].'" readonly><p/>
					</td>
				</tr>
				<tr>
					<td>
					Cedula Afiliado : <input type="text" name="CedulaAForm" style="height: 35px;font-size:13px;" value="'.$row["CedulaA"].'" readonly>
					</td>
					<td>
					Sexo : <input type="text" name="SnombreForm" style="text-transform:uppercase;height: 35px;font-size:13px;" value="'.$row["SexoA"].'" readonly>
					</td>
					<td>
					Fecha Nacimiento: <input type="date" name="FecNac" value="'.$row["FecNacA"].'" style="height: 35px;font-size:13px;" readonly>
					</td>
					<td>
					Estado Civil : <input type="text" name="SnombreForm" style="text-transform:uppercase;height: 35px;font-size:13px;" value="'.$row["EdoCivil"].'" readonly>
					</td>
				</tr>
			</table><br>
			<table  style="font-size: 12px">
				<tr>
					<td>
					Dirección de Habitación : <input type="text" name="DirHabForm" size="140" style="text-transform:uppercase;height: 35px;font-size:13px;" value="'.$row["DirHab"].'" readonly>
					</td>
				</tr>
				<tr>
					<td>
					Dirección de Trabajo....... : <input type="text" name="DirTraForm" size="140" style="height: 35px;text-transform:uppercase;font-size:13px" value="'.$row["DirTra"].'" readonly>
					</td>
				</tr>
			</table><br>
			<table style="font-size:13px; border:3px; background:white">
				<tr>
					<td>
					Estado: <input type="text" name="EstadoForm" value="'.$row["Estado"].'" style="height: 35px;font-size:13px;" readonly> 
					</td>
					<td>
					Ciudad: <input type="text" name="CiudadForm" value="'.$row["Ciudad"].'" style="height: 35px;font-size:13px;" readonly>
					</td>
					<td>
					Municipio : <input type="text" name="McpioForm" value="'.$row["Municipio"].'" style="height: 35px;font-size:13px;" readonly>
					</td>
					<td>
					Parroquia: <input type="text" name="ParroquiaForm" value="'.$row["Parroquia"].'" style="height: 35px;font-size:13px;" readonly>
					</td>
				</tr>
				<tr>
					<td>
					Correo Electrónico: <input type="email" name="EmailForm" value="'.$row["Email"].'" style="height: 35px;font-size:13px;" readonly> 
					</td>
					<td>
					Teléfono Celular: <input type="tel" name="TlfCelForm" value="'.$row["TlfCel"].'" style="height: 35px;font-size:13px;" readonly>
					</td>
					<td>
					Teléfono Habitación : <input type="tel" name="TlfHabForm" value="'.$row["TlfHab"].'" style="height: 35px;font-size:13px;" readonly>
					</td>
					<td>
					Teléfono Trabajo: <input type="tel" name="TlfTraForm" value="'.$row["TlfTrab"].'" style="height: 35px;font-size:13px;" readonly>
					</td>
				</tr>
			</table>
			<br><hr>
			<table style="font-size:13px; border:3px; background:white">
				<h3 style="font-size:16px; font-weight:bold; text-align:center;">DATOS ADMINISTRATIVOS
				<tr>
					<td>';
						$FecIng = date('Y-m-d');
						echo 'Fecha de Afiliación: <input type="date" max="'.$FecIng.'" name="FecIng" value="'.$row["fecIngA"].'" id="FecIng" style="height: 35px;font-size:13px">
					</td>
					<td>
					Organismo del cual depende : <input type="text" name="SnombreForm" style="text-transform:uppercase;height: 35px;font-size:13px;" value="'.$row["OrgDepende"].'" readonly>
					</td>
					<td>
					Tipo de Cargo : <input type="text" name="SnombreForm" style="text-transform:uppercase;height: 35px;font-size:13px;" value="'.$row["TipoCargo"].'" readonly>
					</td>
					<td>
					Condición del Empleo : <input type="text" name="SnombreForm" style="text-transform:uppercase;height: 35px;font-size:13px;" value="'.$row["CondEmpleo"].'" readonly>
					</td>
				</tr>
			</table>
			<br>
			<a class="boton" style="font-size:16px;border-radius:5px;" name="OtroA" value="Otro Afiliado" href="../../CaiaIpasme/public/rep1Afiliado">Otro Afiliado</a>
			</form>';
		}
		else
		{
			echo '
			<form action="" method="post">
			<hr>
				<strong>No existe Afiliado registrado con esta cédula :'.$cedula.'</strong><br>
				<br><br>
				<a class="boton" style="font-size:16px;border-radius:5px;" name="OtroA" value="Otro Afiliado" href="../../CaiaIpasme/public/rep1Afiliado">Otro Afiliado</a>
				</form>
				';
		}
		?>
	    </center>
	</tabla>
	<br>
	</div>
    <footer2>
        <div class="footer-links2">
                <td><p align="center" style="font-size:14px;">UMO IPASME - TRUJILLO Av. García de Paredes Sector Santa Rosa</p></td>
        </div>
    </footer2>

</body>
</html>

</x-app-layout>
