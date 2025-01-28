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

<?php
	//$_SESSION["cedA"] = $_POST["CedulaAF"];
?>
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
<body style="padding:8px; font-family: 'Nunito', sans-serif;">
	<?php
		if(!function_exists("verificar_exist")) {
			function verificar_exist($tabla,$campo1="",$dato1="",$campo2="",$dato2="") {

				require 'openBD.php';
				//$dbconB = mysqli_connect("localhost", "root", "root", "caia_ipasme");

				$expsql= "select * from ".$tabla." where ".$campo1." = '".$dato1."'"; // and ".$campo2." = '".$dato2."'";
	//			echo $expsql;
				$consulB=mysqli_query($dbcon,$expsql);
				if (mysqli_num_rows($consulB)!=0) {
					return true;}
				else {
					return false;}
			}
		}

		if(!function_exists("guardarD")) {
			function guardarD(){
				//$cedula = $_POST["CedulaAF"];
				dd($cedula);
				echo "Cedula....".$cedula;
				sleep(30);
			}
		}

		if(!function_exists("guardarDatosR")) {
			function guardarDatosR(){
				require 'openBD.php';
				$cedula = $_POST["CedulaAF"];
				//echo "Cedula....".$cedula;
				//sleep(30);
				$query = "SELECT * FROM afiliado WHERE CedulaA='$cedula'";
//				$query = "SELECT * FROM afiliado WHERE CedulaA='V-66.666.666'";
				$resultBuscar = mysqli_query($dbcon,$query) or die('Consulta fallida: '); //. mysqli_error($conexion));
				$row = mysqli_fetch_array($resultBuscar,MYSQLI_ASSOC);
				if (!empty($row['CedulaA']))
					{
					if($_POST){
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
					
						$queryInsert = "UPDATE requisitos SET CedulaA='$CopCedA',RecPagoA='$RecPagA',ConstTrabA='$ConstTrabA',
                        CedConyA='$CedConyA',ActMatrimA='$ActMatrimA',CedConcubA='$CedConcubA',
                        ConstConcubA='$ConstConcubA',CedHijosA='$CedHijosA',PartNacHA='$PartNacHA',
                        ConstSoltHA='$ConstSoltHA',ConstEstHA='$ConstEstHA',ConstExpHA='$ConstExpHA',
                        CedPadresA='$CedPadresA',PartNacA='$PartNacA' WHERE CedAfil='$cedula'";
						$resultInsert = mysqli_query($dbcon, $queryInsert); 
					
						//$archivo = $_POST['fileA'];
						//echo $archivo;

						if($resultInsert)
						{
							echo "<strong>Se actualizaron los Requisitos del Afiliado con éxito....</strong> <br>";
						}
						else
						{
							echo "No se ingresaron los datos. <br>";
						}
				
					}
					}
					else
					{
						echo "No existe un Afiliado registrado con esta cédula: ".$cedula." <br>";
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
			//echo "Cedula....".$cedula;
			$cedula = $_POST["CedulaAF"];
			$query = "SELECT * FROM afiliado WHERE CedulaA='$cedula'";
			$resultBuscar = mysqli_query($dbcon,$query) or die('Consulta fallida: ');
			if (mysqli_num_rows($resultBuscar)!=0) 
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
			//mysqli_free_result($resultBuscar);
			//echo "Ced....".trim($cedula);
			$cedula=trim($cedula);
			$query = "SELECT * FROM requisitos WHERE CedAfil='$cedula'";
			$resultBuscar = mysqli_query($dbcon,$query) or die('Consulta fallida: ');
			if (mysqli_num_rows($resultBuscar)!=0) {
			//if ($resultBuscar) {
				//dd($cedula);
				//dd($row["CedAfil"]);
				$row = mysqli_fetch_array($resultBuscar,MYSQLI_ASSOC);
				$cedP=$row["CedAfil"];
				// VERIFICAR SI EL REQUISITO ESTA TILDADO O NO EN LA BD
				$cCed=$row["CedulaA"];
				if ($cCed == 1) {
					$cCed=' checked';
				} else {
					$cCed="";
				}
				$cPag=$row["RecPagoA"];
				if ($cPag == 1) {
					$cPag=' checked';
				} else {
					$cPag="";
				}
				$cCTra=$row["ConstTrabA"];
				if ($cCTra == 1) {
					$cCTra=' checked';
				} else {
					$cCTra="";
				}
				$cCCon=$row["CedConyA"];
				if ($cCCon == 1) {
					$cCCon=' checked';
				} else {
					$cCCon="";
				}
				$cAct=$row["ActMatrimA"];
				if ($cAct == 1) {
					$cAct=' checked';
				} else {
					$cAct="";
				}
				$cCCoA=$row["CedConcubA"];
				if ($cCCoA == 1) {
					$cCCoA=' checked';
				} else {
					$cCCoA="";
				}
				$cCoCA=$row["ConstConcubA"];
				if ($cCoCA == 1) {
					$cCoCA=' checked';
				} else {
					$cCoCA="";
				}
				$cCedH=$row["CedHijosA"];
				if ($cCedH == 1) {
					$cCedH=' checked';
				} else {
					$cCedH="";
				}
				$cPNac=$row["PartNacHA"];
				if ($cPNac == 1) {
					$cPNac=' checked';
				} else {
					$cPNac="";
				}
				$cCSH=$row["ConstSoltHA"];
				if ($cCSH == 1) {
					$cCSH=' checked';
				} else {
					$cCSH="";
				}
				$cCEHA=$row["ConstEstHA"];
				if ($cCEHA == 1) {
					$cCEHA=' checked';
				} else {
					$cCEHA="";
				}
				$cCExH=$row["ConstExpHA"];
				if ($cCExH == 1) {
					$cCExH=' checked';
				} else {
					$cCExH="";
				}
				$cCedP=$row["CedPadresA"];
				if ($cCedP == 1) {
					$cCedP=' checked';
				} else {
					$cCedP="";
				}
				$cParNA=$row["PartNacA"];
				if ($cParNA == 1) {
					$cParNA=' checked';
				} else {
					$cParNA="";
				}
			} 
		//				mysqli_free_result($resultBuscar); 
		//				mysqli_close($dbcon); 
		?>
	</div>
		<h1 style="font-size:24px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">Actualizar Requisitos del Afiliado</h1>
    <div style="padding-bottom: 0px;">
        <center>
		<form action="" method="post" id="DatosR" enctype="multipart/form-data">
			@csrf
			<hr>
			<table border="3px" cellpadding="5">
				<tr>
					<td>
					<strong>AFILIADO-->
					</td>
					<td>
					<?php echo 'Copia de Cédula: <input type="checkbox" name="CopCedA" id="CopCedA"'.$cCed.' style="font-size:13px">'?>
					</td>
					<td>
					<?php echo 'Recibo de Pago: <input type="checkbox" name="RecPagA" id="RecPagA"'.$cPag.' style="font-size:13px">'?>
					</td>
					<td>
					<?php echo 'Constancia de Trabajo: <input type="checkbox" name="ConsTrabA" id="ConsTrabA"'.$cCTra.' style="font-size:13px">'?>
					</td>
					<td>
					</td>
					<td align="center">
					<input type="file" name="fileA[]" id="fileA" title="Guardar Doc Digital" value="Registrar Doc Digital" 
						accept="image/*,.pdf" style="font-size:16px" class="form-control-file" multiple>
					</td>
				</tr>
				<tr>
					<td>
					<strong>CÓNYUGUE-->
					</td>
					<td>
					<?php echo 'Copia de Cédula: <input type="checkbox" name="CopCedCony" id="CopCedCony"'.$cCCon.' style="font-size:13px">'?>
					</td>
					<td>
					<?php echo 'Original/Copia Acta Matrimonio: <input type="checkbox" name="CopActMat" id="CopActMat"'.$cAct.' style="font-size:13px">'?>
					</td>
				</tr>
				<tr>
					<td>
					<strong>CONCUBINA(O)-->
					</td>
					<td>
					<?php echo 'Copia de Cédula: <input type="checkbox" name="CopiaCedC" id="CopiaCedC"'.$cCCoA.' style="font-size:13px">'?>
					</td>
					<td>
					<?php echo 'Constancia de Concubinato: <input type="checkbox" name="ConstCon" id="ConstCon"'.$cCoCA.' style="font-size:13px">'?>
					</td>
				</tr>
				<tr>
					<td>
					<strong>HIJOS(AS)-->
					</td>
					<td>
					<?php echo 'Copia de Cédula: <input type="checkbox" name="CopiaCedH" id="CopiaCedH"'.$cCedH.' style="font-size:13px">'?>
					</td>
					<td>
					<?php echo 'Original/Copia Partida Nac: <input type="checkbox" name="PartNacHA" id="PartNacHA"'.$cPNac.' style="font-size:13px">'?>
					</td>
					<td>
					<?php echo 'Constancia de Soltería: <input type="checkbox" name="ConstSoltHA" id="ConstSoltHA"'.$cCSH.' style="font-size:13px">'?>
					</td>
					<td>
					<?php echo 'Constancia de Estudio: <input type="checkbox" name="ConstEstHA" id="ConstEstHA"'.$cCEHA.' style="font-size:13px">'?>
					</td>
					<td>
					<?php echo 'Constancia de Expensas: <input type="checkbox" name="ConstExpHA" id="ConstExpHA"'.$cCExH.' style="font-size:13px">'?>
					</td>
				</tr>
				<tr>
					<td>
					<strong>PADRES-->
					</td>
					<td>
					<?php echo 'Copia de Cédula: <input type="checkbox" name="CedPadresA" id="CedPadresA"'.$cCedP.' style="font-size:13px">'?>
					</td>
					<td>
					<?php echo 'Partida Nac. Afiliado: <input type="checkbox" name="PartNacA" id="PartNacA"'.$cParNA.' style="font-size:13px">'?>
					</td>
					<?php echo '<input type="text" name="CedulaAF" value="'.$cedula.'" hidden>' ?>
				</tr>
			</table>
			<br>
			<?php
			//echo "Cedula....".$cedula;
				if(array_key_exists('Guardar', $_POST)) {
					guardarDatosR();
					//$archivo = $_FILES["fileA"]["name"];
					//echo $archivo;
					//dd($archivo);
		
					//if (!empty($_POST['fileA'])) {
						if($_FILES["fileA"]){
							//dd("Entreee....");
						//Recorre el array de los archivos a subir
						foreach($_FILES["fileA"]['tmp_name'] as $key => $tmp_name){
							//Si el archivo existe
							if($_FILES["fileA"]["name"][$key]){
								// Nombres de archivos de temporales
								$archivonombre = $_FILES["fileA"]["name"][$key]; 
								$fuente = $_FILES["fileA"]["tmp_name"][$key]; 
								
								$carpeta = '/Caia-'.$cedula.'/'; //Carpeta donde guardamos los archivos
								//dump($carpeta);
								
								//Si no existe la carpeta
								if(!file_exists($carpeta)){
									//Se crea o se genera un error.
									mkdir($carpeta, 0777) or die("Hubo un error al crear la carpeta");
									//dd("Se creo la carpeta...");	
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
							} //else {dd("Vacio...");}
						}
						echo "<strong>Se almacenaron los Documentos digitales con éxito....</strong> <br>";
						} 
					//} //else {echo 'No hay.....';}
				}
			?>
            <div id="SaveFile">
				<input class="boton" type="submit" style="font-size:16px;border-radius: 5px" name="Guardar" value="Guardar">
				<a class="boton" style="font-size:16px;border-radius:5px;" name="OtroA" value="Otro Afiliado" href="../../CaiaIpasme/public/act1ReqAfil">Otro Afiliado</a>
			</div>
			<hr>
     </form>
	  <hr><br>
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
