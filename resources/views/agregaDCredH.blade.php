<x-app-layout>

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
		if(!function_exists("verificar_exist")) {
			function verificar_exist($tabla,$campo1="",$dato1="",$campo2="",$dato2="") {
				require 'openBD.php';
				//$dbconB = mysqli_connect("localhost", "root", "root", "caia_ipasme");

				$expsql= "select * from ".$tabla." where ".$campo1." = '".$dato1."' and ".$campo2." = '".$dato2."'";
				//echo $expsql;
				$consulB=mysqli_query($dbcon,$expsql);
				if (mysqli_num_rows($consulB)!=0) {
					return true;}
				else {
					return false;}
			}
		}

		if(!function_exists("guardarDatosCI")) {
			function guardarDatosCI(){
				require 'openBD.php';
				$cedula = trim($_POST["CedulaAForm"]);
				//$plazoF = substr($_POST["plazoF"],0,2);
				//$queryInsert = "INSERT INTO credint (NroRegistro,CodUnidad,FecSolic,Credito,TipoCreditoH,MontoSolic,Descripcion,PlazoFinanc,CedulaA) 
				$queryInsert = "INSERT INTO credint (NroRegistro,CodUnidad,FecSolic,Credito,TipoCreditoH,MontoSolic,PlazoFinanc,CedulaA) 
									VALUES ('".$_POST['nRegistro']."','".$_POST['codUnid']."','".$_POST['FecSolic']."','1',
								'".$_POST['tipoC']."','".$_POST['mSolic']."','".substr($_POST["plazoF"],0,2)."','".$cedula."');";
								//'".$_POST['tipoC']."','".$_POST['mSolic']."','".$_POST['descC']."','".substr($_POST["plazoF"],0,2)."','".$cedula."');";

				$resultInsert = mysqli_query($dbcon, $queryInsert); 

				if($resultInsert)
				{
					echo "<strong>Se ingresaron los datos de la Solicitud con éxito...</strong> <br><br>";
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
//	session_start();
	$cedula = $_POST["CedulaAForm"];
	$query = "SELECT * FROM afiliado WHERE CedulaA='$cedula'";
	$resultBuscar = mysqli_query($dbcon,$query) or die('Consulta fallida: '); //. mysqli_error($conexion));
	if (mysqli_num_rows($resultBuscar)!=0) 
	{
		$row = mysqli_fetch_array($resultBuscar,MYSQLI_ASSOC);
		$cedula = " ".$cedula." ";
		$nombreA = " ".$row["PriApellido"]." ".$row["SegApellido"].", ".$row["PriNombre"]." ".$row["SegNombre"];

		echo '<strong><h3 style="color:blue;">AFILIADO:  '.$nombreA;
	}
	?>
	</div>
	<h1 style="font-size:24px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">Solicitud de Créditos Hipotecarios</h1>
    <div>
        <center>
		<form action="" method="post" id="DatosB">
		@csrf
		<hr>
		<table border="3px" cellspacing="4px">
		<thead>
			<tr>
				<th>
				 Cédula Afiliado
				</th>
				<th>
				 Nro. de Registro
				</th>
				<th>
				 Cod. Unidad
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
				 <?php echo '<input type="text" name="CedulaAForm" style="font-size:16px" value="'.rtrim($cedula).'" readonly>'; ?>
				</td>
				<td>
				 <input type="text" name="nRegistro" pattern="[0-9]{7}" title="1234567" 
									style="font-size:16px" placeholder="99999999" id="nRegistro" required>
				</td>
				<td>
				 <input type="text" name="codUnid" id="codUnid" size="8" style="font-size:16px" onkeyup="mayuscul(this)" required>
				</td>
			</tr>
		</tbody>
		</table>
		<br>
		<table border="3px" cellspacing="4px">
		<thead>
			<tr>
				<th>
				 Fecha Solicitud
				</th>
				<th>
				 Tipo Crédito
				</th>
				<!--th>
				 Descripción
				</th-->
				<th>
				 Monto Crédito
				</th>
				<th>
				 Plazo Financ.
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
				 <?php
				 $FecAct = date('Y-m-d');
				 $FecMin = date( "Y-m-d", strtotime( "$FecAct -15 year" ) );
//				 <input type="date" name="fecNacB" id="fecNacB" style="font-size:16px">
				 echo '<input type="date" min="'.$FecMin.'" max="'.$FecAct.'" name="FecSolic" id="FecSolic" value="'.$FecAct.'" style="font-size:16px">';
				 ?>
				</td>
				<td>
				<select name="tipoC" id="tipoC" style="font-size:16px">
					<option selected="selected">Adquisición Vivienda</option>
					<option>Adquisición Vivienda/Refacción/Ampliación</option>
					<option>Adquisición Vivienda/Proyecto Habitacional</option>
					<option>Construcción de Vivienda</option>
					<option>Crédito Hipotecario Complementario</option>
					<option>Cancelación de Hipoteca</option>
					<option>Cancelación de Hipoteca y Refacción</option>
					<option>Extensión Crédito de Construcción</option>
					<option>Refacción/Ampliación de Vivienda</option>
				</select>
				</td>
				<!--td>
				 <input type="text" name="descC" id="descC" size="45" style="font-size:16px" onkeyup="mayuscul(this)" required>
				</td-->
				<td>
				 <input type="text" name="mSolic" id="numeroX" size="9" style="font-size:16px" required>
				</td>
				<td>
				<select name="plazoF" id="plazoF" style="font-size:16px">
					<option selected="selected">06 años</option>
					<option>10 años</option>
					<option>15 años</option>
					<option>20 años</option>
					<option>25 años</option>
					<option>30 años</option>
				</select>
				</td>
			</tr>
		</tbody>
		</table>
		<br>
			<?php
				if(array_key_exists('Guardar', $_POST)) {
//					$cedA=$_POST['CedulaAForm'];
					$cedA=trim($cedula);
					$nReg=$_POST["nRegistro"];
					$dato2B="NroRegistro";
					$fech=false;
					if (empty($nReg)) {
						$fech=true;
						$nReg= $_POST["nRegistro"];
						$dato2B="NroRegistro";
					}
					if (verificar_exist("credint","CedulaA","$cedA","$dato2B","$nReg")) {
						echo "<strong>Existe Crédito registrado con estos datos:.... No.Reg:..";
//						echo "Afiliado: ";
//						echo $cedA;
//						echo "</br>Beneficiario: ";
						echo $_POST["nRegistro"].', ';
						if ($fech) {
							echo date("d-m-Y", strtotime($cedB));
						}
						else {
							echo $cedA;
						}
						echo "</br></br>";
						}
					else {
						guardarDatosCI();
					};
				}
			?>
            <div>
				<input class="boton" type="submit" style="font-size:16px;border-radius: 5px" name="Guardar" value="Guardar">
				<a class="boton" style="font-size:16px;border-radius:5px;" name="OtroA" value="Otro Afiliado" href="../../CaiaIpasme/public/agrega1CredH">Otro Afiliado</a>
				<input class="boton" type="reset" style="font-size:16px;border-radius: 5px" name="Limpiar" value="Limpiar">
 			</div>
			<br><hr>
      </form>
      </center>
    </div>
	<div>
		<center>
		<table border="3px" cellpadding="5px">
			<h3>CRÉDITOS HIPOTECARIOS SOLICITADOS
			<thead>
			<tr>
				<th>
				 Fecha Solicitud
				</th>
				<th>
				 Nro. Registro
				</th>
				<th>
				 Tipo Crédito
				</th>
				<!-- <th>
				 Descripción
				</th> -->
				<th>
				 Monto Solicitado
				</th>
				<th>
				 Plazo Financ.
				</th>
			</tr>
			</thead>
			<?php
				$ced = trim($cedula);
				$query = "SELECT * FROM credint WHERE CedulaA='$ced' AND TipoCreditoH!=''";
				$result = mysqli_query($dbcon,$query) or die('Consulta fallida: ' . mysql_error($conexion));
				$numC = 0;
				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
				<tr bgcolor="white" align="center">
					<td><?=date('d-m-Y', strtotime($row['FecSolic'])) ?></td>
					<td><?=$row['NroRegistro'] ?></td>
					<!--td><?//=$row['FecNacB'] ?></td-->
					<td><?=$row['TipoCreditoH'] ?></td>
					<!-- <td><?//=$row['Descripcion'] ?></td> -->
					<td  align="right"><?=number_format($row['MontoSolic'], 2, ",", ".")?></td>
					<td><?=$row['PlazoFinanc'] ?> años</td>
				</tr>
				<?php 
				$numC++;
				}
				if ($numC==0){
					echo '<tr><h3 style="color:blue;">No tiene Créditos Hipotecarios registrados</tr>';
					echo '<script> Swal.fire("No tiene Créditos....") </script>';
				}
				mysqli_free_result($resultBuscar); 
				mysqli_close($dbcon); 
			?>
			
		</table></br>
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
