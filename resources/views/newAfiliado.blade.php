<x-app-layout>

<script type="text/javascript">
//window.history.replaceState({},'','IpasmeTrujillo.html');

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
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<script>
	function mayuscul(field) { field.value = field.value.toUpperCase() }
</script>

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
	<?php
		function verificar_exist($tabla,$campo1="",$dato1="",$numClave=1) {

		require 'openBD.php';
		//  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
		//  $dbcon = mysqli_connect("localhost", "root", "root", "caia_ipasme");

		  if ($numClave==2) {
				$expsql= "select * from ".$tabla." where ".$campo1." = '".$dato1."' and ".$campo2." = ".$dato2;
		//		echo $expsql;
			} else {
				$expsql= "select * from ".$tabla." where ".$campo1."='".$dato1."'";
		//		echo $expsql;
			}
			$consul=mysqli_query($dbcon,$expsql);
			if (mysqli_num_rows($consul)!=0) {
				return true;}
			else {
				return false;}
		}

		function guardarArchA(){
			$archivo = $_POST["fileA"];
			echo $archivo;
		}

		function guardarDatosA(){
		require 'openBD.php';
			//$conexion = mysqli_connect("localhost", "root", "root","caia_ipasme");
			$cedula = $_POST["CedulaAForm"];
			$query = "SELECT * FROM afiliado WHERE CedulaA='$cedula'";
			$resultBuscar = mysqli_query($dbcon,$query) or die('Consulta fallida: '); //. mysqli_error($conexion));
			$row = mysqli_fetch_array($resultBuscar,MYSQLI_ASSOC);
			if (empty($row['CedulaA']))
			{
			if($_POST)
			  {
				 $queryInsert = "INSERT INTO afiliado (cedulaa,PriNombre,SegNombre,priapellido,segapellido,SexoA,FecNacA,EdoCivil,DirHab,Estado,Municipio,Parroquia,Ciudad,Email,TlfCel,TlfHab,TlfTrab,OrgDepende,TipoCargo,CondEmpleo,fecIngA) 
				 VALUES ('".$_POST['CedulaAForm']."','".$_POST['PnombreForm']."','".$_POST['SnombreForm']."','".$_POST['PapellidoForm']."','".$_POST['SapellidoForm']."',
						 '".$_POST['Sexo']."', '".$_POST['FecNac']."','".$_POST['EdoCivil']."','".$_POST['DirHabForm']."','".$_POST['EstadoForm']."','".$_POST['McpioForm']."',
						 '".$_POST['ParroquiaForm']."','".$_POST['CiudadForm']."','".$_POST['EmailForm']."','".$_POST['TlfCelForm']."','".$_POST['TlfHabForm']."','".$_POST['TlfTraForm']."',
						 '".$_POST['OrgDep']."','".$_POST['TipoCargo']."','".$_POST['CondEmp']."', '".$_POST['FecIng']."');";
		 
				 $resultInsert = mysqli_query($dbcon, $queryInsert); 
			
				if (!isset($_POST['CopCedA'])) {$CopCedA='0';} 
				else {$CopCedA='1';}
				if (!isset($_POST['RecPagA'])) {$RecPagA='0';} 
				else {$RecPagA='1';}
				if (!isset($_POST['ConsTrabA'])) {$ConstTrabA='0';} 
				else {$ConstTrabA='1';}
				if (!isset($_POST['CopCedCony'])) {$CedConyA='0';} 
				else {$CedConyA='1';}
				if (!isset($_POST['CopActMat'])) {$ActMatrimA='0';} 
				else {$ActMatrimA='1';}
				if (!isset($_POST['CopiaCedC'])) {$CedConcubA='0';} 
				else {$CedConcubA='1';}
				if (!isset($_POST['ConstCon'])) {$ConstConcubA='0';} 
				else {$ConstConcubA='1';}
				if (!isset($_POST['CopiaCedH'])) {$CedHijosA='0';} 
				else {$CedHijosA='1';}
				if (!isset($_POST['PartNacHA'])) {$PartNacHA='0';} 
				else {$PartNacHA='1';}
				if (!isset($_POST['ConstSoltHA'])) {$ConstSoltHA='0';} 
				else {$ConstSoltHA='1';}
				if (!isset($_POST['ConstEstHA'])) {$ConstEstHA='0';} 
				else {$ConstEstHA='1';}
				if (!isset($_POST['ConstExpHA'])) {$ConstExpHA='0';} 
				else {$ConstExpHA='1';}
				if (!isset($_POST['CedPadresA'])) {$CedPadresA='0';} 
				else {$CedPadresA='1';}
				if (!isset($_POST['PartNacA'])) {$PartNacA='0';} 
				else {$PartNacA='1';}
			
				/*$queryInsert = "INSERT INTO requisitos (CedAfil,CedulaA,RecPagoA,ConstTrabA,CedConyA,ActMatrimA,CedConcubA,ConstConcubA,CedHijosA,PartNacHA,ConstSoltHA,ConstEstHA,ConstExpHA,CedPadresA,PartNacA) */
//				$queryInsert = "INSERT INTO requisitos (CedAfil,CedulaA,RecPagoA,ConstTrabA) 
				$queryInsert = "INSERT INTO requisitos 
				VALUES ('".$_POST['CedulaAForm']."','".$CopCedA."','".$RecPagA."','".$ConstTrabA."','".$CedConyA."',
						'".$ActMatrimA."', '".$CedConcubA."','".$ConstConcubA."','".$CedHijosA."','".$PartNacHA."',
						 '".$ConstSoltHA."','".$ConstEstHA."','".$ConstExpHA."','".$CedPadresA."','".$PartNacA."');";
		 
				$resultInsert = mysqli_query($dbcon, $queryInsert); 

//			$archivo = $_POST["fileA"];
//			echo $archivo;
				 if($resultInsert)
				 {
					echo "<strong>Se ingresaron los datos con exito....</strong> <br>";
				 }
				 else
				 {
					echo "No se ingresaron los datos. <br>";
				 }
		 
			  }
			}
				 else
				 {
					echo "Existe un Afiliado registrado con esta cédula: ".$cedula." <br>";
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
    <div style="padding-bottom: 1px;">
		<h1 style="font-size:24px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">Registro de Nuevo Afiliado</h1><br>
    </div>
    <div style="padding-bottom: 10px;">
        <center>
		<form action="" method="post" id="DatosA" enctype="multipart/form-data">
		@csrf
		<strong><hr>
		<table style="font-size:13px; border:3px; background:white">
			<h3 style="font-size:16px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;padding-bottom: 5px;">DATOS DEL AFILIADO
			<tr style="padding-bottom: 5px;">
				<td>
				 Primer Apellido: <input type="text" name="PapellidoForm" id="PapellidoForm" style="height: 35px;font-size:13px;" onkeyup="mayuscul(this)" required><p/>
				</td>
				<td>
				 Segundo Apellido: <input type="text" name="SapellidoForm" id="SapellidoForm" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)" ><p/>
				</td>
				<td>
				 Primer Nombre : <input type="text" name="PnombreForm" id="PnombreForm" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)" required><p/>
				</td>
				<td>
				 Segundo Nombre: <input type="text" name="SnombreForm" id="SnombreForm" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)" ><p/>
				</td>
			</tr>
			<tr>
				<td>
				 Cedula Afiliado : <input type="text" name="CedulaAForm" id="cedulaB" pattern="[V,E]-[0-9]{2}.[0-9]{3}.[0-9]{3}" title="Ej.-> V-04.333.555, V-21.222.333" 
									style="height: 35px;font-size:13px" placeholder="V-99.999.999" id="CedulaA" onkeyup="mayuscul(this)" required>
				</td>
				<td>
				 Sexo :
				<select name="Sexo" id="Sexo" style="height: 35px;font-size:13px">
					<option selected="selected">Femenino</option>
					<option>Masculino</option>
				</select>
				</td>
				<td>
				 <?php
				 $FecAct = date('Y-m-d');
				 $FecAct = date( 'Y-m-d', strtotime( "$FecAct -18 Year" ) );
