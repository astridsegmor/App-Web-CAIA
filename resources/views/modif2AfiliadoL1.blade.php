<x-app-layout>

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
	<link rel="stylesheet" href="../../../proyectoCaia/styles.css">
	<?php include "../../proyectoCaia/readValid.php"; ?>
    <link href="../../CaiaIpasme/public/styleNunito.css" rel="stylesheet">
</head>
<body style="padding:8px;">
    <nav>
        <img src="../../img/cintilloIpas.jpg" alt="fondo"><br>
        <div class="sp">
            <ul>
                <li>
                    <a href="../../CaiaIpasme/public/dashboard"><h4>← Regresar</h4></a>
                </li>
            </ul>
        </div>
    </nav>
    <!--h2 style="text-align:center">Modificar Datos del Afiliado</h2-->
    <div>
        <center>

				<form action="{{action('AfiliadoController@guardarModifA',$mAfil->id)}}" method="post">
				<table border=3px>
					<h3>Datos del afiliado
					<tr>
						<td>
						Primer Apellido: <input type="text" name="PapellidoForm" style="text-transform:uppercase;font-size:16px" value="{{$mAfil->PriApellido}}" onkeyup="mayuscul(this)" required><p/>
						</td>
						<td>
						Segundo Apellido: <input type="text" name="SapellidoForm" style="text-transform:uppercase;font-size:16px" value="{{$mAfil->SegApellido}}" onkeyup="mayuscul(this)"><p/>
						</td>
						<td>
						<!-- Primer Nombre : <input type="text" name="PnombreForm" style="text-transform:uppercase;font-size:16px" value="'.$row["PriNombre"].'" onkeyup="mayuscul(this)" required><p/>
						</td>
						<td>
						Segundo Nombre: <input type="text" name="SnombreForm" style="text-transform:uppercase;font-size:16px" value="'.$row["SegNombre"].'" onkeyup="mayuscul(this)"><p/>
						</td>
					</tr>
					<tr>
						<td>
						Cedula Afiliado : <input type="text" name="CedulaAForm" pattern="[V]-[0-9]{2}.[0-9]{3}.[0-9]{3}" title="Ej.-> V-04.333.555, V-21.222.333" 
											style="font-size:16px" value="'.$row["CedulaA"].'" placeholder="V-99.999.999" readonly>
						</td>
						<td>
						Sexo :
						<select name="Sexo" value="selected" style="font-size:16px">
							<option>'.$row["SexoA"].'</option>
							<option>Femenino</option>
							<option>Masculino</option>
						</select>
						</td>
						<td>
						Fecha Nacimiento: <input type="date" max="'.$FecAct.'" name="FecNac" value="'.$row["FecNacA"].'" style="font-size:16px">
						</td>
						<td>
						Estado Civil :
						<select name="EdoCivil" value="selected" style="font-size:16px">
							<option>'.$row["EdoCivil"].'</option>
							<option>Soltero(a)</option> 
							<option>Casado(a)</option>
							<option>Viudo(a)</option>
							<option>Divorciado(a)</option>
						</select>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
						Dirección de Habitación : <input type="textbox" name="DirHabForm" size="140" style="text-transform:uppercase;font-size:16px" value="'.$row["DirHab"].'" onkeyup="mayuscul(this)">
						</td>
					</tr>
					<tr>
						<td>
						Dirección de Trabajo..... : <input type="textbox" name="DirTraForm" size="140" style="text-transform:uppercase;font-size:16px" value="'.$row["DirTra"].'" onkeyup="mayuscul(this)">
						</td>
					</tr>
				</table>
				<table border=3px>
					<tr>
						<td>
						Estado: <input type="text" name="EstadoForm" value="'.$row["Estado"].'" style="font-size:16px" onkeyup="mayuscul(this)" required> 
						</td>
						<td>
						Ciudad: <input type="text" name="CiudadForm" value="'.$row["Ciudad"].'" style="font-size:16px" onkeyup="mayuscul(this)">
						</td>
						<td>
						Municipio : <input type="text" name="McpioForm" value="'.$row["Municipio"].'" style="font-size:16px" onkeyup="mayuscul(this)" required>
						</td>
						<td>
						Parroquia: <input type="text" name="ParroquiaForm" value="'.$row["Parroquia"].'" style="font-size:16px" onkeyup="mayuscul(this)">
						</td>
					</tr>
					<tr>
						<td>
						Correo Electrónico: <input type="email" name="EmailForm" value="'.$row["Email"].'" style="font-size:16px"> 
						</td>
						<td>
						Teléfono Celular: <input type="tel" name="TlfCelForm" id="tlfX" value="'.$row["TlfCel"].'" pattern="[0-9]{4}-[0-9]{7}" title="Ej.-> 0416-1234567" style="font-size:16px" placeholder="0416-1234567" required>
						</td>
						<td>
						Teléfono Habitación : <input type="tel" name="TlfHabForm" id="tlf2" value="'.$row["TlfHab"].'" pattern="[0-9]{4}-[0-9]{7}" title="Ej.-> 0272-1234567" style="font-size:16px"  placeholder="0272-1234567">
						</td>
						<td>
						Teléfono Trabajo: <input type="tel" name="TlfTraForm" id="tlf3" value="'.$row["TlfTrab"].'" pattern="[0-9]{4}-[0-9]{7}" title="Ej.-> 0416-1234567" style="font-size:16px"  placeholder="0416-1234567">
						</td>
					</tr>
				</table>
				<table  border=3px>
					<h3>Datos Administrativos
					<tr>
						<td>
							<?php
							$FecIng = date('Y-m-d');?>
							Fecha de Afiliación: <input type="date" max="'.$FecIng.'" name="FecIng" value="'.$row["fecIngA"].'" id="FecIng" style="font-size:16px">
						</td>
						<td>
						Organismo del cual depende :
						<select name="OrgDep" value="selected" style="font-size:16px">
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
						<select name="TipoCargo" value="selected" style="font-size:16px">
							<option>'.$row["TipoCargo"].'</option>
							<option>Docente</option>
							<option>Asistencial</option>
							<option>Administrativo</option>
							<option>Obrero</option>
						</select>
						</td>
						<td>
						Condición del Empleo :
						<select name="CondEmp" value="selected" style="font-size:16px">
							<option>'.$row["CondEmpleo"].'</option>
							<option>Activo</option>
							<option>Contratado</option>
							<option>Jubilado</option>
							<option>Pensionado</option>
						</select>
						</td> -->
					</tr>
				</table>
				<br><br>
				<input class="boton" type="submit" style="font-size:16px;border-radius:5px;" name="Guardar" value="Guardar datos modificados">
				<input class="boton" type="submit" style="font-size:16px;border-radius:5px;" name="OtroA" value="Otro Afiliado">
			</form>
	  <hr>
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
