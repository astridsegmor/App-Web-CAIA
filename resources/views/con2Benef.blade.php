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
	<?php
	require 'openBD.php';
	//session_start();
//	$conexion = mysqli_connect("localhost", "root", "root", "caia_ipasme");
//	$cedula=$_GET['cedulaA']; //echo $cedula;
	$cedula = $_POST["CedulaAForm"];
//	$_SESSION["cedA"] = $_POST["CedulaAForm"];
//	$cedula = $_SESSION["cedA"];
	$query = "SELECT * FROM afiliado WHERE CedulaA='$cedula'";
	$resultBuscar = mysqli_query($dbcon,$query) or die('Consulta fallida: '); //. mysqli_error($conexion));
	if (mysqli_num_rows($resultBuscar)!=0) 
//	if ($resultBuscar)
	{
		$row = mysqli_fetch_array($resultBuscar,MYSQLI_ASSOC);
		$cedula = " ".$cedula." ";
		$nombreA = " ".$row["PriApellido"]." ".$row["SegApellido"].", ".$row["PriNombre"]." ".$row["SegNombre"];
		echo '
		<hr>
		<table border="0px" cellpadding="3px">
			<tr>
				<td>
					<strong><h3 style="color:blue">AFILIADO:  '.$nombreA.'</br> '.$cedula.'
				</td>
			</tr>
		</table>';
	}
	?>
    <div style="padding-bottom: 10px;">
        <h1 style="font-size:30px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">Consulta de Beneficiarios</h1>
    </div>
    <div style="padding-bottom: 50px;">
        <center>
		<?php 
		require 'openBD.php';
//		$conexion = mysqli_connect("localhost", "root", "root", "caia_ipasme");
//		$query = 'SELECT cedulaA,prinombre,segnombre,priapellido,segapellido,tlfcel, DirHab, Email, TipoCargo FROM afiliado';
		$cedula = trim($cedula);
		$query = "SELECT * FROM beneficiarios WHERE Cedula_A='$cedula'";
		$resultB = mysqli_query($dbcon,$query) or die('Consulta fallida: ' . mysql_error($conexion));
		?>
		<form action="" method="post">
			<table class="table table-striped" border="3px" cellpadding="5px">
				<thead>
				<tr >
					<th>CEDULA</th>
					<th>APELLIDOS y NOMBRES</th>
					<th>FECHA NACIMIENTO</th>
					<th>SEXO</th>
					<th>ESTADO CIVIL</th>
					<th>PARENTESCO</th>
				</tr>
				</thead>
				<?php
					$ced = trim($cedula);
					$query = "SELECT * FROM beneficiarios WHERE Cedula_A='$ced' ORDER BY FecNacB";
					$result = mysqli_query($dbcon,$query) or die('Consulta fallida: ' . mysql_error($conexion));
					$numB = 0;
					while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
						<tr bgcolor="white" align="center">
							<td><?=$row['CedulaB']?></td>
							<td><?=$row['Apellidos_Nombres'] ?></td>
							<td><?=date("d-m-Y", strtotime($row['FecNacB'])) ?></td>
							<!--td><?=$row['FecNacB'] ?></td-->
							<td><?=$row['SexoB'] ?></td>
							<td><?=$row['EdoCivilB'] ?></td>
							<td><?=$row['Parentesco'] ?></td>
						</tr>
					<?php 
					$numB++;
					}
					if ($numB==0){
						echo '<tr><strong><h3 style="color:blue;">No tiene Beneficiarios registrados</tr>';}
						//				mysqli_free_result($resultBuscar); 
					mysqli_close($dbcon); 
				?>
			</table>
			</br></br>
			<a class="boton" style="font-size:16px;border-radius:5px;" name="OtroA" value="Otro Afiliado" href="../../CaiaIpasme/public/con1Benef">Otro Afiliado</a>
		</form>
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