//				 $FecMin = date('Y-m-d');
//				 $FecMin = date( "Y-m-d", strtotime( "$FecMin - Year" ) );
//				 echo $FecAct;
				 echo 'Fecha Nacimiento: <input type="date" max="'.$FecAct.'" name="FecNac" id="FecNac" style="height: 35px;font-size:13px">';
				 ?>
				</td>
				<td>
				 Estado Civil :
				<select name="EdoCivil" id="EdoCivil" style="height: 35px;font-size:13px">
					<option selected="selected">Soltero(a)</option>
					<option>Casado(a)</option>
					<option>Viudo(a)</option>
					<option>Divorciado(a)</option>
				</select>
				</td>
			</tr>
		</table>
		<br>
		<table style="font-size:13px;">
			<tr>
				<td>
				 Dirección de Habitación : <input type="text" name="DirHabForm" id="DirHabForm" size=140 style="height: 35px;font-size:13px" onkeyup="mayuscul(this)" >
				</td>
			</tr>
			<tr>
				<td>
				 Dirección de Trabajo....... : <input type="text" name="DirTraForm" id="DirTraForm" size="140" style="height: 35px;text-transform:uppercase;font-size:13px" onkeyup="mayuscul(this)">
				</td>
			</tr>
		</table>
		<br>
		<table style="font-size:13px;" border=3px>
			<tr>
				<td>
				 Estado: <input type="text" name="EstadoForm" id="EstadoForm" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)" value="TRUJILLO" required> 
				</td>
				<td>
				 Ciudad: <input type="text" name="CiudadForm" id="CiudadForm" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)"  value="TRUJILLO" required>
				</td>
				<td>
				 Municipio : <input type="text" name="McpioForm" id="McpioForm" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)"  value="TRUJILLO" required>
				</td>
				<td>
				 Parroquia: <input type="text" name="ParroquiaForm" id="ParroquiaForm" style="height: 35px;font-size:13px" onkeyup="mayuscul(this)" >
				</td>
			</tr>
			<tr>
				<td>
				 Correo Electrónico: <input type="email" name="EmailForm" id="EmailForm" style="height: 35px;font-size:13px" placeholder="aaaaaaa@gmail.com"> 
				</td>
				<td>
				 Teléfono Celular: <input type="tel" name="TlfCelForm" id="tlfX" pattern="[0-9]{4}-[0-9]{7}" title="Ej.-> 0416-1234567" style="height: 35px;font-size:13px" placeholder="0416-1234567" required>
				</td>
				<td>
				 Teléfono Habitación : <input type="tel" name="TlfHabForm" id="tlf2" pattern="[0-9]{4}-[0-9]{7}" title="Ej.-> 0272-1234567" style="height: 35px;font-size:13px"  placeholder="0272-1234567" required>
				</td>
				<td>
				 Teléfono Trabajo: <input type="tel" name="TlfTraForm" id="tlf3" pattern="[0-9]{4}-[0-9]{7}" title="Ej.-> 0416-1234567" style="height: 35px;font-size:13px"  placeholder="0416-1234567">
				</td>
			</tr>
		</table>
		<br><hr>
		<table style="font-size:13px;" border=3px>
			<h3 style="font-size:16px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">DATOS ADMINISTRATIVOS
			<tr>
				<td>
				 <?php
				 $FecIng = date('Y-m-d');
//				 $FecIng = date( "Y-m-d", strtotime( "$FecIng +18 Year" ) );
//				 $FecIng = date( "Y-m-d", strtotime( "$FecIng -18 Year" ) );
//				 $FecMin = date('Y-m-d');
				 $FecMin = date( "Y-m-d", strtotime( "$FecIng -18 Year" ) );
//				 echo $FecAct;
				 echo 'Fecha de Afiliación: <input type="date" min="'.$FecMin.'" max="'.$FecIng.'" name="FecIng" id="FecIng" style="height: 35px;font-size:13px" value="'.$FecIng.'">';
				 ?>
				</td>
				<td>
				 Organismo del cual depende :
				<select  name="OrgDep" id="OrgDep" style="height: 35px;font-size:13px">
					<option selected="selected">IPASME</option>
					<option>M.P.P.E</option>
					<option>GOBERNACIÓN</option>
					<option>ALCALDÍA</option>
					<option>INSTITUTO DE EDUCACIÓN UNIVERSITARIA</option>
				</select>
				</td>
				<td>
				 Tipo de Cargo :
				<select name="TipoCargo" id="TipoCargo" style="height: 35px;font-size:13px">
					<option selected="selected">Docente</option>
					<option>Asistencial</option>
					<option>Administrativo</option>
					<option>Obrero</option>
				</select>
				</td>
				<td>
				 Condición del Empleo :
				<select name="CondEmp" id="CondEmp" style="height: 35px;font-size:13px">
					<option selected="selected">Activo</option>
					<option>Contratado</option>
					<option>Jubilado</option>
					<option>Pensionado</option>
				</select>
				</td>
			</tr>
		</table>
		<br><hr>
		<table style="font-size:13px;" cellpadding="4px">
			<h3 style="font-size:16px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">REQUISITOS SOLICITADOS
			<tr>
				<td>
				 AFILIADO-->
				</td>
				<td>
				 Copia de Cédula: <input type="checkbox" name="CopCedA" id="CopCedA" checked style="font-size:13px">
				</td>
				<td>
				 Recibo de Pago: <input type="checkbox" name="RecPagA" id="RecPagA" checked style="font-size:13px">
				</td>
				<td>
				 Constancia de Trabajo: <input type="checkbox" name="ConsTrabA" id="ConsTrabA" checked style="font-size:13px">
				</td>
				<td>
				</td>
				<td align=center>
				 <input type="file" name="fileA[]" id="fileA" title="Guardar Documentos Digitales" value="Registrar Doc Digital" 
					accept="image/*,.pdf" style="font-size:13px" multiple>
				</td>
			</tr>
			<tr>
				<td>
				 CÓNYUGUE-->
				</td>
				<td>
				 Copia de Cédula: <input type="checkbox" name="CopCedCony" id="CopCedCony" value="1" style="font-size:13px">
				</td>
				<td>
				 Original/Copia Acta Matrimonio: <input type="checkbox" name="CopActMat" id="CopActMat" style="font-size:13px">
				</td>
				<!--td>
				</td>
				<td>
				</td>
				<td>
				  <input type="button" name="saveF" id="saveF" title="Guardar" value="Guardar" style="font-size:13px" onclick="saveArch()">
				</td-->
			</tr>
			<tr>
				<td>
				 CONCUBINA(O)-->
				</td>
				<td>
				 Copia de Cédula: <input type="checkbox" name="CopiaCedC" id="CopiaCedC" style="font-size:13px">
				</td>
				<td>
				 Constancia de Concubinato: <input type="checkbox" name="ConstCon" id="ConstCon" style="font-size:13px">
				</td>
			</tr>
			<tr>
				<td>
				 HIJOS(AS)-->
				</td>
				<td>
				 Copia de Cédula: <input type="checkbox" name="CopiaCedH" id="CopiaCedH" style="font-size:13px">
				</td>
				<td>
				 Original/Copia Partida Nac: <input type="checkbox" name="PartNacHA" id="PartNacHA" style="font-size:13px">
				</td>
				<td>
				 Constancia de Soltería: <input type="checkbox" name="ConstSoltHA" id="ConstSoltHA" style="font-size:13px">
				</td>
				<td>
				 Constancia de Estudio: <input type="checkbox" name="ConstEstHA" id="ConstEstHA" style="font-size:13px">
				</td>
				<td>
				 Constancia de Expensas: <input type="checkbox" name="ConstExpHA" id="ConstExpHA" style="font-size:13px">
				</td>
			</tr>
			<tr>
				<td>
				 PADRES-->
				</td>
				<td>
				 Copia de Cédula: <input type="checkbox" name="CedPadresA" id="CedPadresA" style="font-size:13px">
				</td>
				<td>
				 Partida Nac. Afiliado: <input type="checkbox" name="PartNacA" id="PartNacA" style="font-size:13px">
				</td>
			</tr>
		</table>
		<br>
			<?php
				if(array_key_exists('Guardar', $_POST)) {
					$cedA=$_POST['CedulaAForm'];
						if (verificar_exist("afiliado","cedulaA","$cedA")) {
							echo "<strong>Existe afiliado registrado con esta cédula:....</strong>";
							echo $cedA;
							//echo "</br>Verifica los datos....";
							}
						else {
							guardarDatosA();
						//if (!empty($_POST["fileA"])) {
							if($_FILES["fileA"]) {
							//Recorre el array de los archivos a subir
							foreach($_FILES["fileA"]['tmp_name'] as $key => $tmp_name){
								//Si el archivo existe
								if($_FILES["fileA"]["name"][$key]){
									// Nombres de archivos de temporales
									$archivonombre = $_FILES["fileA"]["name"][$key]; 
									$fuente = $_FILES["fileA"]["tmp_name"][$key]; 
									
									$carpeta = '/Caia-'.$cedula.'/'; //Carpeta donde guardamos los archivos
									
									//Si no existe la carpeta
									if(!file_exists($carpeta)){
										//Se crea o se genera un error.
										mkdir($carpeta, 0777) or die("Hubo un error al crear la carpeta");	
									}
									
									//Abrimos la conexion con la carpeta destino
									$dir=opendir($carpeta); 
									
									//Verificamos si el archivo se ha subido
				                    if(move_uploaded_file($fuente, $carpeta.'/'.$archivonombre)){	
									//if(move_uploaded_file($fuente, 'img/'.$archivonombre)){	
										//echo "El archivo $archivonombre se ha cargado de forma correcta.<br>";
									}else{	
										echo "Se ha producido un error, intentelo de nuevo.<br>";
									}
									//Cerramos la conexion con la carpeta destino
									closedir($dir); 
								}
							}
							echo "<strong>Se almacenaron los Documentos digitales con éxito....</strong> <br>";
							}
						//}
					}
				}
			?>
            <div id="SaveFile">
                <hr>
				<input class="boton" type="submit" style="font-size:16px;border-radius:5px; border-color:rgb(104, 104, 187); padding-right=10px;" name="Guardar" value="Guardar">
				<input class="boton" type="reset" style="font-size:16px;border-radius:5px;" name="Limpiar" value="Limpiar">
				<!--input type="submit" style="font-size:16px;border-radius: 5px" name="Save" value="Guardar Archivos"-->
			</div>
      </form>
	</strong>
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